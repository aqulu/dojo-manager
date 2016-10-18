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

		public function findUnattached($ids) {
				return Media::where('public', true)
								->whereNotIn('id', $ids)
								->orderBy('created_at', 'desc')
								->get();
		}

		public function insert($attributes) {
				$media = new Media($attributes);
				$media->save();
				return $media;
		}

		public function update($media, $attributes) {
				$media->fill($attributes);
				$media->save();
				return $media;
		}

		public function delete($media) {
				$media->delete();
		}
}
