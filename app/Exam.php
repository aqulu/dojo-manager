<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    public function nominees()
		{
				return $this->belongsToMany('App\User');
		}
}
