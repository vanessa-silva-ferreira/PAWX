<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Client;
use App\Models\Employee;
use App\Models\Pet;
use App\Models\Service;

class TrashController extends Controller
{
    public function index()
    {
        $employees = Employee::onlyTrashed()->get()->map(function ($employee) {
            return [
                'id' => $employee->id,
                'type' => 'Employee',
                'created_at' => $employee->created_at,
                'deleted_at' => $employee->deleted_at,
            ];
        });

        $clients = Client::onlyTrashed()->get()->map(function ($client) {
            return [
                'id' => $client->id,
                'type' => 'Client',
                'created_at' => $client->created_at,
                'deleted_at' => $client->deleted_at,
            ];
        });

        $pets = Pet::onlyTrashed()->get()->map(function ($pet) {
            return [
                'id' => $pet->id,
                'type' => 'Pet',
                'created_at' => $pet->created_at,
                'deleted_at' => $pet->deleted_at,
            ];
        });

        $appointments = Appointment::onlyTrashed()->get()->map(function ($appointment) {
            return [
                'id' => $appointment->id,
                'type' => 'Appointment',
                'created_at' => $appointment->created_at,
                'deleted_at' => $appointment->deleted_at,
            ];
        });

        $services = Service::onlyTrashed()->get()->map(function ($service) {
            return [
                'id' => $service->id,
                'type' => 'Service',
                'created_at' => $service->created_at,
                'deleted_at' => $service->deleted_at,
            ];
        });

        $trashed = $employees
            ->concat($clients)
            ->concat($pets)
            ->concat($appointments)
            ->concat($services)
            ->sortByDesc('deleted_at');

        return view('pages.admin.trash', ['trashed' => $trashed]);
    }

    public function restore($id, $type)
    {
        $model = $this->getModel($type)::withTrashed()->findOrFail($id);

        if (in_array($type, ['Employee', 'Client'])) {
            if ($model->user()->withTrashed()->exists()) {
                $model->user()->restore();
            }
        }

        $model->restore();

        return redirect()->route('admin.trashed.index')
            ->with('success', "{$type} restaurado com sucesso.");
    }

    public function forceDelete($id, $type)
    {
        $model = $this->getModel($type)::withTrashed()->findOrFail($id);

        if ($type === 'Service') {
            $appointments = Appointment::where('service_id', $model->id)->get();

            foreach ($appointments as $appointment) {
                \DB::table('financial_reports')->where('appointment_id', $appointment->id)->delete();
            }

            Appointment::where('service_id', $model->id)->delete();
        }

        if ($type === 'Appointment') {
            \DB::table('financial_reports')->where('appointment_id', $model->id)->delete();

            $model->forceDelete();
        }

        $model->forceDelete();

        return redirect()->route('admin.trashed.index')
            ->with('success', "{$type} removido permanentemente.");
    }


    private function getModel($type)
    {
        $models = [
            'Employee' => Employee::class,
            'Client' => Client::class,
            'Pet' => Pet::class,
            'Appointment' => Appointment::class,
            'Service' => Service::class,
        ];

        return $models[$type] ?? abort(404, 'Tipo Inválido');
    }
}
