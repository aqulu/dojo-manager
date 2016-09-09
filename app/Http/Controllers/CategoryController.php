<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Repositories\CategoryRepository;
use App\Category;
use App\Content;

class CategoryController extends Controller
{
		protected $categoryRepo;

		public function __construct(CategoryRepository $categoryRepo)
		{
				$this->categoryRepo = $categoryRepo;
		}

		public function index()
		{
				return $this->findByName(null);
		}

		public function findByName($name)
		{
				$allCategories = $this->categoryRepo->all();
				$activeCategory = ($name) ? $allCategories->where('name', $name)->first() : $allCategories->first();
		    return view('categories.index', [
		        'categories' => $allCategories,
						'active' => $activeCategory
		    ]);
		}

		public function addContent(Category $category, Request $request)
		{
				$this->validate($request, [
						'name' => 'required|max:255'
				]);

				$content = new Content;
				$content->name = $request->name;
				$content->description = $request->description;
				$content->category_id = $category->id;
				$content->save();

				return $this->findByName($request, $category->name);
		}
}
