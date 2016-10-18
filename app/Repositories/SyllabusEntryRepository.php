<?php

namespace App\Repositories;

use App\SyllabusEntry;

class SyllabusRepository
{
		public function insert($attributes)
		{
				$entry = new SyllabusEntry($attributes);
				$entry->save();
				return $entry;
		}

		public function delete($entry) {
				$entry->delete();
		}

}
