<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Repositories\ContentRepository;
use App\Repositories\MediaRepository;
use App\Content;
use App\Media;

class ContentController extends Controller
{
		protected $contentRepo;
		protected $mediaRepo;

		public function __construct(ContentRepository $contentRepo, MediaRepository $mediaRepo)
		{
				$this->contentRepo = $contentRepo;
				$this->mediaRepo = $mediaRepo;
		}

		public function index(Request $request, Content $content)
		{
				$ids = $content->media->map(function($media) { return $media->id; });
		    return view('contents.index', [
						'content' => $content,
						'allMedia' => ($request->user()->admin) ? $this->mediaRepo->findUnattached($ids) : null
				]);
		}

		public function edit(Content $content)
		{
				$ids = $content->media->map(function($media) { return $media->id; });
		    return view('contents.edit', [
					'content' => $content,
					'allMedia' => $this->mediaRepo->findUnattached($ids)
				]);
		}

		public function update(Request $request, Content $content)
		{
				$this->validate($request, [
						'name' => 'required|max:255'
				]);

				$content->name = $request->name;
				$content->description = $request->description;
				$content->save();

				return redirect('contents/'.$content->id);
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

		public function addMedia(Request $request, Content $content)
		{
				$this->validate($request, [
						'mediaId' => 'required'
				]);
				$content->media()->attach($request->mediaId);
				return redirect('contents/'.$content->id.'/edit');
		}

		public function removeMedia(Content $content, $mediaId)
		{
				$content->media()->detach($mediaId);
				return redirect('contents/'.$content->id.'/edit');
		}
}
