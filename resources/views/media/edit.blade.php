@extends('layouts.app')

@section('content')
<div class="container">
    @include('common.errors')
		@if($media)
				<form action="{{ url('media/'.$media->id) }}" method="POST">
					{{ csrf_field() }}
					{{ method_field('PUT') }}

					<div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
							<label for="title" class="control-label">Title</label>
							<div class="input-group input-group-lg">
									<input id="title" type="text" class="form-control" name="title" value="{{ $media->title }}" placeholder="Title">
							</div>
							@if ($errors->has('title'))
									<span class="help-block">
											<strong>{{ $errors->first('title') }}</strong>
									</span>
							@endif
					</div>

					<div class="form-group{{ $errors->has('url') ? ' has-error' : '' }}">
							<label for="url" class="control-label">URL</label>
							<input id="url" type="text" class="form-control" name="url" value="{{ $media->url }}" placeholder="https://youtu.be/v=ajsf">
							@if ($errors->has('url'))
									<span class="help-block">
											<strong>{{ $errors->first('url') }}</strong>
									</span>
							@endif
					</div>

					<div class="form-group">
							<label>
									<input type="checkbox" id="public" name="public"
										@if($media->public)
												checked
										@endif
										>
									Public
							</label>
							<p class="small">If selected, your video can be seen by other people</p>
					</div>

					<button type="submit" class="btn btn-primary pull-right">
						<span class="glyphicon glyphicon-floppy-disk"></span> Save
					</button>
				</form>

		@endif
</div>
@endsection
