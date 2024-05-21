<?php

namespace Database\Factories;

use App\Models\Menu;  // Assure-toi que cette ligne est correcte
use App\Models\User;  // Assure-toi que cette ligne est correcte
use Illuminate\Database\Eloquent\Factories\Factory;

class CommandeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'menu_id' => Menu::factory(),
            'user_id' => User::factory(),
        ];
    }
}
