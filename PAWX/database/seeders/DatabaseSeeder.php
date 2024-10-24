<?php

namespace Database\Seeders;

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
        /*User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => Hash::make('password')
        ]);

        User::factory()->create([
            'name' => 'Test Two',
            'email' => 'test_two@example.com',
            'password' => Hash::make('password')
        ]);

        Admin::factory()->create([
            'user_id' => '11'
        ]);

        Employee::factory()->create([
            'user_id' => '12'
        ]);
        */
        // Create regular users
        User::factory(10)->create();

        // Create admin user
        $adminUser = User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('password')
        ]);

        Admin::factory()->create([
            'user_id' => $adminUser->id
        ]);

// Create employee user
        $employeeUser = User::factory()->create([
            'name' => 'Employee User',
            'email' => 'employee@example.com',
            'password' => Hash::make('password')
        ]);

        Employee::factory()->create([
            'user_id' => $employeeUser->id
        ]);
    }
}
