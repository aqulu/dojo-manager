@extends('layouts.app')

@section('content')

<div class="container">
		@if ($user)
        <form id="userfrm" action="{{ url('profile') }}" method="POST">
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
						<div class="row">
								<div class="col-sm-12 form-group{{ $errors->has('email') ? ' has-error' : '' }}">
										<label for="email" class="control-label">E-Mail</label>

										<div class="input-group input-group-lg">
												<input id="email" type="text" class="form-control" name="email" value="{{ $user->email }}">
										</div>
										@if ($errors->has('email'))
												<span class="help-block">
														<strong>{{ $errors->first('email') }}</strong>
												</span>
										@endif
								</div>
						</div>
						<div class="row">
		            <div class="col-sm-12 form-group{{ $errors->has('password') ? ' has-error' : '' }}">
		                <label for="password" class="control-label">Passwort</label>

										<div class="input-group input-group-lg">
		                    <input id="password" type="password" class="form-control" name="password" placeholder="**********" value="">
										</div>
		                @if ($errors->has('password'))
		                    <span class="help-block">
		                        <strong>{{ $errors->first('password') }}</strong>
		                    </span>
		                @endif
		            </div>
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
