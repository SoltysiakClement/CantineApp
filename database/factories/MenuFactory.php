<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Menu>
 */
class MenuFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
          // Des noms de plats plus réalistes
          $plat = [
            'Salade Niçoise',
            'Quiche Lorraine',
            'Ratatouille',
            'Bouillabaisse',
            'Tarte Tatin',
            'Poulet Basquaise',
            'Coq au Vin',
            'Cassoulet'
        ];

        // Générer un nom de plat aléatoire
        $nom = $this->faker->randomElement($plat);

        // Ajout d'une description simple
        $description = $this->faker->sentence($nbWords = 6, $variableNbWords = true);

        // Définition de catégories possibles
        $categories = ['entrée', 'plat principal', 'dessert'];
        $categorie = $this->faker->randomElement($categories);

        return [
            'nom' => $nom,
            'prix' => $this->faker->randomFloat(2, 2.50, 15.00), // Prix plus logique pour une cantine
            'description' => $description,
            'category' => $categorie,
            'image_path' => $this->faker->imageUrl(640, 480, 'food'), // Génération d'une URL d'image fictive
            'is_available' => $this->faker->boolean(90) // 90% de chance que le plat soit disponible
        ];
    
    }
}
