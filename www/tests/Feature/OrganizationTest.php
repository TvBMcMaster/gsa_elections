<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\Organization;
use App\User;
use App\Admin;

class OrganizationTest extends TestCase
{
	use RefreshDatabase;
    /**
     * A basic test example.
     *
     * @return void
     */

    public $org1, $org2, $admin;
    public $user_org1, $user_org2;

    public function setUp(){
    	parent::setUp($this);

    	$orgs = factory(Organization::class, 2)->create();
    	$this->org1 = $orgs[0];
    	$this->user_org1 = factory(User::class)->create(
    		['organization_id' => $this->org1->id]
    	);

    	$this->org2 = $orgs[1];
    	$this->user_org2 = factory(User::class)->create(
    		['organization_id' => $this->org2->id]
    	);

    	$this->admin = factory(Admin::class)->create();
    }

    public function testOrgAuth()
    {
        $this->assertEquals($this->user_org1->organization_id, $this->org1->id);

        $this->actingAs($this->user_org1)
        	->get('/'.$this->org1->slug)
        	->assertSee($this->org1->name);

        $this->actingAs($this->user_org2)
        	->get('/'.$this->org1->slug)
        	->assertStatus(401);

        $this->actingAs($this->admin, $driver='admin')
          	->get('/'.$this->org1->slug)
          	->assertSuccessful();
    }
}
