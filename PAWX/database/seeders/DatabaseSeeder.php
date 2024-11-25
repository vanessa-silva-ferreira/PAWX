<?php

namespace Database\Seeders;

use App\Models\Client;
use App\Models\User;
use App\Models\Admin;
use App\Models\Employee;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $adminUser = User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('password')
        ]);

        Admin::factory()->create([
            'user_id' => $adminUser->id
        ]);

        $employeeUser = User::factory()->create([
            'name' => 'Employee User',
            'email' => 'employee@example.com',
            'password' => Hash::make('password')
        ]);

        Employee::factory()->create([
            'user_id' => $employeeUser->id
        ]);

        $clientUser = User::factory()->create([
            'name' => 'Client User',
            'email' => 'client@example.com',
            'password' => Hash::make('password')
        ]);

        Client::factory()->create([
            'user_id' => $clientUser->id
        ]);

        User::factory(50)->create();
        Employee::factory(20)->create();
        Client::factory(20)->create();
        $this->call(PetSeeder::class);
    }
}
