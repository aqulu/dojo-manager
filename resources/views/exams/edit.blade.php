@extends('layouts.app')

@section('content')
<div class="container">
		<div class="row">
				<div class="col-md-4">
						<a href="{{ url('exams') }}">< Zurück zur Prüfungsübersicht</a>
				</div>
		</div>

		<h3>Prüfung vom {{ DateTime::createFromFormat('Y-n-j', $exam->examination_date)->format('j.n.Y') }} {{ $exam->examination_time }} Uhr</h3>

		<form action="{{ url('exams/'.$exam->id) }}" method="POST">
				{{ csrf_field() }}
				{{ method_field('PUT') }}

	      <div class="form-group{{ $errors->has('group') ? ' has-error' : '' }}">
	          <label for="group" class="control-label">Gruppe</label>
						<select id="group" name="group" class="form-control">
								@foreach($groups as $group)
										<option
										@if($exam->group->id === $group->id)
												selected
										@endif
										value="{{$group->id}}">{{$group->name}}</option>
								@endforeach
						</select>
	      </div>
				<div class="row">
						<div class="col-sm-6">
					      <div class="form-group{{ $errors->has('date') ? ' has-error' : '' }}">
					          <label for="date" class="control-label">Datum</label>
					          <input id="date" type="text" class="form-control" name="date" value="{{ DateTime::createFromFormat('Y-n-j', $exam->examination_date)->format('j.n.Y') }}" placeholder="24.11.2016">
					          @if ($errors->has('date'))
					              <span class="help-block">
					                  <strong>{{ $errors->first('date') }}</strong>
					              </span>
					          @endif
					      </div>
						</div>
						<div class="col-sm-6">
					      <div class="form-group{{ $errors->has('time') ? ' has-error' : '' }}">
					          <label for="time" class="control-label">Zeit</label>
					          <input id="time" type="text" class="form-control" name="time" value="{{ $exam->examination_time }}" placeholder="10:00">
					          @if ($errors->has('time'))
					              <span class="help-block">
					                  <strong>{{ $errors->first('time') }}</strong>
					              </span>
					          @endif
					      </div>
						</div>
				</div>

	      <div class="form-group{{ $errors->has('remarks') ? ' has-error' : '' }}">
	          <label for="remarks" class="control-label">Bemerkungen</label>
	          <textarea id="remarks" type="text" class="form-control" name="remarks" value="{{ $exam->remarks }}" placeholder="Rechtzeitig erscheinen, kein Picknick, sonstiges..."></textarea>
								@if ($errors->has('remarks'))
	              <span class="help-block">
	                  <strong>{{ $errors->first('remarks') }}</strong>
	              </span>
	          		@endif
	      </div>

				<button type="submit" class="btn btn-primary pull-right">
						<span class="glyphicon glyphicon-floppy-disk"></span> Speichern
				</button>
		</form>
		<br />
		@if ($exam->nominees && count($exam->nominees) > 0 )
		<h4>Nominierte</h4>
		<table class="table">
				<thead>
						<tr>
								<th>Name</th>
								<th>Aktuelle Graduierung</th>
								<th>Aktionen</th>
						</tr>
				</thead>
				<tbody>
						@foreach ($exam->nominees as $user)
								<tr>
										<td class="col-sm-5"><a href="{{ url('users/'.$user->id) }}">{{$user->fullname()}}</a></td>
										<td class="col-sm-3">
												@if ($user->belt)
														{{$user->belt->label()}}
												@else
														Keine Graduierung
												@endif
										</td>
										<td class="col-sm-3">
								        <form action="{{ url('exams/'.$exam->id.'/nominees/'.$user->id) }}" method="POST">
								            {{ csrf_field() }}
								            {{ method_field('DELETE') }}
								            <button type="submit" class="btn btn-danger">
								                <i class="fa fa-minus"></i>
								            </button>
								        </form>
										</td>
								</tr>
						@endforeach
				</tbody>
		</table>
		@endif

		@if($users && count($users) > 0)
		<h4>Mögliche Kandidaten</h4>
		<table class="table">
				<thead>
						<tr>
								<th>Name</th>
								<th>Aktuelle Graduierung</th>
								<th>Aktionen</th>
						</tr>
				</thead>
				<tbody>
						@foreach ($users as $user)
								<tr>
										<td class="col-sm-5"><a href="{{ url('users/'.$user->id) }}">{{$user->fullname()}}</a></td>
										<td class="col-sm-3">
												@if ($user->belt)
														{{$user->belt->label()}}
												@else
														Keine Graduierung
												@endif
										</td>
										<td class="col-sm-3">
												<form action="{{ url('exams/'.$exam->id.'/nominees') }}" method="POST">
														{{ csrf_field() }}
	            							<input type="hidden" name="userId" value="{{ $user->id }}">
														<button type="submit" class="btn btn-primary">
																<i class="fa fa-plus"></i>
														</button>
												</form>
										</td>
								</tr>
						@endforeach
				</tbody>
		</table>
		@endif

</div>

@endsection
