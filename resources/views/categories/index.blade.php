@extends('layouts.app')

@section('content')
<div class="container">
		@if (count($categories) > 0)
        <!-- Display Validation Errors -->
				<ul class="nav nav-tabs">
	          @foreach ($categories as $category)
						  <li role="presentation"
	    						@if ($category->id == $active->id)
											class="active"
									@endif
							>
									<a href="{{ url('categories/' . $category->name) }}">{{$category->name}}</a>
							</li>
						@endforeach
				</ul>
		@endif

		@if ($active)
				@include('categories/detail', ['category' => $active])
		@endif

    @include('common.errors')
</div>
@endsection
