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
						<div class="col-xs-11 col-xs-offset-1">
								<h4>
										@if ($user->belt)
												{{ $user->belt->label()}}
										@else
												Keine Graduierung
										@endif
								</h4>
								<h4>
										@if ($user->group)
												{{ $user->group->name }}
										@else
												Keine Gruppe
										@endif
								</h4>
								<h4>{{ $user->email }}</h4>
								<h4>
										@if ($user->admin)
												Admin
										@endif
										@if ($user->admin && $user->instructor)
												|
										@endif
										@if ($user->instructor)
												Instruktor
										@endif
								</h4>

								@if ($nextExam)
										Nächste Prüfung am {{ DateTime::createFromFormat('Y-n-j', $nextExam->examination_date)->format('j.n.Y') }}
								@else
										@if($possibleExam)
												<form action="{{ url('exams/'.$possibleExam->id.'/nominees') }}" method="POST">
														{{ csrf_field() }}
		          							<input type="hidden" name="userId" value="{{ $user->id }}">
														<button type="submit" class="btn btn-primary">Für nächste Prüfung aufbieten</button>
												</form>
										@endif
								@endif
						</div>
				</div>
		@endif

    @include('common.errors')
</div>
@endsection
