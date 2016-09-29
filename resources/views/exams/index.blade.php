@extends('layouts.app')

@section('content')
<div class="container">
		<h3>Kommende Prüfungstermine</h3>
		<table class="table">
				<thead>
						<tr>
								<th>Gruppe</th>
								<th>Datum</th>
								<th></th>
								<th>Aktionen</th>
						</tr>
				</thead>
				<tbody>
						@foreach ($exams as $exam)
								<tr>
										<td class="col-md-3">{{ $exam->group->name }}</td>
										<td class="col-md-3">{{ DateTime::createFromFormat('Y-n-j', $exam->examination_date)->format('j.n.Y') }} {{$exam->examination_time}} Uhr</td>
										<td class="col-md-3">
												nominiert?
										</td>
										<td class="col-md-2">
								        <form action="{{ url('exams/'.$exam->id) }}" method="POST">
								            {{ csrf_field() }}
								            {{ method_field('DELETE') }}
														<a href="{{ url('exams/'.$exam->id.'/edit') }}" class="btn btn-default" role="button"><i class="fa fa-pencil"></i></a>
								            <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
								        </form>
										</td>
								</tr>
						@endforeach
				</tbody>
		</table>

		@if (Auth::user()->admin)
		<div class="panel panel-default">
			  <div class="panel-heading"><span class="glyphicon glyphicon-calendar"></span> Prüfungstermin hinzufügen</div>
			  <div class="panel-body">
						<form action="{{ url('exams') }}" method="POST">
							{{ csrf_field() }}

				      <div class="form-group{{ $errors->has('group') ? ' has-error' : '' }}">
				          <label for="group" class="control-label">Gruppe</label>
									<select id="group" name="group" class="form-control">
											<option selected value="">Keine</option>
											@foreach($groups as $group)
													<option value="{{$group->id}}">{{$group->name}}</option>
											@endforeach
									</select>
				      </div>


		          <div class="form-group{{ $errors->has('time') ? ' has-error' : '' }}">
		              <label for="time" class="control-label">Zeit</label>
		              <input id="time" type="text" class="form-control" name="time" value="{{ old('time') }}" placeholder="10:00">
		              @if ($errors->has('time'))
		                  <span class="help-block">
		                      <strong>{{ $errors->first('time') }}</strong>
		                  </span>
		              @endif
		          </div>

		          <div class="form-group{{ $errors->has('date') ? ' has-error' : '' }}">
		              <label for="date" class="control-label">Datum</label>
		              <input id="date" type="text" class="form-control" name="date" value="{{ old('date') }}" placeholder="24.11.2016">
		              @if ($errors->has('date'))
		                  <span class="help-block">
		                      <strong>{{ $errors->first('date') }}</strong>
		                  </span>
		              @endif
		          </div>

		          <div class="form-group{{ $errors->has('remarks') ? ' has-error' : '' }}">
		              <label for="remarks" class="control-label">Bemerkungen</label>
		              <textarea id="remarks" type="text" class="form-control" name="remarks" value="{{ old('remarks') }}" placeholder="Rechtzeitig erscheinen, kein Picknick, sonstiges..."></textarea>
									@if ($errors->has('remarks'))
		                  <span class="help-block">
		                      <strong>{{ $errors->first('remarks') }}</strong>
		                  </span>
									@endif
		          </div>
							<button type="submit" class="btn btn-primary pull-right">
									<span class="glyphicon glyphicon-floppy-disk"></span> Hinzufügen
							</button>
						</form>
			  </div>
		</div>
</div>
@endif

@endsection
