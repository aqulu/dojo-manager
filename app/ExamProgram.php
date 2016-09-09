<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExamProgram extends Model
{
		protected $fillable = ['belt_id', 'group_id'];

    public function belt()
		{
				return $this->belongsTo(Belt::class);
		}

		public function group()
		{
				return $this->belongsTo(Group::class);
		}

		public function contents()
		{
				return $this->belongsToMany('App\Content');
		}
}
