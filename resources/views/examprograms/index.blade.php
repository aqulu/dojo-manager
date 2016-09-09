@extends('layouts.app')

@section('content')
<div class="container">
		<form action="{{ url('/examprograms') }}" method="GET">
				<div class="row">
						<div class="col-xs-4">
								<h4>Group</h4>
								<select name="groupName" class="form-control">
						        @foreach ($groups as $group)
										  <option role="presentation"
						  						@if ($program && $group->id == $program->group_id)
															selected
													@endif
													value="{{$group->name}}"
											>{{$group->name}}</option>
										@endforeach
								</select>
						</div>
						<div class="col-xs-4">
								<h4>Belt</h4>
								<select name="beltId" class="form-control">
						        @foreach ($belts as $belt)
										  <option role="presentation"
						  						@if ($program && $belt->id == $program->belt_id)
															selected
													@endif
													value="{{$belt->id}}"
											>{{$belt->label()}}</option>
										@endforeach
								</select>
						</div>
						<div class="col-xs-2">
								<button type="submit" class="btn btn-primary">Anzeigen</button>
						</div>
				</div>
		</form>

		@if($program)
				<h1>{{ $program->belt->label() }} {{ $program->group->name }}</h1>
		@endif
</div>
@endsection