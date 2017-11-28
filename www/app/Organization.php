<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    /**
      * One to Many Users Relationship
 	  * 
      * @return array($user)
      */

    public function users()
    {
    	return $this->hasMany('App\User');
    }

    /**
      * Set the route key name on the model
      *
      * @return string
      */

    public function getRouteKeyName()
	{
    	return 'slug';
	}
}