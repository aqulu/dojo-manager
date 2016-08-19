<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function contents()
		{
				return $this->hasMany(Content::class);
		}

		protected $fillable = ['name'];
}
