<?php

namespace Tests\Feature;

use Faker\Factory;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DatabaseTest extends TestCase
{
    //Etapes :
    //1/ dans le fichier phpunit.xml : il faut décommenter sqlite et l'autre ligne
    //2/Utiliser le trait use Refreshdatabase pour partir de zéro
    
    use RefreshDatabase; 

    public function testValidregistration(){

        $faker = Factory::create();
        $email = $faker->unique()->email;
        $count = User::count();

        $response = $this->post('/register', [

            'email' => 'nicolas@gautier.com',
            'name' => 'test',
            'password' => 'password',
            'password_confirmation' => 'password'
        ]);

        $newCount = User::count();

        $this->assertNotEquals($count, $newCount);

    }
}
