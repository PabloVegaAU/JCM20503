<?php

namespace App\Http\Controllers\Docente;

use App\Http\Controllers\Controller;
use App\Models\Curso;
use App\Models\Docente;
use App\Models\Horario;
use App\Models\Recursos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $docente = Auth::user()->docente;
        $horarios = Horario::Where('docente_id', $docente->id)->get();
        return view('DocenteViews.index', compact('docente', 'horarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $docente = Auth::user()->docente;
        return view('DocenteViews.create', compact('docente'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Docente  $docente
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $horarios = Horario::findOrFail($id); // Buscar Horario
        $docente = Docente::findOrFail($horarios->docente_id); // Buscar Docente
        $curso = Curso::findOrFail($horarios->curso_id); // Buscar Curso
        $recursos = Recursos::Where([['docente_id', '=', $docente->id], ['curso_id', '=', $curso->id]])->get(); // Buscar Recursos
        /* return $recursos; */
        return view('DocenteViews.show', compact('horarios', 'recursos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Docente  $docente
     * @return \Illuminate\Http\Response
     */
    public function edit(Docente $docente)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Docente  $docente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Docente $docente)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Docente  $docente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Docente $docente)
    {
        //
    }
}
