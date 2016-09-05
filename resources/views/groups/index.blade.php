@extends('layouts.app')

@section('content')
<div class="container">
    <!-- Display Validation Errors -->
		<ul class="nav nav-tabs">
        @foreach ($groups as $group)
				  <li role="presentation"
  						@if ($group->id == $active->id)
									class="active"
							@endif
					>
							<a href="{{ url('groups/' . $group->name) }}">{{$group->name}}</a>
					</li>
				@endforeach
				<li>
					<a href="{{ url('groups/new') }}"><span class="fa fa-plus"></span></a>
				</li>
		</ul>

		@if ($active)
				@include('groups/detail', ['group' => $active])
		@endif

    @include('common.errors')
</div>
@endsection
