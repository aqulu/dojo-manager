@extends('layouts.app')

@section('content')

<div class="container">
		<div class="row">
				<div class="col-md-4">
						<a href="{{ url('categories/'.$content->category->name) }}">< Zurück zur Kategorieübersicht</a>
				</div>
				<div class="col-md-1 col-md-offset-7">
						<a href="{{ url('contents/'.$content->id) }}" class="btn btn-primary" role="button"><span class="glyphicon glyphicon-chevron-left"></span></a>
				</div>
		</div>
		@if ($content)
        <form id="contentfrm" action="{{ url('contents/'.$content->id) }}" method="POST">
            {{ csrf_field() }}
            {{ method_field('PUT') }}

            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <label for="name" class="control-label">Bezeichnung</label>

								<div class="input-group input-group-lg">
                    <input id="name" type="text" class="form-control" name="name" value="{{ $content->name }}">
								</div>
                @if ($errors->has('name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </div>

			      <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
			          <label for="description" class="control-label">Beschreibung</label>
								<textarea id="description" class="form-control" name="description">{{ $content->description }}</textarea>
			          @if ($errors->has('description'))
			              <span class="help-block">
			                  <strong>{{ $errors->first('description') }}</strong>
			              </span>
			          @endif
			      </div>

						<div class="form-group">
							<button type="submit" class="btn btn-primary pull-right">
								<i class="fa fa-btn fa-floppy-o"></i> Speichern
							</button>
						</div>
				</form>

				<h2>Zugeordnete Videos</h2>
				<div class="row">
						@foreach($content->media as $media)
								@include('contents/attachedmedia', ['media' => $media, 'contentId' => $content->id ])
						@endforeach
				</div>
		@endif
		@if ($allMedia)
			<h2 class="top-margin">Verfügbare Videos</h2>
			<div class="row">
					@foreach($allMedia as $m)
							@include('contents/unattachedmedia', ['media' => $m, 'contentId' => $content->id ])
					@endforeach
			</div>
		@endif

    @include('common.errors')
</div>
@endsection
