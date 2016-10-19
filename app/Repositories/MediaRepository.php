<?php

namespace App\Repositories;

use App\Media;

class MediaRepository
{
		public function all()
		{
				return Media::all();
		}

		public function findPublic($id)
		{
				$query = Media::where('public', true);
				if ($id) {
						$query->orWhere('user_id', $id);
				}
				return $query->get();
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
