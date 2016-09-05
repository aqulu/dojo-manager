@extends('layouts.app')

@section('content')
<div class="container">
    <!-- Display Validation Errors -->
		<ul class="nav nav-tabs">
        @foreach ($groups as $group)
				  <li role="presentation">
							<a href="{{ url('groups/' . $group->name) }}">{{$group->name}}</a>
					</li>
				@endforeach
				<li class="active">
					<a href="{{ url('groups/new') }}"><span class="fa fa-plus"></span></a>
				</li>
		</ul>

    @include('common.errors')
		<h3>Create new group</h3>
		<form action="{{ url('groups') }}" method="POST">
			{{ csrf_field() }}

      <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
          <label for="name" class="control-label">Name</label>
          <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Name">
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
