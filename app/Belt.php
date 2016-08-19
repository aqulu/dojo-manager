<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Belt extends Model
{
		public function examPrograms()
		{
				return $this->hasMany(ExamProgram::class);
		}

		public function users()
		{
				return $this->hasMany(User::class);
		}

		protected $fillable = ['ordering', 'rank', 'type', 'color_hex'];
}
