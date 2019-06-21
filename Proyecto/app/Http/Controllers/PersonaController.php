<?php

namespace App\Http\Controllers;

use App\Persona;

use App\TipoDocumento;

use App\Http\Requests\Persona\StoreRequest;

use App\Http\Requests\Persona\UpdateRequest;

use Illuminate\Http\Request;

class PersonaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('theme.backoffice.pages.persona.index',[
            'personas' => Persona::all(),
        ]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('theme.backoffice.pages.persona.create',[
            'tipodocumentos' => TipoDocumento::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request,Persona $persona)
    {
        $persona = $persona->store($request);
        alert()->success('Guardado', 'Exito')->autoclose(2000);
        dd($request);//return redirect()->route('backoffice.persona.show',$persona);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function show(Persona $persona)
    {
        return view('theme.backoffice.pages.persona.show', [
            'persona' => $persona,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function edit(Persona $persona)
    {
        return view('theme.backoffice.pages.persona.edit', [
            'persona' => $persona,
            'tipodocumentos' => TipoDocumento::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, Persona $persona)
    {
        $persona->my_update($request);
        alert()->success('Actualizado', 'Exito')->autoclose(2000);
        return redirect()->route('backoffice.persona.show', $persona);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function destroy(Persona $persona)
    {
        $persona->delete();
        alert()->success('     ', 'Rol eliminado')->autoclose(2000);
        return redirect()->route('backoffice.persona.index');
    }
}
