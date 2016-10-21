<div class="col-sm-4 col-md-3">
	  <div class="thumbnail">
	    	<img src="{{ $media->thumbnail() }}" alt="video thumbnail">
		    <div class="caption">
        		<h5>
								<a href="{{ $media->url }}" target="_blank">{{ $media->title }}</a>
						</h5>
			      <p>
							von: {{ $media->user->firstname . ' ' . $media->user->lastname }}<br />
							@if($editMode)
									<label>
											<input type="checkbox"
												@if($media->public)
														checked
												@endif
												disabled> Öffentlich
									</label>
							@endif
						</p>
						@if ($editMode && (Auth::user()->id === $media->user->id || Auth::user()->admin))
								<br />
			      		<p>
										<form class="form-horizontal" action="{{ url('media/'.$media->id) }}" method="POST">
										    {{ csrf_field() }}
										    {{ method_field('DELETE') }}
												<a href="{{ url('media/'.$media->id.'/edit') }}" class="btn btn-default"><i class="fa fa-pencil"></i></a>
												<button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
										</form>
								</p>
						@endif
		    </div>
	  </div>
</div>
