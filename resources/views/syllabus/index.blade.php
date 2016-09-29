@extends('layouts.app')

@section('content')
<div class="container">
		<form action="{{ url('/syllabus') }}" method="GET">
				<div class="row">
						<div class="col-xs-4">
								<h4>Gruppe</h4>
						</div>
						<div class="col-xs-4">
								<h4>Graduierung</h4>
						</div>
				</div>
				<div class="row">
						<div class="col-xs-4">
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
				<h2>
					@include('common/belt', ['color' => $program->belt->color_hex, 'height' => '30px', 'style' => null ])
					{{ $program->belt->label() }} {{ $program->group->name }}
					@if(Auth::user()->admin)
							<a href="{{ url('syllabus/'.$program->id.'/edit') }}" class="btn btn-default pull-right"><i class="fa fa-pencil"></i> Bearbeiten</a>
					@endif
				</h2>
				<table class="table">
						<thead>
								<tr>
										<th>Bezeichnung</th>
										<th>Beschreibung</th>
								</tr>
						</thead>
						<tbody>
								@foreach ($program->entries as $entry)
										<tr>
												<td>{{$entry->content->name}}</td>
												<td>{{$entry->content->description}}</td>
										</tr>
								@endforeach
						</tbody>
				</table>
		@endif
</div>
@endsection
