<div class="col-sm-4 col-md-3">
	  <div class="thumbnail">
	    	<img src="{{ $media->thumbnail() }}" alt="video thumbnail">
		    <div class="caption">
        	<h3>
						<a href="{{ $media->url }}" target="_blank">{{ $media->title }}</a>
						</h3>
		      <p>
						von: {{ $media->user->firstname . ' ' . $media->user->lastname }}<br />
						<label><input type="checkbox"
							@if($media->public)
									checked
							@endif
							disabled> Öffentlich</label>
					</p>
					<br />
		      <p>
							@yield('buttons')
					</p>
		    </div>
	  </div>
</div>
