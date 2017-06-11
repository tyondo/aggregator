@extends('layouts.app-auth')

@section('content')

<div id="login" class="login loginpage col-lg-offset-4 col-lg-4 col-md-offset-3 col-md-6 col-sm-offset-3 col-sm-6 col-xs-offset-0 col-xs-12">
    <h1><a href="{{ url('/home') }}" title="Login Page" tabindex="-1">App Backend</a></h1>

    <form name="loginform" id="loginform" action="{{ url('/login') }}" method="post">
      {{ csrf_field() }}
        <p>
            <label for="user_login">Username<br />
                <input type="text" name="email" id="user_login" class="input" value="{{ old('email') }}" size="20" /></label>
                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
        </p>
        <p>
            <label for="user_pass">Password<br />
                <input type="password" name="password" id="user_pass" class="input" value="login123" size="20" /></label>
                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
        </p>
        <p class="forgetmenot">
            <label class="icheck-label form-label" for="rememberme"><input name="remember" type="checkbox" id="rememberme" value="forever" class="skin-square-orange" checked> Remember me</label>
        </p>



        <p class="submit">
            <input type="submit" name="wp-submit" id="wp-submit" class="btn btn-primary btn-block" value="Sign In" />
        </p>
    </form>

    <p id="nav">
        <a class="pull-left" href="{{ url('/password/reset') }}" title="Password Lost and Found">Forgot password?</a>
        <a class="pull-right" href="{{ url('/register') }}" title="Sign Up">Sign Up</a>
    </p>


</div>
@endsection
