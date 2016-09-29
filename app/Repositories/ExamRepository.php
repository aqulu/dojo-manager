<?php

namespace App\Repositories;

use App\Exam;

class ExamRepository
{
		public function all()
		{
				return Exam::orderBy('examination_date')->get();
		}
}
