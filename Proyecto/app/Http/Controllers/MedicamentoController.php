<?php

namespace App\Http\Controllers;

use App\Medicamento;
use Illuminate\Http\Request;
use App\Http\Requests\Medicamento\StoreRequest;
use App\Http\Requests\Medicamento\UpdateRequest;

class MedicamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('theme.backoffice.pages.medicamento.index', [
            'medicamentos' => Medicamento::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('theme.backoffice.pages.medicamento.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request, Medicamento $medicamento)
    {
        $medicamento = $medicamento->store($request);
        return redirect()->route('backoffice.medicamento.show', $medicamento);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\medicamento  $medicamento
     * @return \Illuminate\Http\Response
     */
    public function show(Medicamento $medicamento)
    {
        return view('theme.backoffice.pages.medicamento.show', [
            'medicamento' => $medicamento
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\medicamento  $medicamento
     * @return \Illuminate\Http\Response
     */
    public function edit(Medicamento $medicamento)
    {
        return view('theme.backoffice.pages.medicamento.edit', [
            'medicamento' => $medicamento
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\medicamento  $medicamento
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, Medicamento $medicamento)
    {
        $medicamento->my_update($request);
        return redirect()->route('backoffice.medicamento.show', $medicamento);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\medicamento  $medicamento
     * @return \Illuminate\Http\Response
     */
    public function destroy(Medicamento $medicamento)
    {
        $medicamento->delete();
        return redirect()->route('backoffice.medicamento.index');
    }
}
