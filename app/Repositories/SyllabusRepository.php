<?php

namespace App\Repositories;

use App\Syllabus;
use App\Belt;
use App\Group;

class SyllabusRepository
{
		public function find(Belt $belt, Group $group)
		{
				return Syllabus::where([
							['group_id', $group->id],
							['belt_id', $belt->id]
					])->first();
		}

		public function findById($id)
		{
				return Syllabus::with(['entries'])->find($id);
		}
}
