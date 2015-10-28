<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    public function hasManyComments(){
		return $this->hasMany('App\comment','page_id','id');
	}
}
