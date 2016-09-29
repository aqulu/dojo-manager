<?php

namespace App;

use App\Group;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    protected $fillable = [
        'examination_date', 'examination_time', 'remarks', 'group_id'
    ];

    public function nominees()
		{
				return $this->belongsToMany('App\User');
		}

		public function group()
		{
				return $this->belongsTo(Group::class);
		}
}
