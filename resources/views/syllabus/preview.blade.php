<div class="modal fade" id="content{{$content->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">{{ $content->name }} Details</h4>
			</div>
			<div class="modal-body">
				<p>{{ ($content->description) ? $content->description : 'Keine Beschreibung' }}</p>

				@if($content->media && count($content->media) > 0)
						<h3>Zugeordnete Videos</h3>
						<div class="row">
								@foreach($content->media as $media)
										@include('media/preview', ['media' => $media, 'editMode' => false])
								@endforeach
						</div>
				@endif
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Schliessen</button>
			</div>
		</div>
	</div>
</div>
