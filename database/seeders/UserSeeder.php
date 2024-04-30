<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'John Doe',
            'email' => 'john@example.com',
            // 'password' => Hash::make('password'), // Hashage du mot de passe
            'password' => '',
            'localisation' => 'Paris',
        ]);

        User::create([
            'name' => 'Jane Smith',
            'email' => 'jane@example.com',
            'password' => '',
            'localisation' => 'New York',
        ]);

        User::create([
            'name' => 'Nicolas Lawrence',
            'email' => 'nicolas@example.com',
            'password' => '',
            'localisation' => 'Old York',
        ]);

        User::create([
            'name' => 'Jennifer Martin',
            'email' => 'jennifer@example.com',
            'password' => '',
            'localisation' => 'OldOld York',
        ]);
    }
}
