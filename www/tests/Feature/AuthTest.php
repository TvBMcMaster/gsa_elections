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

    public function createUser() {
        $organization = factory(\App\Organization::class)->create();
        return factory(\App\User::class)->create([
            'organization_id' => $organization->id,
        ]);
    }

    public function testUserLoggedIn()
    {
        $user = $this->createUser();
        $this->assertFalse($user::$isAdmin);

        $this->actingAs($user)
            ->get('/')
            ->assertSee(htmlentities($user->name));

    }

    public function testUserAdmin()
    {
        $user = $this->createUser();    	
    	$this->actingAs($user)
    		->get('/admin')
    		->assertRedirect('admin/login');
    } 

    public function testAdminLoggedIn()
    {
    	$admin = factory(\App\Admin::class)->create();
        $this->assertTrue($admin->isAdmin());
    	$this->actingAs($admin, 'admin')
    	    ->get('/admin')
    	    ->assertSuccessful()
    	    ->assertSee(htmlentities($admin->name));
    }
}

