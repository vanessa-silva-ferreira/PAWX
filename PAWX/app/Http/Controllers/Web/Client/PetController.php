<?php

namespace App\Http\Controllers\Web\Client;

use App\Http\Controllers\Controller;
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
            abort(403, 'Unauthorized action.');
        }

        $pets = Pet::where('client_id', $user->client->id)
            ->paginate(10);
        return view('pages.client.pets.index', compact('pets'));
    }

    public function show(Pet $pet): View
    {

        if(Gate::denies('view', $pet)){
            abort(403, 'Unauthorized action.');
        }

        return view('pages.client.pets.show', compact('pet'));
    }
}
