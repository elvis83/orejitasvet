<?php

namespace App\Http\Controllers;

use App\Servicio;
use Illuminate\Http\Request;
use App\Http\Requests\Servicio\StoreRequest;
use App\Http\Requests\Servicio\UpdateRequest;

class ServicioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('theme.backoffice.pages.servicio.index', [
            'servicios' => Servicio::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('theme.backoffice.pages.servicio.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request, Servicio $servicio)
    {
        $servicio = $servicio->store($request);
        return redirect()->route('backoffice.servicio.show', $servicio);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\servicio  $servicio
     * @return \Illuminate\Http\Response
     */
    public function show(Servicio $servicio)
    {
        return view('theme.backoffice.pages.servicio.show', [
            'servicio' => $servicio
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\servicio  $servicio
     * @return \Illuminate\Http\Response
     */
    public function edit(Servicio $servicio)
    {
        return view('theme.backoffice.pages.servicio.edit', [
            'servicio' => $servicio
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\servicio  $servicio
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, Servicio $servicio)
    {
        $servicio->my_update($request);
        return redirect()->route('backoffice.servicio.show', $servicio);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\servicio  $servicio
     * @return \Illuminate\Http\Response
     */
    public function destroy(Servicio $servicio)
    {
        $servicio->delete();
        return redirect()->route('backoffice.servicio.index');
    }
}
