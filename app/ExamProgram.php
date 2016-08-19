<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExamProgram extends Model
{
    public function belt()
		{
		}
		return $this->belongsTo(Belt::class);

		public function group()
		{
				return $this->belongsTo(Group::class);
		}
}
