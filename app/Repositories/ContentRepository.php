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

		public function insert($attributes) {
				$content = new Content($attributes);
				$content->save();
				return $content;
		}
}
