<?php

namespace App\Repositories;

use App\ExamProgram;
use App\User;

class ExamProgramRepository
{
		public function find(Belt $belt, Group $group)
		{
				return ExamProgram::where([
							['group_id', $group->id],
							['belt_id', $belt->id]
					])->first();
		}
}
