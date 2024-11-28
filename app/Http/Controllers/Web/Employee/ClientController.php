<?php

namespace App\Http\Controllers\Web\Employee;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use App\Models\Client;
use Illuminate\Support\Facades\Gate;
use Illuminate\View\View;

class ClientController extends Controller
{
    public function index(): View
    {
        Gate::authorize('view-any-clients');

        $clients = User::whereHas('client')
            ->with('client')
            ->orderByDesc(Client::select('id')->whereColumn('users.id', 'clients.user_id'))
            ->simplePaginate(5);

        return view('pages.employee.clients.index', compact('clients'));
    }

    public function show($clientId): View
    {
        $client = Client::with('user')->findOrFail($clientId);

        Gate::authorize('view-any-clients', $client->user);

        return view('pages.employee.clients.show', compact('client'));
    }

    public function create()
    {
        Gate::authorize('manage-clients');

        return view('pages.employee.clients.create');
    }

    public function store(StoreUserRequest $request)
    {
        $userData = $request->validated();
        $userData['password'] = bcrypt($userData['password']);

        $user = User::create($userData);
        Client::create([
            'user_id' => $user->id,
        ]);

        return redirect()->route('employee.clients.index')->with('success', 'Cliente criado com sucesso.');
    }

    public function edit($id)
    {
        $client = Client::with('user')->findOrFail($id);

        Gate::authorize('manage-clients');

        return view('pages.employee.clients.edit', compact('client'));
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

        return redirect()->route('employee.clients.show', $client->id)
            ->with('success', 'Cliente atualizado com sucesso.');
    }
}
