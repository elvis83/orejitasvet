<?php

namespace App\Http\Controllers;

use App\TipoDocumento;

use App\Http\Requests\TipoDocumento\StoreRequest;

use App\Http\Requests\TipoDocumento\UpdateRequest;

use Illuminate\Http\Request;

class TipoDocumentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //dd(Role::all());
        return view('theme.backoffice.pages.tipodocumento.index',[
            'tipodocumentos' => \App\TipoDocumento::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('theme.backoffice.pages.tipodocumento.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request,TipoDocumento $tipodocumento)
    {
        $tipodocumento = $tipodocumento->store($request);
        alert()->success('Guardado', 'Exito')->autoclose(2000);
        return redirect()->route('backoffice.tipodocumento.show',$tipodocumento);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(TipoDocumento $tipodocumento)
    {
        return view('theme.backoffice.pages.tipodocumento.show', [
            'tipodocumento' => $tipodocumento,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(TipoDocumento $tipodocumento)
    {
        return view('theme.backoffice.pages.tipodocumento.edit', [
            'tipodocumento' => $tipodocumento,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, TipoDocumento $tipodocumento)
    {
        $tipodocumento->my_update($request);
        alert()->success('Actualizado', 'Exito')->autoclose(2000);
        return redirect()->route('backoffice.tipodocumento.show', $role);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(TipoDocumento $tipodocumento)
    {
        $tipodocumento->delete();
        alert()->success('     ', 'Rol eliminado')->autoclose(2000);
        return redirect()->route('backoffice.tipodocumento.index');
    }
}
