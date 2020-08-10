<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class test_login_page_is_viewableTest extends TestCase
{
    use RefreshDatabase;
    /**
     * use RefreshDatabase;
     * A basic feature test example.
     *
     * @return void
     */
    public function testLogin_page_is_viewableTest()
    {
        $response = $this->get('/login');
        $response->assertSuccessful();
        $response->assertViewIs('auth.login');
        $response->assertStatus(200);
    }
    public function testLogin_validation_loginTest()
    {
        $this->withoutExceptionHandling();
        $response = $this->get('login');
        $response->assertStatus(200);
        
    }

}