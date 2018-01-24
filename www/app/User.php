<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Log;

class User extends Authenticatable
{
  protected $hidden = array('password', 'token');
  
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
