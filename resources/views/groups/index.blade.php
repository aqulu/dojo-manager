@extends('layouts.app')

@section('content')
<div class="container">
		@if (count($groups) > 0)
        <!-- Display Validation Errors -->
				<ul class="nav nav-tabs">
	          @foreach ($groups as $group)
						  <li role="presentation"
	    						@if ($group->id == $active->id)
											class="active"
									@endif
							>
									<a href="{{ url('members/' . $group->name) }}">{{$group->name}}</a>
							</li>
						@endforeach
				</ul>
		@endif

		@if ($active)
				@include('groups/detail', ['group' => $active])
		@endif

    @include('common.errors')
</div>
@endsection
