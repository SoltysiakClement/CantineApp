<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    public function run()
    {
        DB::table('categories')->insert([
            ['name' => 'Entrée'],
            ['name' => 'Plat principal'],
            ['name' => 'Dessert'],
            ['name' => 'Entrée + Plat'],
            ['name' => 'Plat + Dessert'],
            ['name' => 'Entrée + Dessert']
        ]);
    }
}
