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

		public function index()
		{
				$media = Media::all();
		    return view('media.index', [ 'media' => $media ]);
		}

		public function create(Request $request)
		{
				$this->validate($request, [
						'title' => 'required|max:255',
						'url' => 'required'
				]);

				Media::insert([
					'title'		=> $request->title,
					'public'	=> !!($request->public),
					'url'			=> $request->url,
					'user_id'	=> $request->user()->id
				]);

				return redirect('/media');
		}

		public function delete(Request $request, Media $media)
		{
				if ($request->user()->admin || $request->user->id === $media->user->id) {
						$media->delete();
				} else {
						abort(403);
				}

				return redirect('media');
		}
}
