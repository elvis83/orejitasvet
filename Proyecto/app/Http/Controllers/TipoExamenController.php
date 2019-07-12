<?php

namespace App\Http\Controllers;

use App\TipoExamen;
use Illuminate\Http\Request;
use App\Http\Requests\TipoExamen\StoreRequest;
use App\Http\Requests\TipoExamen\UpdateRequest;

class TipoExamenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('theme.backoffice.pages.tipoexamen.index', [
            'tipoexamenes' => TipoExamen::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('theme.backoffice.pages.tipoexamen.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request, TipoExamen $tipoexamen)
    {
        $tipoexamen = $tipoexamen->store($request);
        return redirect()->route('backoffice.tipoexamen.show', $tipoexamen);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\examen  $examen
     * @return \Illuminate\Http\Response
     */
    public function show(TipoExamen $tipoexamen)
    {
        return view('theme.backoffice.pages.tipoexamen.show', [
            'tipoexamen' => $tipoexamen
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\examen  $examen
     * @return \Illuminate\Http\Response
     */
    public function edit(TipoExamen $tipoexamen)
    {
        return view('theme.backoffice.pages.tipoexamen.edit', [
            'tipoexamen' => $examen
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\examen  $examen
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, TipoExamen $tipoexamen)
    {
        $examen->my_update($request);
        return redirect()->route('backoffice.tipoexamen.show', $tipoexamen);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\examen  $examen
     * @return \Illuminate\Http\Response
     */
    public function destroy(TipoExamen $tipoexamen)
    {
        $tipoexamen->delete();
        return redirect()->route('backoffice.tipoexamen.index');
    }
}
