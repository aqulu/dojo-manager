<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SyllabusEntry extends Model
{
		protected $fillable = ['syllabus_id', 'content_id', 'ordering'];

		public function content()
		{
				return $this->belongsTo(Content::class);
		}

		public function syllabus()
		{
				return $this->belongsTo(Syllabus::class);
		}
}
