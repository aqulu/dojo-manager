<?php

namespace App;

use App\Category;
use Illuminate\Database\Eloquent\Model;

class Content extends Model
{

		public $timestamps = false;

		public function category()
		{
				return $this->belongsTo(Category::class);
		}

    public function media()
		{
				return $this->belongsToMany('App\Media');
		}

		protected $fillable = ['name', 'description', 'category_id'];
}
