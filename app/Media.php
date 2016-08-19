<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    protected $fillable = [
        'url', 'public', 'user_id', 'title'
    ];

    public function user()
		{
				return $this->belongsTo(User::class);
		}

		public function videoId()
		{
				$keyword = 'v=';
				$delimiter = '&';
				$pos = strpos($this->url, $keyword) + strlen($keyword);
				$videoId = substr($this->url, $pos);
				$delimPos = strpos($videoId, $delimiter);
				return ($delimPos !== false) ? substr($videoId, 0, $delimPos) : $videoId;
		}
}
