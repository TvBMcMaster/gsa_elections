<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class IndexTest extends TestCase
{
	
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testIndexOK()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function testLoggedIn()
    {
    	$user = factory(\App\User::class)->states('user')->create();
    	$this->actingAs($user)
    		->get('/')
    		->assertSee($user->name);
    }

    public function testUserAdmin()
    {
    	$user = factory(\App\User::class)->states('user')->create();
    	$this->actingAs($user)
    		->get('/admin')
    		->assertStatus(401);
    } 

    public function testAdminLoggedIn()
    {
    	$admin = factory(\App\User::class)->states('admin')->create();
    	$this->actingAs($admin)
    	    ->get('/admin/dashboard')
    	    ->assertStatus(200)
    	    ->assertSee($admin->name);
    }
}

