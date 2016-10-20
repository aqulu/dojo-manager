<div class="col-sm-4 col-md-3">
	  <div class="thumbnail">
	    	<img src="{{ $media->thumbnail() }}" alt="video thumbnail">
		    <div class="caption">
        	<h3>
						<a href="{{ $media->url }}" target="_blank">{{ $media->title }}</a>
						</h3>
		      <p>
						von: {{ $media->user->firstname . ' ' . $media->user->lastname }}<br />
					</p>
					<br />
		      <p>
							@if ($attached)
									<form class="form-horizontal" action="{{ url('contents/'.$contentId.'/media/'.$media->id) }}" method="POST">
											{{ csrf_field() }}
											{{ method_field('DELETE') }}
											<button type="submit" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Entfernen</button>
									</form>
							@else
									<form class="form-horizontal" action="{{ url('contents/'.$contentId.'/media') }}" method="POST">
									    {{ csrf_field() }}
											<input type="hidden" name="mediaId" value="{{ $media->id }}">
											<button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Hinzufügen</button>
									</form>
							@endif
					</p>
		    </div>
	  </div>
</div>
