@extends('layouts.app')

@section('content')

<div class="container">
		<div class="row">
				<div class="col-md-4">
						<a href="{{ url('categories/'.$content->category->name) }}">< Zurück zur Kategorieübersicht</a>
				</div>
				@if (Auth::user()->admin)
						<div class="col-md-1 col-md-offset-7">
								<a href="{{ url('contents/'.$content->id.'/edit') }}" class="btn btn-primary" role="button"><span class="glyphicon glyphicon-pencil"></span></a>
						</div>
				@endif
		</div>
		@if ($content)
				<h1>{{$content->name}}</h1>
				<p>{{$content->description}}</p>

				<h2 class="top-margin">Zugeordnete Videos</h2>
				<div class="row">
						@foreach($content->media as $media)
								@include('media/preview', ['media' => $media, 'editMode' => false])
						@endforeach
				</div>
		@endif

    @include('common.errors')
</div>
@endsection
