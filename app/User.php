<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use DateTime;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname', 'lastname', 'email', 'password', 'belt_id', 'group_id', 'instructor', 'admin'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

		public function getNextExam()
		{
				return $this->exams->filter(function($value) {
						return DateTime::createFromFormat('Y-n-j H:i', $value->examination_date.' '.$value->examination_time)->getTimestamp() > time();
				})->first();
		}

		public function fullname()
		{
				return $this->firstname . ' ' . $this->lastname;
		}

		public function belt()
		{
				return $this->belongsTo(Belt::class);
		}

		public function group()
		{
				return $this->belongsTo(Group::class);
		}

		public function media()
		{
				return $this->hasMany(Media::class);
		}

		public function exams()
		{
				return $this->belongsToMany('App\Exam');
		}
}
