<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Media;

class MediaController extends Controller
{
		public function __construct()
		{
				$this->middleware('auth');
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
						'url' => 'required',
						'public' => 'required'
				]);

				$media = new Media;
				$media->title = $request->title;
				$media->public = $request->public;
				$media->url = $request->url;
				$media->save();
				Auth::user()->media()->attach($media->id);

				return redirect('/media');
		}

		public function delete(Media $media)
		{
				if ($request->user()->admin) {
						$media->delete();
				} else {
					abort(403);
				}
				return redirect('media');
		}
}
