<?php

namespace App\Http\Controllers;

use App\Pet;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\Pet\StoreRequest;
use App\Http\Requests\Pet\UpdateRequest;

class PetController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('theme.backoffice.pages.pet.index', [
            'pets' => Pet::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create',User::class);
        return view('theme.backoffice.pages.pet.create',[
            'users' => auth()->user()->visible_users(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request, Pet $pet)
    {
        $pet = $pet->store($request);
        return redirect()->route('backoffice.pet.show', $pet);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pet  $pet
     * @return \Illuminate\Http\Response
     */
    public function show(Pet $pet)
    {
        $this->authorize('view', $pet);
        return view('theme.backoffice.pages.pet.show',[
            'pet' => $pet
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pet  $pet
     * @return \Illuminate\Http\Response
     */
    public function edit(Pet $pet)
    {
        $this->authorize('update', $pet);
        return view('theme.backoffice.pages.pet.edit',[
            'pet' => $pet,
            'users' => auth()->user()->visible_users(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pet  $pet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pet $pet)
    {
        $pet->my_update($request);
        return redirect()->route('backoffice.pet.show',$pet);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pet  $pet
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pet $pet)
    {
        $this->authorize('delete', $pet);
        $user = $pet->user;
        $pet->delete();
        alert()->success('     ', 'Registro eliminado')->autoclose(2000);
        return redirect()->route('backoffice.pet.index');
    }
}
