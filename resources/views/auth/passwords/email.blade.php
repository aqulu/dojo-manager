@extends('layouts.base')

@section('content')
<div class="container top-margin">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
					<h1>Reset Password</h1>
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            <form class="form-vertical" role="form" method="POST" action="{{ url('/password/email') }}">
                {{ csrf_field() }}

                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="email" class="control-label">E-Mail Address</label>
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

                <div class="form-group">
										<a class="btn btn-link" href="{{ url('/login') }}">Back to login</a>
                    <button type="submit" class="btn btn-primary pull-right">
                        <i class="fa fa-btn fa-envelope"></i> Send Password Reset Link
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
