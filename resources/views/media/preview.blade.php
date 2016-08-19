<div class="col-sm-6 col-md-4">
	  <div class="thumbnail">
	    	<img src="http://img.youtube.com/vi/{{ $media->videoId() }}/0.jpg" alt="video thumbnail">
		    <div class="caption">
		      <p>Uploaded by: {{ $media->user->firstname . ' ' . $media->user->lastname }}</p>
		      <p>
						<a href="{{ $media->url }}" class="btn btn-primary" role="button" target="_blank">Open video</a>
						@yield('buttons')
					</p>
		    </div>
	  </div>
</div>
