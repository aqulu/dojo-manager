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

		public function delete(Request $request, Media $media)
		{
				if ($request->user()->admin) {
						$media->delete();
				} else {
					abort(403);
				}

				return redirect('media');
		}
}
