<?php

namespace App\Http\Controllers;

use App\RecetaMedica;
use Illuminate\Http\Request;
use App\Http\Requests\RecetaMedica\StoreRequest;
use App\Http\Requests\RecetaMedica\UpdateRequest;

class RecetaMedicaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('theme.backoffice.pages.recetamedica.index', [
            'recetamedicas' => RecetaMedica::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('theme.backoffice.pages.recetamedica.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request, RecetaMedica $recetamedica)
    {
        $recetamedica = $recetamedica->store($request);
        return redirect()->route('backoffice.recetamedica.show', $recetamedica);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\examen  $examen
     * @return \Illuminate\Http\Response
     */
    public function show(RecetaMedica $recetamedica)
    {
        return view('theme.backoffice.pages.recetamedica.show', [
            'recetamedica' => $recetamedica
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\examen  $examen
     * @return \Illuminate\Http\Response
     */
    public function edit(RecetaMedica $recetamedica)
    {
        return view('theme.backoffice.pages.recetamedica.edit', [
            'recetamedica' => $recetamedica
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\examen  $examen
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, Diagnostico $recetamedica)
    {   
    	$recetamedica->my_update($request);
        return redirect()->route('backoffice.recetamedica.show', $recetamedica);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\examen  $examen
     * @return \Illuminate\Http\Response
     */
    public function destroy(Diagnostico $recetamedica)
    {
        $recetamedica->delete();
        return redirect()->route('backoffice.recetamedica.index');
    }
}
