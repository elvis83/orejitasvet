<?php

namespace App\Http\Controllers;

use App\TurnoMedico;
use App\User;
use Illuminate\Http\Request;

class TurnoMedicoController extends Controller
{
    public function index()
    {
        //$this->authorize('index',Role::class);
        return view('theme.backoffice.pages.turnomedico.index',[
            'turnomedicos' => TurnoMedico::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //$this->authorize('create',Role::class);
        return view('theme.backoffice.pages.turnomedico.create',[
            'users' => User::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request, TipoServicio $tiposervicio)
    {
        $tiposervicio = $tiposervicio->store($request);
        return redirect()->route('backoffice.tiposervicio.show', $tiposervicio);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\servicio  $servicio
     * @return \Illuminate\Http\Response
     */
    public function show(TipoServicio $tiposervicio)
    {
        //$this->authorize('view', $tiposervicio);
        return view('theme.backoffice.pages.tiposervicio.show',[
            'tiposervicio' => $tiposervicio
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\servicio  $servicio
     * @return \Illuminate\Http\Response
     */
    public function edit(TipoServicio $tiposervicio)
    {
        //$this->authorize('update', $tiposervicio);
        return view('theme.backoffice.pages.tiposervicio.edit',[
            'tiposervicio' => $tiposervicio,
            'servicios' => Servicio::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\servicio  $servicio
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, TipoServicio $tiposervicio)
    {
        $tiposervicio->my_update($request);
        return redirect()->route('backoffice.tiposervicio.show', $tiposervicio);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\servicio  $servicio
     * @return \Illuminate\Http\Response
     */
    public function destroy(TipoServicio $tiposervicio)
    {
        //$this->authorize('delete', $tiposervicio);
        $servicio = $tiposervicio->servicio;
        $tiposervicio->delete();
        alert()->success('     ', 'Permiso eliminado')->autoclose(2000);
        return redirect()->route('backoffice.servicio.show', $servicio);
    }
}
