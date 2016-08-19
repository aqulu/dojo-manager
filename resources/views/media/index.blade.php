@extends('layouts.app')

@section('content')
<div class="container">
		@if (count($media) > 0)
        <!-- Display Validation Errors -->
				@foreach ($media as $m)
						@include('media/preview', ['media' => $m])
				@endforeach
		@endif

    @include('common.errors')
</div>
@endsection
