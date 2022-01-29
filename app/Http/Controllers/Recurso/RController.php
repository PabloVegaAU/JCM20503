<?php

namespace App\Http\Controllers\Recurso;

use App\Http\Controllers\Controller;
use App\Models\Horario;
use App\Models\Recursos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class RController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('RecursosViews.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'recurso' => 'required|file',
            'nrecurso' => 'string|required|unique:recursos',
            'horario_id' => 'required'
        ]);
        if ($request->hasFile("recurso")) {
            $file = $request->file("recurso");
            $nombre = $request->nrecurso . "." . $file->guessExtension();
            $ruta = storage_path("app/public/recursos/" . $nombre);
            if ($file->guessExtension() == "pdf") {
                copy($file, $ruta);
                $nuevoR = Recursos::Create([
                    'docente_id' => Auth::user()->docente->id,
                    'curso_id' => $request->curso_id,
                    'nrecurso' => $request->nrecurso,
                    'ruta' => $ruta, 'nclase' => $request->nclase,
                    'momento' => $request->momento
                ]);

                return redirect()->route('docente.show', $request->horario_id);
            } else {
                return redirect()->route('docente.show', $request->horario_id);
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Recursos  $recursos
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $recurso = Recursos::FindOrFail($id);
        /* return $recurso; */
        return Storage::download('public/recursos/' . $recurso->nrecurso . '.pdf');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Recursos  $recursos
     * @return \Illuminate\Http\Response
     */
    public function edit(Recursos $recursos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Recursos  $recursos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Recursos $recursos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Recursos  $recursos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Recursos $recursos)
    {
        //
    }
}
