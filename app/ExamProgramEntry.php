<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExamProgramEntry extends Model
{
		protected $fillable = ['exam_program_id', 'content_id', 'ordering'];

		public function content()
		{
				return $this->belongsTo(Content::class);
		}

		public function examProgram()
		{
				return $this->belongsTo(ExamProgram::class);
		}
}
