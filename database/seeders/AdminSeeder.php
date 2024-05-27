<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Création des admins
        User::create([
            'name' => 'DevClem',
            'email' => 'devclem@example.com',
            'password' => Hash::make('x14d6ty!gf67gas'),
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'DevEme',
            'email' => 'deveme@example.com',
            'password' => Hash::make('x14d2ty!gh67tas'),
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'DevRobin',
            'email' => 'devrobin@example.com',
            'password' => Hash::make('q14o6!gf67aaas'),
            'role' => 'admin',
        ]);
    }
}
