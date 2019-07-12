<?php

namespace App\Http\Controllers;

use App\RecetaDetalle;
use Illuminate\Http\Request;
use App\Http\Requests\RecetaDetalle\StoreRequest;
use App\Http\Requests\RecetaDetalle\UpdateRequest;

class RecetaDetalleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('theme.backoffice.pages.recetadetalle.index', [
            'recetadetalles' => RecetaDetalle::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('theme.backoffice.pages.recetadetalle.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request, RecetaDetalle $recetadetalle)
    {
        $recetadetalle = $recetadetalle->store($request);
        return redirect()->route('backoffice.recetadetalle.show', $recetadetalle);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\examen  $examen
     * @return \Illuminate\Http\Response
     */
    public function show(RecetaDetalle $recetadetalle)
    {
        return view('theme.backoffice.pages.recetadetalle.show', [
            'recetadetalle' => $recetadetalle
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\examen  $examen
     * @return \Illuminate\Http\Response
     */
    public function edit(RecetaDetalle $recetadetalle)
    {
        return view('theme.backoffice.pages.recetadetalle.edit', [
            'recetadetalle' => $recetadetalle
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\examen  $examen
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, RecetaDetalle $diarecetadetallegnostico)
    {
        $recetadetalle->my_update($request);
        return redirect()->route('backoffice.recetadetalle.show', $recetadetalle);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\examen  $examen
     * @return \Illuminate\Http\Response
     */
    public function destroy(RecetaDetalle $recetadetalle)
    {
        $recetadetalle->delete();
        return redirect()->route('backoffice.recetadetalle.index');
    }
}
