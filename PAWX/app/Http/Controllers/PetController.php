<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePetRequest;
use App\Http\Requests\UpdatePetRequest;
use App\Models\Client;
use App\Models\Pet;

class PetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pets = Pet::paginate(15);
        return view('pages.pets.index', ['pets' => $pets]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.pets.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePetRequest $request)
    {
        Pet::create($request->only([
            'name', 'birthdate', 'gender', 'medical_history',
            'spay_neuter_status', 'status', 'obs'
        ]));

        return redirect('/pets')->with('success', 'Pet created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pet $pet)
    {
        return view('pages.pets.show', ['pet' => $pet]);
    }

    /**
     * Show the form for editing the specified resource.
     */

    public function edit(Pet $pet)
    {
        $clients = Client::all();
        return view('pages.pets.edit', ['pet' => $pet, 'clients' => $clients]);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePetRequest $request, Pet $pet)
    {
        $pet->update($request->only([
            'name', 'birthdate', 'gender', 'medical_history',
            'spay_neuter_status', 'status', 'obs'
        ]));

        return redirect('/pets')->with('success', 'Pet updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pet $pet)
    {
        //
    }

    public function softDelete(Pet $pet)
    {
        $pet->delete();
        return redirect('/pets')->with('success', 'Pet deleted!');
    }
}
