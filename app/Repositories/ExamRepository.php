<?php

namespace App\Repositories;

use App\Exam;
use DateTime;

class ExamRepository
{
		public function all()
		{
				return Exam::orderBy('examination_date')->get();
		}

		public function findNext($time, $group)
		{
				$now = new DateTime();
				$now->setTimestamp($time);
				return Exam::where('group_id', $group->id)->whereDate('examination_date', '>=', $now)->orderBy('examination_date')->first();
		}
}
