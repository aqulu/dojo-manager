@extends('layouts.app')

@section('content')
<div class="container">
		@if (count($media) > 0)
				<div class="row">
						@foreach ($media as $m)
								@if (Auth::user()->id === $m->user->id || Auth::user()->admin)
										@include('media/admin', ['media' => $m])
								@else
										@include('media/preview', ['media' => $m])
								@endif
						@endforeach
				</div>
		@endif

    @include('common.errors')

		<div class="panel panel-default">
			  <div class="panel-heading"><span class="glyphicon glyphicon-plus"></span> Add media</div>
			  <div class="panel-body">
						<form action="{{ url('media') }}" method="POST">
							{{ csrf_field() }}

		          <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
		              <label for="title" class="control-label">Title</label>
		              <input id="title" type="text" class="form-control" name="title" value="{{ old('title') }}" placeholder="Title">
		              @if ($errors->has('title'))
		                  <span class="help-block">
		                      <strong>{{ $errors->first('title') }}</strong>
		                  </span>
		              @endif
		          </div>

		          <div class="form-group{{ $errors->has('url') ? ' has-error' : '' }}">
		              <label for="url" class="control-label">URL</label>
		              <input id="url" type="text" class="form-control" name="url" value="{{ old('url') }}" placeholder="https://youtu.be/v=ajsf">
		              @if ($errors->has('url'))
		                  <span class="help-block">
		                      <strong>{{ $errors->first('url') }}</strong>
		                  </span>
		              @endif
		          </div>

				      <div class="form-group">
									<label>
											<input type="checkbox" id="public" name="public">
											Public
									</label>
									<p class="small">If selected, your video can be seen by other people</p>
				      </div>

							<button type="submit" class="btn btn-primary pull-right">
								<span class="glyphicon glyphicon-floppy-disk"></span> Save
							</button>
						</form>
			  </div>
		</div>
</div>
@endsection
