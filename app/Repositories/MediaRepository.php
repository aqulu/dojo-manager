<?php

namespace App\Repositories;

use App\Media;

class MediaRepository
{
		public function all()
		{
				return Media::all();
		}

		public function findPublic()
		{
				return Media::where('public', true)->get();
		}

		public function findByUser($id)
		{
				return Media::where('user_id', $id)->get();
		}
}
