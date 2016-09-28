@extends('layouts.app')

@section('content')

<div class="container">
		<div class="row">
				<div class="col-md-4">
						<a href="{{ url('users') }}">< Zurück zur Benutzerübersicht</a>
				</div>
				@if (Auth::user()->admin)
						<div class="col-md-1 col-md-offset-7">
								<a href="{{ url('users/'.$user->id.'/edit') }}" class="btn btn-primary" role="button"><span class="glyphicon glyphicon-pencil"></span></a>
						</div>
				@endif
		</div>
		@if ($user)
				<h1>{{ $user->fullname() }}</h1>
				<div class="row">
						<div class="col-md-2 col-md-offset-1">
								@if ($user->belt)
										{{ $user->belt->label()}}
								@else
										Keine Graduierung
								@endif
								<br />
								@if ($user->group)
										Gruppe {{ $user->group->name }}
								@else
										Keine Gruppe
								@endif
								<br />
								@if ($user->admin)
										Admin
								@endif
								@if ($user->admin && $user->instructor)
										|
								@endif
								@if ($user->instructor)
										Instruktor
								@endif
						</div>
				</div>
		@endif

    @include('common.errors')
</div>
@endsection
