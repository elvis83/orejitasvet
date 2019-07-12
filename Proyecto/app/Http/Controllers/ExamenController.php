<?php

namespace App\Http\Controllers;

use App\Examen;
use Illuminate\Http\Request;
use App\Http\Requests\Examen\StoreRequest;
use App\Http\Requests\Examen\UpdateRequest;

class ExamenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('theme.backoffice.pages.examen.index', [
            'examenes' => Examen::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('theme.backoffice.pages.examen.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request, Examen $examen)
    {
        $examen = $examen->store($request);
        return redirect()->route('backoffice.examen.show', $examen);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\examen  $examen
     * @return \Illuminate\Http\Response
     */
    public function show(Examen $examen)
    {
        return view('theme.backoffice.pages.examen.show', [
            'examen' => $examen
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\examen  $examen
     * @return \Illuminate\Http\Response
     */
    public function edit(Examen $examen)
    {
        return view('theme.backoffice.pages.examen.edit', [
            'examen' => $examen
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\examen  $examen
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, Examen $examen)
    {
        $examen->my_update($request);
        return redirect()->route('backoffice.examen.show', $examen);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\examen  $examen
     * @return \Illuminate\Http\Response
     */
    public function destroy(Examen $examen)
    {
        $examen->delete();
        return redirect()->route('backoffice.examen.index');
    }
}
