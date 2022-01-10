<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use PharIo\Manifest\Email;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RouteTest extends TestCase
{
    use RefreshDatabase;

    public function testAccessAdminWithGuestRole(){
        $response = $this->get('/admin/articles');
        $response->assertRedirect('/login');
    }

    public function testAccessAdminWithAdminRole(){
        $admin = User::create([
            'email' => 'admin@admin.admin',
            'name' => 'Admin',
            'password' => Hash::make('password'),
            'role' => User::ADMIN_ROLE
        ]);        

        $admin = Auth::loginUsingId(1);
        $this->actingAs($admin);

        $response = $this->get('/admin/articles');
        $response->assertStatus(200);
    }

}
