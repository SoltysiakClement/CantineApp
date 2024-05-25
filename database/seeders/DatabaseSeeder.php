<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        // Crée 10 utilisateurs
        \App\Models\User::factory(10)->create();

        // Crée 50 menus
        \App\Models\Menu::factory(50)->create();

        // Crée 100 commandes
        \App\Models\Reservation::factory(100)->create();
    }
}
