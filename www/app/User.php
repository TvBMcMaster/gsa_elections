<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Log;
use App\Role;

class User extends Authenticatable
{
	/**
	  *	Role relationship
      *
      * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
	  */
    public function role() {
    	return $this->belongsTo('App\Role');
    }

    /**
	  * Check for a single role
      * 
	  * @param string $role
      * @return App\Role|null
      */
	public function hasRole($role){
    return $this->role ? $this->role->slug == $role : false;
	}

    /**
      * Organization relationship
      *
      * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
      */
    public function organization()
    {
        return $this->belongsTo('App\Organization');
    }
	
}
