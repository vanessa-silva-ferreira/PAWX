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
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\View\View;
use App\Traits\PetValidationRules;
use Illuminate\Support\Facades\Storage;

class PetController extends Controller
{
    use PetValidationRules;
    public function index(Request $request): View
    {
        if (Gate::denies('viewAny', Pet::class)) {
            abort(403, 'Unauthorized action.');
        }

        $search = $request->input('search');

        $query = Pet::with('client')
            ->orderByDesc('id');

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%$search%")
                    ->orWhere('species', 'like', "%$search%")
                    ->orWhere('breed', 'like', "%$search%")
                    ->orWhereHas('client', fn($q) => $q->where('name', 'like', "%$search%"));
            });
        }

        $pets = $query->paginate(5);

        return view('pages.admin.pets.index', compact('pets'));
    }

    public function show($id): View
    {
        $pet = Pet::findOrFail($id);

        Gate::authorize('view', $pet);

        return view('pages.admin.pets.show', compact('pet'));
    }

    public function create(): View {

        Gate::authorize('create', Pet::class);

        $clients = Client::all();
        $sizes = Size::all();
        $species = Species::all();
        $breeds = Breed::select('id', 'name', 'fur_type', 'species_id')->get();

        return view('pages.admin.pets.create', compact('clients', 'sizes', 'breeds', 'species'));
    }

    public function store(StorePetRequest $request)
    {
        Gate::authorize('create', Pet::class);

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
        $pet = Pet::with(['size', 'breed.species', 'photos'])->findOrFail($id);

        if (!Gate::allows('update', $pet)) {
            abort(403, 'Não autorizado.');
        }

        $clients = Client::all();
        $sizes = Size::all();
        $species = Species::all();
        $breeds = Breed::select('id', 'name', 'fur_type', 'species_id')->get();

        return view('pages.admin.pets.edit', compact('pet', 'clients', 'sizes', 'species', 'breeds'));
    }

    public function update(UpdatePetRequest $request, Pet $pet) {

        Gate::authorize('update', $pet);
        $validatedData = $request->validate($this->petRules());

        $pet->update($this->extractPetData($validatedData));

        if ($request->hasFile('photos')) {
            $pet->photos()->delete();
            $uploadedPhotos = $this->handlePhotos($request->file('photos'));
            $pet->photos()->createMany($uploadedPhotos);
        }

        return redirect()->route('admin.pets.index')->with('success', 'Animal atualizado com sucesso.');
    }

    public function destroy($id)
    {
        $pet = Pet::findOrFail($id);

        $pet->delete();

        return redirect()->route('admin.pets.index')
            ->with('success', 'Animal removida com sucesso.');
    }
}
