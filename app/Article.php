<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    public function hasManyComments(){
		return $this->hasMany('App\Comment','article_id','id');
	}
	public function scopeMyArticles($query,$user_id){
		return $query->where('user_id','=',$user_id);
	}
}
