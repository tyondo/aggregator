@extends('layouts.app-auth')

@section('content')

<div id="register" class="login loginpage col-lg-offset-4 col-lg-4 col-md-offset-3 col-md-6 col-sm-offset-3 col-sm-6 col-xs-offset-0 col-xs-12">
                <h1><a href="{{ url('/home') }}" title="Login Page" tabindex="-1">App Backend</a></h1>

                <form name="loginform" id="loginform" action="{{ url('/register') }}" method="post">
                    {{ csrf_field() }}
                    <p>
                        <label for="user_login">Full Name<br />
                            <input type="text" name="name" id="user_login" class="input" value="{{ old('name') }}" size="20" autofocus="" required="" /></label>
                            @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                    </p>
                    <p>
                        <label for="user_login">Username<br />
                            <input type="text" name="username" id="user_login" class="input" value="{{ old('username') }}" size="20" /></label>
                            @if ($errors->has('username'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('username') }}</strong>
                                </span>
                            @endif
                    </p>
                    <p>
                        <label for="user_login">Email<br />
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
                    <p>
                        <label for="user_pass">Confirm Password<br />
                            <input type="password" name="password_confirmation" id="user_pass1" class="input" value="login123" size="20" /></label>
                    </p>
                    <p class="forgetmenot">
                        <label class="icheck-label form-label" for="rememberme"><input name="rememberme" type="checkbox" id="rememberme" value="forever" class="skin-square-orange" checked> I agree to terms to conditions</label>
                    </p>
                    <p class="submit">
                        <input type="submit" name="wp-submit" id="wp-submit" class="btn btn-primary btn-block" value="Sign Up" />
                    </p>
                </form>

                <p id="nav">
                    <a class="pull-left" href="#" title="Password Lost and Found">Forgot password?</a>
                    <a class="pull-right" href="{{ url('/login') }}" title="Sign Up">Sign In</a>
                </p>
                <div class="clearfix"></div>
                <div class="col-md-12 text-center register-social">

                    <a href="#" class="btn btn-primary btn-lg facebook"><i class="fa fa-facebook icon-sm"></i></a>
                    <a href="#" class="btn btn-primary btn-lg twitter"><i class="fa fa-twitter icon-sm"></i></a>
                    <a href="#" class="btn btn-primary btn-lg google-plus"><i class="fa fa-google-plus icon-sm"></i></a>
                    <a href="#" class="btn btn-primary btn-lg dribbble"><i class="fa fa-dribbble icon-sm"></i></a>

                </div>

            </div>

@endsection
