<?php

namespace App\Repositories;

use App\Group;

class GroupRepository
{
		public function all()
		{
				return Group::orderBy('name')->get();
		}

		public function findByName($name)
		{
				return Group::where('name', $name)->first();
		}
}
