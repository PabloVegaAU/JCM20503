<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Curso;
use App\Models\Docente;
use App\Models\User;
use Illuminate\Http\Request;

class DocenteController extends Controller
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
        $docentes = Docente::all();

        return view('Mantenimientos.MDocentes.index', compact('docentes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        $cursos = Curso::all();
        return view('Mantenimientos.MDocentes.create', compact('users', 'cursos'));
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
            'nombres' => 'required|max:20|string|regex:/^([0-9a-zA-ZñÑáéíóúÁÉÍÓÚ_-])+((\s*)+([0-9a-zA-ZñÑáéíóúÁÉÍÓÚ_-]*)*)+$/',
            'apellidos' => 'required|max:20|string|regex:/^([0-9a-zA-ZñÑáéíóúÁÉÍÓÚ_-])+((\s*)+([0-9a-zA-ZñÑáéíóúÁÉÍÓÚ_-]*)*)+$/',
            'sexo' => 'required|string',
            'dni' => 'required|digits:8|integer',
            'ntelefono' => 'required|digits:9|integer',
            'fnacimiento' => 'required||date',
            'edad' => 'required|min:18|max:80|integer',
            'direccion' => 'required|max:20|string',
            'name' => 'required|max:20|string',
            'password' => 'required|max:20|string',
            'cursos' => 'required'
        ]);

        //Crear Usuario
        $user = User::Create([
            'name' => $request->name,
            'password' => bcrypt($request->password)
        ]);

        //Crear Docente
        $docente = Docente::Create([
            'nombres' => $request->nombres,
            'apellidos' => $request->apellidos,
            'sexo' => $request->sexo,
            'dni' => $request->dni,
            'ntelefono' => $request->ntelefono,
            'fnacimiento' => $request->fnacimiento,
            'edad' => $request->edad,
            'direccion' => $request->direccion,
            'user_id' => $user->id
        ]);
        //Sincronzamos las cursos con el docente
        $docente->cursos()->sync($request->cursos);

        return redirect()->route('admin.docentes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Docente  $docente
     * @return \Illuminate\Http\Response
     */
    public function show(Docente $docente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Docente  $docente
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $docente = Docente::findOrFail($id);
        $cursos = Curso::all();
        return view('Mantenimientos.MDocentes.edit', compact('docente', 'cursos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Docente  $docente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombres' => 'min:4||max:30|string|regex:/^([0-9a-zA-ZñÑáéíóúÁÉÍÓÚ_-])+((\s*)+([0-9a-zA-ZñÑáéíóúÁÉÍÓÚ_-]*)*)+$/',
            'apellidos' => 'min:5||max:30|string|regex:/^([0-9a-zA-ZñÑáéíóúÁÉÍÓÚ_-])+((\s*)+([0-9a-zA-ZñÑáéíóúÁÉÍÓÚ_-]*)*)+$/',
            'sexo' => 'min:1|string',
            'dni' => 'digits:8|integer',
            'ntelefono' => 'digits:9|integer',
            'fnacimiento' => 'date',
            'edad' => 'min:18|max:80|integer',
            'direccion' => 'min:5|max:30|string',
            'name' => 'min:4|max:20|string',
            'cursos' => 'required'
        ]);

        $docente = Docente::findOrFail($id);

        //actualiza docente
        $docente->update($request->except(['name', 'password', 'perfil', 'cursos']));

        //Campo de cursos
        $docente->cursos()->sync($request->cursos);

        //actualiza docente->user
        if ($request->password == "") {
            $docente->user->update($request->only(['name']));
        } else {
            $docente->user->update(['name' => $request->name, 'password' => bcrypt($request->password)]);
        }

        //actualiza perfil o editar
        if ($request->perfil == 'true') {
            return redirect()->route('Perfil')->with('mensaje', 'ok');
        } else {
            return redirect()->route('admin.docentes.edit', $docente);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Docente  $docente
     * @return \Illuminate\Http\Response
     */
    public function destroy($docente)
    {
        Docente::destroy($docente);
        return redirect()->route('admin.docentes.index')->with('mensaje', 'ok');
    }
}
