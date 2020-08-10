<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\User;
use App\Role;

class StoreTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_email_is_required()
    {
       $data = ['email' => ''];
       $response = $this->post('/login', $data);
       $response->assertSessionHasErrors();
       
    }
    public function test_password_is_required(){
        $data = ['password' => ''];
        $response = $this->post('/login', $data);
        $response->assertSessionHasErrors();
    }
  
    public function testLogin_display_the_login_form(){
        
        $response = $this->get(route('login'));
        $response -> assertStatus(200);
        //$response -> assertViewIs('auth().login');
        
    }
}