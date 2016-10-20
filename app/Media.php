<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    protected $fillable = [
        'title', 'url', 'public', 'user_id'
    ];

    public function user()
		{
				return $this->belongsTo(User::class);
		}

		public function thumbnail()
		{
				$placeholder = '{VIDID}';
				$thumbnailUrl = 'https://img.youtube.com/vi/'. $placeholder .'/0.jpg';
				$keyword = 'v=';
				if (strpos($this->url, 'youtube.com') !== false) {
						$delimiter = '&';
						$pos = strpos($this->url, $keyword) + strlen($keyword);
						$videoId = substr($this->url, $pos);
						$delimPos = strpos($videoId, $delimiter);

						if ($delimPos !== false) {
								$videoId = substr($videoId, $delimPos);
						}
				} else if (strpos($this->url, 'youtu.be') !== false) {
						$pos = strpos($this->url, '/') + 1;

						if (strpos($this->url, $keyword) !== false) {
								$pos += strlen($keyword);
						}

						$videoId = substr($this->url, $pos);
				} else {
						$videoId = 'HvncJgJbqOc';
				}

				return str_replace($placeholder, $videoId, $thumbnailUrl);
		}
}
