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
}
