@extends('layouts.app')

@section('content')

<div class="container">
		<div class="row">
				<div class="col-md-4">
						<a href="{{ url('users') }}">< Zurück zur Benutzerübersicht</a>
				</div>
				@if (Auth::user()->admin)
						<div class="col-md-1 col-md-offset-7">
								<a href="{{ url('users/'.$user->id) }}" class="btn btn-primary" role="button"><span class="glyphicon glyphicon-chevron-left"></span></a>
						</div>
				@endif
		</div>
		@if ($user)
        <form id="userfrm" action="{{ url('users/'.$user->id) }}" method="POST">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
						<div class="row">
		            <div class="col-md-6 form-group{{ $errors->has('firstname') ? ' has-error' : '' }}">
		                <label for="firstname" class="control-label">Vorname</label>

										<div class="input-group input-group-lg">
		                    <input id="firstname" type="text" class="form-control" name="firstname" value="{{ $user->firstname }}">
										</div>
		                @if ($errors->has('firstname'))
		                    <span class="help-block">
		                        <strong>{{ $errors->first('firstname') }}</strong>
		                    </span>
		                @endif
		            </div>


			          <div class="col-md-6 form-group{{ $errors->has('lastname') ? ' has-error' : '' }}">
			              <label for="lastname" class="control-label">Nachname</label>

										<div class="input-group input-group-lg">
			                  <input id="lastname" type="text" class="form-control" name="lastname" value="{{ $user->lastname }}">
										</div>
			              @if ($errors->has('lastname'))
			                  <span class="help-block">
			                      <strong>{{ $errors->first('lastname') }}</strong>
			                  </span>
			              @endif
			          </div>
						</div>

			      <div class="form-group{{ $errors->has('belt') ? ' has-error' : '' }}">
			          <label for="belt" class="control-label">Graduierung</label>
								<select id="belt" name="belt" class="form-control">
										<option
											@if(!($user->belt))
													selected
											@endif
											value="">Keine</option>
										@foreach($belts as $belt)
												<option
												@if($user->belt && $user->belt->id == $belt->id)
														selected
												@endif
												value="{{$belt->id}}">{{$belt->label()}}</option>
										@endforeach
								</select>
			      </div>

			      <div class="form-group{{ $errors->has('group') ? ' has-error' : '' }}">
			          <label for="group" class="control-label">Gruppe</label>
								<select id="group" name="group" class="form-control">
										<option
										@if (!$user->group)
												selected
										@endif
										value="">Keine</option>
										@foreach($groups as $group)
												<option
												@if ($user->group && $user->group->id == $group->id)
														selected
												@endif
												value="{{$group->id}}">{{$group->name}}</option>
										@endforeach
								</select>
			      </div>

			      <div class="form-group">
								<label>
										<input type="checkbox" id="admin" name="admin"
										@if ($user->admin)
												checked
										@endif
										>
										Admin
								</label><br />
								<label>
										<input type="checkbox" id="instructor" name="instructor"
										@if ($user->instructor)
												checked
										@endif
										>
										Instruktor
								</label>
			      </div>

						<div class="form-group">
							<button type="submit" class="btn btn-primary pull-right">
								<i class="fa fa-btn fa-floppy-o"></i> Speichern
							</button>
						</div>
				</form>
		@endif

    @include('common.errors')
</div>
@endsection
