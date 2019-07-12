<?php

namespace App\Http\Controllers;

use App\Diagnostico;
use Illuminate\Http\Request;
use App\Http\Requests\Diagnostico\StoreRequest;
use App\Http\Requests\Diagnostico\UpdateRequest;

class DiagnosticoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('theme.backoffice.pages.diagnostico.index', [
            'diagnosticos' => Diagnostico::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('theme.backoffice.pages.diagnostico.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request, Diagnostico $diagnostico)
    {
        $diagnostico = $diagnostico->store($request);
        return redirect()->route('backoffice.diagnostico.show', $diagnostico);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\examen  $examen
     * @return \Illuminate\Http\Response
     */
    public function show(Diagnostico $diagnostico)
    {
        return view('theme.backoffice.pages.diagnostico.show', [
            'diagnostico' => $diagnostico
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\examen  $examen
     * @return \Illuminate\Http\Response
     */
    public function edit(Diagnostico $diagnostico)
    {
        return view('theme.backoffice.pages.diagnostico.edit', [
            'diagnostico' => $diagnostico
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\examen  $examen
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, Diagnostico $diagnostico)
    {
        $diagnostico->my_update($request);
        return redirect()->route('backoffice.diagnostico.show', $diagnostico);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\examen  $examen
     * @return \Illuminate\Http\Response
     */
    public function destroy(Diagnostico $diagnostico)
    {
        $diagnostico->delete();
        return redirect()->route('backoffice.diagnostico.index');
    }
}
