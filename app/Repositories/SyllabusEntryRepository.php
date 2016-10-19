<?php

namespace App\Repositories;

use App\SyllabusEntry;

class SyllabusEntryRepository
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
