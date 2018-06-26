@extends(config('aggregator.views.layouts.admin'))

@section('content')
    <div>
        <div class="login_wrapper">
            <div class="animate form login_form">
                <section class="login_content">
                    <form role="form" method="POST" action="{{ route('password.reset.post') }}">
                        {{ csrf_field() }}
                        <h1>Reset Password</h1>
                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email address" required="" autofocus />
                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                            {!! $errors->first('email', '<div class="text-danger">:message</div>') !!}
                        </div>
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <input type="password" class="form-control" name="password" placeholder="Password" required=""  />
                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                            {!! $errors->first('password', '<div class="text-danger">:message</div>') !!}
                        </div>
                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" required=""  />
                            @if ($errors->has('password_confirmation'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                                </span>
                            @endif
                            {!! $errors->first('password_confirmation', '<div class="text-danger">:message</div>') !!}
                        </div>
                        <div class="form-group">
                            <button class="btn btn-block btn-primary submit" type="submit" >Reset Password</button>
                        </div>

                        <div class="clearfix"></div>

                        <div class="separator">
                            <p class="change_link">Lost your password?
                                <a href="{{route('password.request.form')}}" class="to_register"> Reset Password </a>
                            </p>
                            <p class="change_link">New to site?
                                <a href="{{route('register.form')}}" class="to_register"> Create Account </a>
                            </p>

                            <div class="clearfix"></div>
                            <br />

                            <div>
                                <h1><i class="fa fa-paw"></i> {{config('app.name')}}</h1>
                            </div>
                        </div>
                    </form>
                </section>
            </div>
        </div>
    </div>

{{--<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Reset Password</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/password/reset') }}">
                        {!! csrf_field() !!}
                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group">
                                <div class="input-group">
                                  <div class="input-group-addon"><i class="fa fa-1x fa-fw fa-envelope"></i></div>
                            <label class="col-md-4 control-label">E-Mail Address</label>
                            <div class="col-md-6">
                                <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                                {!! $errors->first('email', '<div class="text-danger">:message</div>') !!}
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Password</label>
                            <div class="col-md-6">
                                <div class="input-group">
                                  <div class="input-group-addon"><i class="fa fa-1x fa-fw fa-lock"></i></div>
                                <input type="password" class="form-control" name="password">
                                {!! $errors->first('password', '<div class="text-danger">:message</div>') !!}
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Confirm Password</label>
                            <div class="col-md-6">
                                <div class="input-group">
                                  <div class="input-group-addon"><i class="fa fa-1x fa-fw fa-lock"></i></div>
                                <input type="password" class="form-control" name="password_confirmation">
                                {!! $errors->first('password_confirmation', '<div class="text-danger">:message</div>') !!}
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Reset Password
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>--}}
@endsection