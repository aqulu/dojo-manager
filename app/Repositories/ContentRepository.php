<?php

namespace App\Repositories;

use App\Content;

class ContentRepository
{
		public function findEagerly($id)
		{
				return Content::with('category')->findOrFail($id);
		}

		public function all()
		{
			return Content::orderBy('category_id')->get();
		}
}
