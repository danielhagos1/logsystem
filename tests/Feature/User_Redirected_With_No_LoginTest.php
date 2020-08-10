<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class User_Redirected_With_No_Login extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testUser_Redirected_With_No_LoginTest()
    {
        $response = $this->get('/home');

        $response->assertRedirect(route('login'));
    }


}