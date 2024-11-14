<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
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
}
