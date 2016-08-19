<?php

namespace App\Repositories;

use App\Category;

class CategoryRepository
{
		public function findByName($name)
		{
				$category = Category::where('name', $name)->get();
				return $categories;
		}

		public function findAll()
		{
			return Category::all();
		}
}
