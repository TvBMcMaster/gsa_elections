<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Role;

class User extends Authenticatable
{
	/**
	  *	Role relationship
      *
      * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
	  */
    public function roles() {
    	return $this->belongsToMany('App\Role');
    }

    /**
      *	Authorize for Many Roles
      *	@param string|array $roles
      * @return bool|error
      */
    public function authorizeRoles($roles){
    	if (is_array($roles)) {
    		return $this->hasAnyRole($roles) || 
    			abort(401, "Unauthorized Access, Fool");
    	}

    	return $this->hasRole($roles) ||
    		abort(401, "Unauthorized Access, Fool");
    }

    /**
      *	Check for any Roles
      *
      * @param string|array $roles
      * @return App\Role|null
      */
    public function hasAnyRole($roles) {
    	return null !== $this->roles()->whereIn('name', $roles)->first();
    }

    /**
	  * Check for a single role
      * 
	  * @param string $role
      * @return App\Role|null
      */
	public function hasRole($role){
		return null !== $this->roles()->where('name', $role)->first();
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
