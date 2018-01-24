<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AuthTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testIndexOK()
    {
        $response = $this->get('/');

        $response->assertSuccessful();
    }

    public function testUserLoggedIn()
    {
    	$user = factory(\App\User::class)->create();
    	$this->actingAs($user)
    		->get('/')
    		->assertSee($user->name);
    }

    public function testUserAdmin()
    {
    	$user = factory(\App\User::class)->create();
    	$this->actingAs($user)
    		->get('/admin')
    		->assertRedirect('admin/login');
    } 

    public function testAdminLoggedIn()
    {
    	$admin = factory(\App\Admin::class)->create();
    	$this->actingAs($admin, 'admin')
    	    ->get('/admin')
    	    ->assertStatus(200)
    	    ->assertSee($admin->name);
    }
}

