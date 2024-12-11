<?php

namespace App\Http\Controllers\Web\Employee;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePetRequest;
use App\Http\Requests\UpdatePetRequest;
use App\Models\Breed;
use App\Models\Client;
use App\Models\Pet;
use App\Models\Size;
use App\Models\Species;
use App\Traits\PetValidationRules;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

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
                    ->orWhereHas('breed', function ($query) use ($search) {
                        $query->where('name', 'like', "%$search%")
                            ->orWhereHas('species', function ($subQuery) use ($search) {
                                $subQuery->where('name', 'like', "%$search%");
                            });
                    })
                    ->orWhereHas('client', function ($query) use ($search) {
                        $query->where('name', 'like', "%$search%");
                    });
            });
        }

        $pets = $query->paginate(5);


        return view('pages.employee.pets.index', compact('pets'));
    }

    public function show($id): View
    {
        $pet = Pet::findOrFail($id);

        if (Gate::denies('view', $pet)) {
            abort(403, 'Unauthorized action.');
        }

        return view('pages.employee.pets.show', compact('pet'));
    }

    public function create(): View
    {
        if (Gate::denies('create', Pet::class)) {
            abort(403, 'Unauthorized action.');
        }

        $clients = Client::all();
        $sizes = Size::all();
        $species = Species::all();
        $breeds = Breed::select('id', 'name', 'fur_type', 'species_id')->get();

        return view('pages.employee.pets.create', compact('clients', 'sizes', 'breeds', 'species'));
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
        return redirect()->route('employee.pets.index')->with('success', 'Animal criado com sucesso.');
    }

    public function edit($id): View
    {
        $pet = Pet::with(['size', 'breed.species', 'photos'])->findOrFail($id);

        Gate::authorize('update', $pet);

        $clients = Client::all();
        $sizes = Size::all();
        $species = Species::all();
        $breeds = Breed::select('id', 'name', 'fur_type', 'species_id')->get();

        return view('pages.employee.pets.edit', compact('pet', 'clients', 'sizes', 'species', 'breeds'));
    }

    public function update(UpdatePetRequest $request, Pet $pet)
    {

        Gate::authorize('update', $pet);

        $pet->update($request->validated());

        if (isset($request->validated()['photos'])) {
            $pet->photos()->delete();
            $pet->photos()->createMany($request->validated()['photos']);
        }

        return redirect()->route('employee.pets.index')->with('success', 'Animal atualizado com sucesso!');
    }
}
