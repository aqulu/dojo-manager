<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Belt extends Model
{
		public function sylabus()
		{
				return $this->hasMany(Syllabus::class);
		}

		public function users()
		{
				return $this->hasMany(User::class);
		}

		public function label()
		{
				return $this->rank . '. ' . $this->type;
		}

		protected $fillable = ['ordering', 'rank', 'type', 'color_hex'];
}
