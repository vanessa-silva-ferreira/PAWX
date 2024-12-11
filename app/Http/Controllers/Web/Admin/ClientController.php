<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Client;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\View\View;

class ClientController extends Controller
{
    public function index(Request $request): View
    {
        Gate::authorize('view-any-clients');

        $search = $request->input('search');

        $query = User::whereHas('client')
            ->with('client')
            ->orderByDesc(
                Client::selectRaw('MAX(id)')
                    ->whereColumn('users.id', 'clients.user_id')
            );

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%$search%")
                    ->orWhere('email', 'like', "%$search%")
                    ->orWhere('phone_number', 'like', "%$search%")
                    ->orWhere('nif', 'like', "%$search%")
                    ->orWhere('address', 'like', "%$search%")
                    ->orWhere('username', 'like', "%$search%");
            });
        }

        $clients = $query->paginate(5);

        return view('pages.admin.clients.index', compact('clients'));
    }

    public function show($clientId): View
    {
        $client = Client::with('user')->findOrFail($clientId);

        Gate::authorize('view-any-clients', $client->user);

        return view('pages.admin.clients.show', compact('client'));
    }

    public function create()
    {
        Gate::authorize('manage-clients');

        return view('pages.admin.clients.create');
    }

    public function store(StoreUserRequest $request)
    {
        $userData = $request->validated();
        $userData['password'] = bcrypt($userData['password']);

        $user = User::create($userData);
        Client::create([
            'user_id' => $user->id,
        ]);

        return redirect()->route('admin.clients.index')->with('success', 'Cliente criado com sucesso.');
    }

    public function edit($id)
    {
        $client = Client::with('user')->findOrFail($id);

        Gate::authorize('manage-clients');

        return view('pages.admin.clients.edit', compact('client'));
    }

    public function update(UpdateUserRequest $request, $id)
    {
        $client = Client::with('user')->findOrFail($id);

        Gate::authorize('manage-clients');

        $userData = $request->validated();

        if (!empty($userData['password'])) {
            $userData['password'] = bcrypt($userData['password']);
        } else {
            unset($userData['password']);
        }

        $client->user->update($userData);

        return redirect()->route('admin.clients.show', $client->id)
            ->with('success', 'Cliente atualizado com sucesso.');
    }

    public function destroy($id)
    {
        $client = Client::with('user')->findOrFail($id);

        Gate::authorize('manage-clients');

        $client->user->delete();

        return redirect()->route('admin.clients.index')
            ->with('success', 'Cliente removido com sucesso.');
    }
//    public function trashed()
//    {
//        $clients = Client::onlyTrashed()->with('user')->paginate(5);
//        return view('pages.admin.clients.trashed', compact('clients'));
//    }
//
//    public function restore($id)
//    {
//        $client = Client::withTrashed()->with('user')->findOrFail($id);
//
//        Gate::authorize('manage-clients');
//
//        $client->user->restore();
//
//        return redirect()->route('admin.clients.trashed')
//            ->with('success', 'Cliente restaurado com sucesso.');
//    }
//
//    public function forceDelete($id)
//    {
//        $client = Client::withTrashed()->with('user')->findOrFail($id);
//
//        Gate::authorize('manage-clients');
//
//        $client->user->forceDelete();
//
//        return redirect()->route('admin.clients.trashed')
//            ->with('success', 'Cliente removido permanentemente.');
//    }
}
