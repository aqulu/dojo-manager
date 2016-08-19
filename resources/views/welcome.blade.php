@extends('layouts.base')

@section('content')
		<div class="container">
		    <div class="row">
		        <div class="col-md-6 col-md-offset-3">
							<div class="row">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="control-label">E-Mail Address</label>
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">
                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="control-label">Password</label>
                            <input id="password" type="password" class="form-control" name="password">

                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group">
														<div class="col-md-4">
	                              <div class="checkbox">
	                                  <label>
	                                      <input type="checkbox" name="remember"> Remember Me
	                                  </label>
	                              </div>
														</div>
                            <div class="col-md-8">
																<button type="submit" class="btn btn-primary pull-right">
																	<i class="fa fa-btn fa-sign-in"></i> Login
																</button>
																<a class="btn btn-link pull-right" href="{{ url('/password/reset') }}">Forgot Your Password?</a>
                            </div>
                        </div>
                    </form>
							</div>
		        </div>
		    </div>
		</div>
@endsection
