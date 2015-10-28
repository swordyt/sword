<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fileable = ['nickname','email','website','content','page_id'];
}
