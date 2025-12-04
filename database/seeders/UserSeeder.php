<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        $adminRole = Role::findByName('admin');
        $staffRole = Role::findByName('staff');
        $clientRole = Role::findByName('client');

        $admin = User::updateOrCreate(
            ['email' => 'admin@biblioteca.com'],
            [
                'name' => 'Admin User',
                'password' => Hash::make('password'),
                'member_number' => 'ADM-001',
                'phone' => '555-000-0001',
                'address' => 'Sede Central',
            ]
        );
        $admin->syncRoles([$adminRole]);

        $staff = User::updateOrCreate(
            ['email' => 'staff@biblioteca.com'],
            [
                'name' => 'Staff User',
                'password' => Hash::make('password'),
                'member_number' => 'STF-001',
                'phone' => '555-000-0002',
                'address' => 'Sucursal Centro',
            ]
        );
        $staff->syncRoles([$staffRole]);

        $client = User::updateOrCreate(
            ['email' => 'client@biblioteca.com'],
            [
                'name' => 'Client User',
                'password' => Hash::make('password'),
                'member_number' => 'CLT-001',
                'phone' => '555-000-0003',
                'address' => 'Sucursal Norte',
            ]
        );
        $client->syncRoles([$clientRole]);

        User::factory(2)->create()->each(fn ($u) => $u->assignRole($adminRole));
        User::factory(4)->create()->each(fn ($u) => $u->assignRole($staffRole));
        User::factory(9)->create()->each(fn ($u) => $u->assignRole($clientRole));
    }
}
