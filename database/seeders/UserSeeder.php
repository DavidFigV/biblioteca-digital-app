<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        $admin = User::create([
            'name' => 'Admin User',
            'email' => 'admin@biblioteca.com',
            'password' => Hash::make('password'),
            'member_number' => 'ADM-001',
            'phone' => '555-000-0001',
            'address' => 'Sede Central',
            'is_active' => true,
        ]);
        $admin->syncRoles(['admin']);

        $staff = User::create([
            'name' => 'Staff User',
            'email' => 'staff@biblioteca.com',
            'password' => Hash::make('password'),
            'member_number' => 'STF-001',
            'phone' => '555-000-0002',
            'address' => 'Sucursal Centro',
            'is_active' => true,
        ]);
        $staff->syncRoles(['staff']);

        $client = User::create([
            'name' => 'Client User',
            'email' => 'client@biblioteca.com',
            'password' => Hash::make('password'),
            'member_number' => 'CLT-001',
            'phone' => '555-000-0003',
            'address' => 'Sucursal Norte',
            'is_active' => true,
        ]);
        $client->syncRoles(['client']);
    }
}
