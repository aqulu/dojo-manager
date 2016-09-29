@extends('layouts.app')

@section('content')
<div class="container text-center">
		<h1>Willkommen, {{ Auth::user()->fullname() }}</h1>

		@if($exam)
				<h3>Du wurdest für eine Prüfung aufgeboten!</h3>
				Deine nächste Prüfung findet am <b>{{ DateTime::createFromFormat('Y-n-j', $exam->examination_date)->format('j.n.Y') }}</b> um <b>{{ $exam->examination_time }} Uhr</b> statt!<br />
				{{ $exam->remarks }}
		@endif

		@if($belt)
				<svg height="200px" viewbox="0 0 100 75">
					<path d="M 0 20 q 50 10 100 0" style="stroke: {{ $belt->color_hex }}" stroke-width="7" fill="none" />
					<path d="M 10 75 q 40 -100 80 0" style="stroke: {{ $belt->color_hex }}" stroke-width="7" fill="none" />
					<circle cx="50" cy="25" r="10" style="fill: {{ $belt->color_hex }}"  />
				</svg>
		@endif
</div>
@endsection
