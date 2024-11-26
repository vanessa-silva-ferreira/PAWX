<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePetRequest;
use App\Http\Requests\UpdatePetRequest;
use App\Models\Breed;
use App\Models\Client;
use App\Models\Pet;
use App\Models\Size;
use App\Models\Species;
use Illuminate\Support\Facades\Gate;
use Illuminate\View\View;
use App\Traits\PetValidationRules;
use Illuminate\Support\Facades\Storage;

class PetController extends Controller
{
    use PetValidationRules;
    public function index(): View
    {
        if(Gate::denies('viewAny', Pet::class)){
            abort(403, 'Unauthorized action.');
        }
        $pets = Pet::with('client')
            ->orderByDesc('id')
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
        $sizes = Size::all();
        $species = Species::all();
        $breeds = Breed::select('id', 'name', 'fur_type', 'species_id')->get();

        return view('pages.admin.pets.create', compact('clients', 'sizes', 'breeds', 'species'));
    }

    public function store(StorePetRequest $request)
    {
        if (Gate::denies('create', Pet::class)) {
            abort(403, 'Unauthorized action.');
        }

        $client_id = $request->input('client_id');
        if (!Client::where('id', $client_id)->exists()) {
            return back()->withErrors('O cliente selecionado não existe.');
        }

        $petData = $this->extractPetData($request->all());
        $pet = Pet::create($petData);

        if ($request->hasFile('photos')) {
            foreach ($request->file('photos') as $photo) {
                $path = Storage::putFile('public/photos', $photo, 'public');
                $photoUrl = Storage::url($path);

                $pet->photos()->create([
                    'photo_url' => $photoUrl,
                    'description' => null,
                    'uploaded_at' => now(),
                ]);
            }
        }
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
