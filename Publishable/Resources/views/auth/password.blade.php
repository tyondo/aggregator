@extends(config('aggregator.views.layouts.admin'))

@section('content')


<div>
    <div class="login_wrapper">
        <div class="animate form login_form">
            <section class="login_content">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                <form role="form" method="POST" action="{{ route('password.request.post') }}">
                    {{ csrf_field() }}
                    <h1>Reset Password</h1>
                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Registered Email" required="" autofocus />
                        @if ($errors->has('email'))
                            <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <button class="btn btn-block btn-primary submit" type="submit" >Reset Password</button>
                    </div>

                    <div class="clearfix"></div>

                    <div class="separator">
                        <p class="change_link">Remembered Password?
                            <a href="{{route('login.form')}}" class="to_register"> Login </a>
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
@endsection