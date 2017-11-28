<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    /**
    	One to Many Users Relationship

    	@returns array($user)
    **/
    public function users()
    {
    	return $this->hasMany('App\User');
    }
}