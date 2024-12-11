<?php

namespace Database\Seeders;

use App\Models\Appointment;
use App\Enums\AppointmentStatus;
use Illuminate\Database\Seeder;

class AppointmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Appointment::updateOrCreate(['status' => AppointmentStatus::PENDING->value]);
        Appointment::updateOrCreate(['status' => AppointmentStatus::CONFIRMED->value]);
        Appointment::updateOrCreate(['status' => AppointmentStatus::CONFIRMED->value]);
        Appointment::updateOrCreate(['status' => AppointmentStatus::CANCELLED->value]);
        Appointment::updateOrCreate(['status' => AppointmentStatus::NO_SHOW->value]);
    }
}
