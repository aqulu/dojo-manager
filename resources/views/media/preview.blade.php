<div class="col-sm-4 col-md-3">
	  <div class="thumbnail">
	    	<img src="http://img.youtube.com/vi/{{ $media->videoId() }}/0.jpg" alt="video thumbnail">
		    <div class="caption">
        	<h3>
						<a href="{{ $media->url }}" target="_blank">{{ $media->title }}</a>
						</h3>
		      <p>
						Uploaded by: {{ $media->user->firstname . ' ' . $media->user->lastname }}<br />
						<label><input type="checkbox"
							@if($media->public)
									checked
							@endif
							disabled> Public</label>
					</p>
					<br />
		      <p>
						@yield('buttons')
					</p>
		    </div>
	  </div>
</div>
