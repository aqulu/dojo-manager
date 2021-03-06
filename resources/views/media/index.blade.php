@extends('layouts.app')

@section('content')
<div class="container">
		<h1>{{ ($title) ? $title : 'Alle Videos' }}</h1>

		@if (count($allMedia) > 0)
				<div class="row">
						@foreach ($allMedia as $media)
								@include('media/preview', ['media' => $media, 'editMode' => true])
						@endforeach
				</div>
		@endif

    @include('common.errors')

		<div class="panel panel-default">
			  <div class="panel-heading"><span class="glyphicon glyphicon-plus"></span> Video hinzufügen</div>
			  <div class="panel-body">
						<form action="{{ url('media') }}" method="POST">
							{{ csrf_field() }}

		          <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
		              <label for="title" class="control-label">Titel</label>
		              <input id="title" type="text" class="form-control" name="title" value="{{ old('title') }}" placeholder="Title">
		              @if ($errors->has('title'))
		                  <span class="help-block">
		                      <strong>{{ $errors->first('title') }}</strong>
		                  </span>
		              @endif
		          </div>

		          <div class="form-group{{ $errors->has('url') ? ' has-error' : '' }}">
		              <label for="url" class="control-label">URL</label>
		              <input id="url" type="text" class="form-control" name="url" value="{{ old('url') }}" placeholder="https://youtu.be/HvncJgJbqOc">
		              @if ($errors->has('url'))
		                  <span class="help-block">
		                      <strong>{{ $errors->first('url') }}</strong>
		                  </span>
		              @endif
		          </div>

				      <div class="form-group">
									<label>
											<input type="checkbox" id="public" name="public">
											Öffentlich
									</label>
									<p class="small">Das Video ist für alle Benutzer sichtbar, falls aktiviert</p>
				      </div>

							<button type="submit" class="btn btn-primary pull-right">
								<span class="glyphicon glyphicon-floppy-disk"></span> Speichern
							</button>
						</form>
			  </div>
		</div>
</div>
@endsection
