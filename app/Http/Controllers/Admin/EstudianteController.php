<?php

namespace App\Http\Controllers\Admin;

use App\Models\Aula;
use App\Models\User;
use App\Models\Estudiante;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EstudianteController extends Controller
{
    //LOGIN NECESARIO
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $estudiantes = Estudiante::all();
        return view('Mantenimientos.MEstudiantes.index', compact('estudiantes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $aulas = Aula::all();
        return view('Mantenimientos.MEstudiantes.create', compact('aulas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validación de REQUEST
        $request->validate([
            'nombres' => 'required|max:20|string',
            'apellidos' => 'required|max:20|string',
            'sexo' => 'required|string',
            'dni' => 'required|digits:8|integer',
            'ntelefono' => 'required|digits:9|integer',
            'fnacimiento' => 'required||date',
            'edad' => 'required|min:18|max:80|integer',
            'direccion' => 'required|max:20|string',
            'name' => 'required|max:20|string',
            'password' => 'required|max:20|string',
        ]);

        //Crear Usuario
        $user = User::Create([
            'name' => $request->name,
            'password' => bcrypt($request->password)
        ]);

        //Crear Estudiante
        Estudiante::Create([
            'nombres' => $request->nombres,
            'apellidos' => $request->apellidos,
            'sexo' => $request->sexo,
            'dni' => $request->dni,
            'ntelefono' => $request->ntelefono,
            'fnacimiento' => $request->fnacimiento,
            'edad' => $request->edad,
            'direccion' => $request->direccion,
            'user_id' => $user->id,
            'aula_id' => $request->aulas[0],
        ]);

        return redirect()->route('admin.estudiantes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Estudiante  $estudiante
     * @return \Illuminate\Http\Response
     */
    public function show(Estudiante $estudiante)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Estudiante  $estudiante
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $estudiante = Estudiante::findOrFail($id);
        $aulas = Aula::All();
        return view('Mantenimientos.MEstudiantes.edit', compact('estudiante','aulas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Estudiante  $estudiante
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombres' => 'required|max:20|string',
            'apellidos' => 'required|max:20|string',
            'sexo' => 'required|string',
            'dni' => 'required|digits:8|integer',
            'ntelefono' => 'required|digits:9|integer',
            'fnacimiento' => 'required|date',
            'edad' => 'required|min:18|max:80|integer',
            'direccion' => 'required|max:20|string',
            'name' => 'required|max:20|string',
            'aula_id'=>'required|integer'
        ]);

        $estudiante = Estudiante::findOrFail($id);

        //actualiza estudiante
        $estudiante->update($request->except(['name','password']));
        //actualiza estudiante->user
        if ($request->password == "") {
            $estudiante->user->update($request->only(['name']));
        }else{
            $estudiante->user->update(['name'=>$request->name,'password' => bcrypt($request->password)]);
        }

        return redirect()->route('admin.estudiantes.edit', $estudiante);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Estudiante  $estudiante
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Estudiante::Destroy($id);
        return redirect()->route('admin.estudiantes.index', $id)->with('mensaje', 'ok');
    }
}
