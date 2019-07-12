<?php

namespace App\Http\Controllers;

use App\Insumo;
use App\Role;
use Illuminate\Http\Request;
use App\Http\Requests\Insumo\StoreRequest;
use App\Http\Requests\Insumo\UpdateRequest;

class InsumoController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:' . config('app.admin_role'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('index',Role::class);
        return view('theme.backoffice.pages.insumo.index', [
            'insumos' => \App\Insumo::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create',Role::class);
        return view('theme.backoffice.pages.insumo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request, Insumo $insumo)
    {
        $insumo = $insumo->store($request);
        alert()->success('Guardado', 'Exito')->autoclose(2000);
        return redirect()->route('backoffice.insumo.show', $insumo);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\insumo  $insumo
     * @return \Illuminate\Http\Response
     */
    public function show(Insumo $insumo)
    {
        $this->authorize('view',$insumo);
        return view('theme.backoffice.pages.insumo.show', [
            'insumo' => $insumo
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\insumo  $insumo
     * @return \Illuminate\Http\Response
     */
    public function edit(Insumo $insumo)
    {
        $this->authorize('update', $insumo);
        return view('theme.backoffice.pages.insumo.edit', [
            'insumo' => $insumo
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\insumo  $insumo
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, Insumo $insumo)
    {
        $insumo->my_update($request);
        return redirect()->route('backoffice.insumo.show', $insumo);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\insumo  $insumo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Insumo $insumo)
    {
        $this->authorize('delete', $insumo);
        $insumo->delete();
        return redirect()->route('backoffice.insumo.index');
    }
}
