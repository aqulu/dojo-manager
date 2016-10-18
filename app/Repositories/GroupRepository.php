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

		public function insert($name) {
				$group = new Group;
				$group->name = $name;
				$group->save();
				return $group;
		}
}
