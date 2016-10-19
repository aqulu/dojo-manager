@extends('layouts.base')

@section('content')
<div class="container top-margin">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
					<h1>Login</h1>

          <form class="form-vertical" role="form" method="POST" action="{{ url('/login') }}">
              {{ csrf_field() }}

              <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                  <label for="email" class="control-label">E-Mail Adresse</label>

									<div class="input-group input-group-lg">
											<span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
                      <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">
									</div>
                  @if ($errors->has('email'))
                      <span class="help-block">
                          <strong>{{ $errors->first('email') }}</strong>
                      </span>
                  @endif
              </div>

              <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                  <label for="password" class="control-label">Passwort</label>
									<div class="input-group input-group-lg">
											<span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                  		<input id="password" type="password" class="form-control" name="password">
									</div>

                  @if ($errors->has('password'))
                      <span class="help-block">
                          <strong>{{ $errors->first('password') }}</strong>
                      </span>
                  @endif
              </div>

              <div class="form-group">
                  <label>
                      <input type="checkbox" name="remember"> Angemeldet bleiben
                  </label>
									<button type="submit" class="btn btn-primary pull-right">
										<i class="fa fa-btn fa-sign-in"></i> Login
									</button>
              </div>
          </form>

					<div class="row top-margin">
							<a class="btn btn-link" href="{{ url('/register') }}">Registrieren</a><br />
							<a class="btn btn-link" href="{{ url('/password/reset') }}">Password vergessen?</a>
					</div>
        </div>
    </div>
</div>
@endsection
