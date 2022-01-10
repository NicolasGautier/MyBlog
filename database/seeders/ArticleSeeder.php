<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Category;
use Faker\Factory;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::get()->each(function($category){

            \App\Models\Article::factory(5)->create([
                'category_id'=> $category->id,
            ]);

        });



        //Manière de faire sans factory
        // $faker= Factory::create(); 

        // for ($i=0; $i < 26; $i++) { 
        //     Article::create([
        //         'title' => $faker->sentence(),
        //         'subtitle' => $faker->sentence(), 
        //         'content' =>$faker->text(600),
        //         'category_id' => Category::inRandomOrder()->first()->id,
        //     ]);        
        // }
       
    }
}
