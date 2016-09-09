<?php

namespace App\Repositories;

use App\Belt;

class BeltRepository
{
		public function all()
		{
				return Belt::orderBy('ordering')->get();
		}

		public function findById($id)
		{
				return Belt::where('id', $id)->first();
		}

		public function findNext(Belt $oldBelt)
		{
				return Belt::where('ordering', '=', ($oldBelt->ordering + 1))->first();
		}
}
