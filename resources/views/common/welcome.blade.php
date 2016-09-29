@extends('layouts.app')

@section('content')
<div class="container text-center">
		<h1>Willkommen, {{ Auth::user()->fullname() }}</h1>

		@if($exam)
				<br /><br />
				<h4>Du wurdest für eine Prüfung aufgeboten!</h4>
				Deine nächste Prüfung findet am <b>{{ DateTime::createFromFormat('Y-n-j', $exam->examination_date)->format('j.n.Y') }}</b> um <b>{{ $exam->examination_time }} Uhr</b> statt.<br />
				{{ $exam->remarks }}
		@endif

		@if($belt)
				@include('common/belt', ['color' => $belt->color_hex, 'height' => '200px', 'style' => null ])
		@endif
</div>
@endsection
