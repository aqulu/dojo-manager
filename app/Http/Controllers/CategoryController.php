<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Repositories\CategoryRepository;
use App\Repositories\MediaRepository;
use App\Category;
use App\Content;

class CategoryController extends Controller
{
		protected $categoryRepo;

		public function __construct(CategoryRepository $categoryRepo, MediaRepository $mediaRepo)
		{
				$this->categoryRepo = $categoryRepo;
				$this->mediaRepo = $mediaRepo;
		}

		public function index()
		{
				return $this->findByName(null);
		}

		public function findByName($name)
		{
				$media = $this->mediaRepo->findPublic();
				$allCategories = $this->categoryRepo->all();
				$activeCategory = ($name) ? $allCategories->where('name', $name)->first() : $allCategories->first();
		    return view('categories.index', [
		        'categories' => $allCategories,
						'active' => $activeCategory,
						'allMedia' => $media
		    ]);
		}

		public function addContent(Category $category, Request $request)
		{
				$this->validate($request, [
						'name' => 'required|max:255'
				]);

				$content = $this->contentRepo->insert([
					'name' => $request->name,
					'description' => $request->description,
					'category_id' => $category->id
				]);

				return redirect('categories/'.$category->name);
		}
}
