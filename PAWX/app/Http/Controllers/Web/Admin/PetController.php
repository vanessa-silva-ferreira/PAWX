<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePetRequest;
use App\Http\Requests\UpdatePetRequest;
use App\Models\Client;
use App\Models\Pet;
use Illuminate\Support\Facades\Gate;
use Illuminate\View\View;

class PetController extends Controller
{
    public function index(): View
    {
        if(Gate::denies('viewAny', Pet::class)){
            abort(403, 'Unauthorized action.');
        }
        $pets = Pet::with('client')
            ->orderBy('id')
            ->simplePaginate(5);

        return view('pages.admin.pets.index', compact('pets'));
    }

    public function show($id): View
    {
        $pet = Pet::findOrFail($id);

        if(Gate::denies('view', $pet)){
            abort(403, 'Unauthorized action.');
        }

        return view('pages.admin.pets.show', compact('pet'));
    }

    public function create(): View {
        if(Gate::denies('create', Pet::class)){
            abort(403, 'Unauthorized action.');
        }

        $clients = Client::all();

        return view('pages.admin.pets.create', compact('clients'));
    }

    public function store(StorePetRequest $request) {
        if (Gate::denies('create', Pet::class)) {
            abort(403, 'Unauthorized action.');
        }

        Gate::authorize('create', Pet::class);

        $client_id = $request->input('client_id');

        if (!Client::where('id', $client_id)->exists()) {
            return back()->withErrors('O cliente selecionado não existe.');
        }

        Pet::create(array_merge(
            $request->only([
                'name', 'birthdate', 'gender', 'medical_history',
                'spay_neuter_status', 'status', 'obs',
            ]),
            ['client_id' => $client_id]
        ));

        return redirect()->route('admin.pets.index')->with('success', 'Animal criado com sucesso.');
    }

    public function edit($id): View
    {
        $pet = Pet::findOrFail($id);

        Gate::authorize('update', $pet);

        $clients = Client::all();

        return view('pages.admin.pets.edit', compact('pet', 'clients'));
    }

    public function update(UpdatePetRequest $request, Pet $pet) {

        $pet->update($request->validated());

        return redirect()->route('admin.pets.index')->with('success', 'Animal atualizado com sucesso!');
    }
}
