<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Media;
use App\Repositories\MediaRepository;

class MediaController extends Controller
{
		protected $mediaRepo;

		public function __construct(MediaRepository $mediaRepo)
		{
				$this->mediaRepo = $mediaRepo;
		}

		public function index(Request $request)
		{
		    return view('media.index', [ 'media' => $this->mediaRepo->findPublic($request->user()->id), 'title' => null ]);
		}

		public function edit(Request $request, Media $media)
		{
				if ($request->user()->admin || $request->user()->id === $media->user->id) {
						return view('media.edit', ['media' => $media]);
				} else {
						abort(403);
				}
		}

		public function update(Request $request, Media $media)
		{
				if ($request->user()->admin || $request->user()->id === $media->user->id) {
					$this->validate($request, [
							'title' => 'required|max:255',
							'url' => 'required'
					]);

					$this->mediaRepo->update($media, [
						'title'		=> $request->title,
						'public'	=> !!($request->public),
						'url'			=> $request->url,
					]);
				} else {
						abort(403);
				}
				return redirect('media');
		}

		public function create(Request $request)
		{
				$this->validate($request, [
						'title' => 'required|max:255',
						'url' => 'required'
				]);

				$this->mediaRepo->insert([
					'title'		=> $request->title,
					'public'	=> !!($request->public),
					'url'			=> $request->url,
					'user_id'	=> $request->user()->id
				]);

				return redirect('/media');
		}

		public function delete(Request $request, Media $media)
		{
				if ($request->user()->admin || $request->user()->id === $media->user->id) {
						$this->mediaRepo->delete($media);
				} else {
						abort(403);
				}

				return redirect('media');
		}
}
