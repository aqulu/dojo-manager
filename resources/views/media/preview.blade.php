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
								@if ($editMode && (Auth::user()->id === $media->user->id || Auth::user()->admin))
										<form class="form-horizontal" action="{{ url('media/'.$media->id) }}" method="POST">
										    {{ csrf_field() }}
										    {{ method_field('DELETE') }}
												<a href="{{ url('media/'.$media->id.'/edit') }}" class="btn btn-default"><i class="fa fa-pencil"></i></a>
												<button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
										</form>
								@endif
						</p>
		    </div>
	  </div>
</div>
