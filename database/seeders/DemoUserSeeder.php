<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DemoUserSeeder extends Seeder
{
    public function run(): void
    {
        $users = [
            [
                'name' => 'Cliente Demo',
                'email' => 'cliente@goldenwind.test',
                'phone' => '555-0101',
                'role' => User::ROLE_CLIENTE,
            ],
            [
                'name' => 'Empleado Demo',
                'email' => 'empleado@goldenwind.test',
                'phone' => '555-0202',
                'role' => User::ROLE_EMPLEADO,
            ],
            [
                'name' => 'Gerente Demo',
                'email' => 'gerente@goldenwind.test',
                'phone' => '555-0303',
                'role' => User::ROLE_GERENTE,
            ],
        ];

        foreach ($users as $userData) {
            User::updateOrCreate(
                ['email' => $userData['email']],
                [
                    'name' => $userData['name'],
                    'phone' => $userData['phone'],
                    'role' => $userData['role'],
                    'password' => Hash::make('GoldenWind2026'),
                ]
            );
        }
    }
}
