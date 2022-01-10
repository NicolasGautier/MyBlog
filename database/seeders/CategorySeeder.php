<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        \App\Models\Category::factory(5)->create();

        //Méthode sans factory 
        // $categories = ['Jeux', 'Sport', 'Actualités', 'Economie', 'Politique' ];

        // for ($i=0; $i < count($categories); $i++) { 
        //     Category::create([
        //         'label' => $categories[$i]
        //     ]);        
        // }
    }
}
