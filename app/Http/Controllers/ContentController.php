<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Repositories\ContentRepository;
use App\Content;
use App\Media;

class ContentController extends Controller
{
		protected $contentRepo;

		public function __construct(ContentRepository $contentRepo)
		{
				$this->middleware('auth');
				$this->contentRepo = $contentRepo;
		}

		public function index(Content $content)
		{
				$ids = $content->media->map(function($media) { return $media->id; });
				$allMedia = Media::whereNotIn('id', $ids)->orderBy('created_at', 'desc')->get();
		    return view('contents.index', [ 'content' => $content, 'allMedia' => $allMedia ]);
		}

		public function edit(Content $content)
		{
				$ids = $content->media->map(function($media) { return $media->id; });
				$allMedia = Media::whereNotIn('id', $ids)->orderBy('created_at', 'desc')->get();
		    return view('contents.edit', [ 'content' => $content, 'allMedia' => $allMedia ]);
		}

		public function update(Request $request, Content $content)
		{
				$this->validate($request, [
						'name' => 'required|max:255'
				]);

				$content->name = $request->name;
				$content->description = $request->description;
				$content->save();
				$content->media()->attach($request->media);

				return $this->index($content);
		}

		public function delete(Request $request, Content $content)
		{
				$categoryName = $content->category->name;
				if ($request->user()->admin) {
						$content->delete();
				} else {
					abort(403);
				}

				return redirect('categories/'.$categoryName);
		}

		public function removeMedia(Content $content, $mediaId)
		{
				$content->media()->detach($mediaId);
				return $this->edit($content);
		}
}
