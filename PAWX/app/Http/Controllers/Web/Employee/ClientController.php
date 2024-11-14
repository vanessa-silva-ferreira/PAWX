<?php

namespace App\Http\Controllers\Web\Employee;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\View\View;

class ClientController extends Controller
{
    public function index(): View
    {
        $user = auth()->user();

        if (!Gate::allows('view-any-clients')) {
            abort(403, 'Unauthorized action.');
        }

        if ($user->getRole() === 'employee') {
            $clients = User::whereHas('client', function ($query) {
                $query->select('id', 'user_id');
            })
                ->with('client') // eager load the client relationship
                ->orderBy(Client::select('id')->whereColumn('users.id', 'clients.user_id'))
                ->simplePaginate(5);

            return view('pages.employee.clients.index', compact('clients'));
        }

        abort(403, 'Unauthorized action.');
    }

    public function show($clientId): View
    {
        $client = Client::findOrFail($clientId);
        $user = $client->user;

        if (Gate::denies('view-any-clients', $user)) {
            abort(403, 'Unauthorized action.');
        }

        if (!$client) {
            abort(404, 'Client not found.');
        }

        return view('pages.employee.clients.show', compact('client'));
    }
}
