<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Customer;
use App\Models\Ticket;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $userRole  = Role::firstOrCreate(['name' => 'user']);

        $admin = User::firstOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'Admin Manager',
                'password' => Hash::make('password'),
            ]
        );
        $admin->assignRole($adminRole);

        $testUser = User::firstOrCreate(
            ['email' => 'test@example.com'],
            [
                'name' => 'Test User',
                'password' => Hash::make('password'),
            ]
        );
        $testUser->assignRole($userRole);

        User::factory(5)->create()->each(function ($user) use ($userRole) {
            $user->assignRole($userRole);
        });

        Customer::factory(10)
            ->has(Ticket::factory()->count(3))
            ->create();
    }
}
