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
		<h3>
				{{$active->name}}
				<a href="{{ url('groups/'.$active->name ) }}" class="btn btn-primary pull-right" role="button"><span class="glyphicon glyphicon-chevron-left"></span></a>
		</h3>

    @include('common.errors')

		<form action="{{ url('groups/'.$active->id) }}" method="POST">
				{{ csrf_field() }}
				{{ method_field('PUT') }}

	      <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
	          <label for="name" class="control-label">Name</label>
	          <input id="name" type="text" class="form-control" name="name" value="{{ $active->name }}" placeholder="Name">
	          @if ($errors->has('name'))
	              <span class="help-block">
	                  <strong>{{ $errors->first('name') }}</strong>
	              </span>
	          @endif
	      </div>

				<button type="submit" class="btn btn-primary pull-right">
					<span class="glyphicon glyphicon-floppy-disk"></span> Save
				</button>
		</form>
</div>
@endsection
