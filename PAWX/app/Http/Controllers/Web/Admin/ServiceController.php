<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreServiceRequest;
use App\Http\Requests\UpdateServiceRequest;
use App\Models\Service;
use Illuminate\Support\Facades\Gate;
use Illuminate\View\View;

class ServiceController extends Controller
{
    /**
     * Display a listing of services.
     */
    public function index(): View
    {
        if (Gate::denies('viewAny', Service::class)) {
            abort(403, 'Unauthorized action.');
        }

        $services = Service::orderBy('name', 'asc')->paginate(10);

        return view('pages.admin.services.index', compact('services'));
    }

    /**
     * Show the form for creating a new service.
     */
    public function create(): View
    {
        if (Gate::denies('create', Service::class)) {
            abort(403, 'Unauthorized action.');
        }

        return view('pages.admin.services.create');
    }

    /**
     * Store a newly created service in storage.
     */
    public function store(StoreServiceRequest $request)
    {
        if (Gate::denies('create', Service::class)) {
            abort(403, 'Unauthorized action.');
        }

        Service::create($request->validated());

        return redirect()->route('admin.services.index')
            ->with('success', 'Service created successfully!');
    }

    /**
     * Show the form for editing the specified service.
     */
    public function edit($id): View
    {
        $service = Service::findOrFail($id);

        if (Gate::denies('update', $service)) {
            abort(403, 'Unauthorized action.');
        }

        return view('pages.admin.services.edit', compact('service'));
    }

    /**
     * Update the specified service in storage.
     */
    public function update(UpdateServiceRequest $request, $id)
    {
        $service = Service::findOrFail($id);

        if (Gate::denies('update', $service)) {
            abort(403, 'Unauthorized action.');
        }

        $service->update($request->validated());

        return redirect()->route('admin.services.index')
            ->with('success', 'Service updated successfully!');
    }

    /**
     * Remove the specified service from storage.
     */
    public function destroy($id)
    {
        $service = Service::findOrFail($id);

        if (Gate::denies('delete', $service)) {
            abort(403, 'Unauthorized action.');
        }

        $service->delete();

        return redirect()->route('admin.services.index')
            ->with('success', 'Service deleted successfully!');
    }

    /**
     * Return a list of services as JSON (useful for appointments).
     */
    public function list(): \Illuminate\Http\JsonResponse
    {
        $services = Service::select('id', 'name', 'cost', 'price', 'obs')->get();

        return response()->json($services);
    }
}
