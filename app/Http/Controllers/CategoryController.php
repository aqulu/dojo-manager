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
				$this->middleware('auth');
				$this->categoryRepo = $categoryRepo;
		}

		public function index(Request $request)
		{
				return $this->findByName($request, null);
		}

		public function findByName(Request $request, $name)
		{
				$allCategories = $this->categoryRepo->findAll();
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
				$content->media()->attach($request->media);

				return $this->findByName($request, $category->name);
		}
}
