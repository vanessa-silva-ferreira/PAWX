<?php

namespace App\Http\Controllers\Web\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePetRequest;
use App\Http\Requests\UpdatePetRequest;
use Illuminate\Http\Request;
use App\Models\Pet;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

class PetController extends Controller
{
    public function index(): View
    {
        $user = Auth::user();

        if($user->getRole() !== 'client') {
            // abort(403, 'Unauthorized action.');
        }

        $pets = Pet::where('client_id', $user->client->id)
            ->paginate(10);
        return view('pages.client.pets.index', compact('pets'));
    }

    public function show(Pet $pet): View
    {
        if(Gate::denies('view', $pet)){
            // abort(403, 'Unauthorized action.');
        }

        return view('pages.client.pets.show', compact('pet'));
    }

    public function create()
    {
        return view('pages.client.pets.create');
    }

    public function store(StorePetRequest $request)
    {
        $client = auth()->user()->client;

        Pet::create(array_merge(
            $request->only([
                'name', 'birthdate', 'gender', 'medical_history',
                'spay_neuter_status', 'status', 'obs',
            ]),
            ['client_id' => $client->id]
        ));

        return redirect()->route('client.pets.index')->with('success', 'Pet added successfully!');
    }

    public function edit($id)
    {
        $pet = Pet::findOrFail($id);

         Gate::authorize('update', $pet);

        return view('pages.client.pets.edit', compact('pet'));
    }

    public function update(UpdatePetRequest $request, $id)
    {
        $pet = Pet::findOrFail($id);

        Gate::authorize('update', $pet);

        $petData = $request->validated();
        unset($petData['client_id']);

        $pet->update($petData);

        return redirect()->route('client.pets.index')->with('success', 'Pet updated successfully!');
    }


}
