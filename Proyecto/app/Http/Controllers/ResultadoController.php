<?php

namespace App\Http\Controllers;

use App\Resultado;
use Illuminate\Http\Request;
use App\Http\Requests\Resultado\StoreRequest;
use App\Http\Requests\Resultado\UpdateRequest;

class ResultadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('theme.backoffice.pages.resultado.index', [
            'resultados' => Resultado::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('theme.backoffice.pages.resultado.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request, Resultado $resultado)
    {
        $resultado = $resultado->store($request);
        return redirect()->route('backoffice.resultado.show', $resultado);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\examen  $examen
     * @return \Illuminate\Http\Response
     */
    public function show(Resultado $resultado)
    {
        return view('theme.backoffice.pages.resultado.show', [
            'resultado' => $resultado
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\examen  $examen
     * @return \Illuminate\Http\Response
     */
    public function edit(Resultado $resultado)
    {
        return view('theme.backoffice.pages.resultado.edit', [
            'resultado' => $examen
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\examen  $examen
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, Resultado $tipresultadooexamen)
    {
        $examen->my_update($request);
        return redirect()->route('backoffice.resultado.show', $resultado);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\examen  $examen
     * @return \Illuminate\Http\Response
     */
    public function destroy(Resultado $resultado)
    {
        $resultado->delete();
        return redirect()->route('backoffice.resultado.index');
    }
}
