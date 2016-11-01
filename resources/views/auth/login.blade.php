@extends('layouts.guest')

@section('content')
<div class="container " id="mydiv">
    <div class="row">
        <div class="col-md-8 col-md-offset-2 ">
            <div class="panel panel-default transbox">
                <div class="panel-heading transbox"><div class="col-md-offset-5"><img src="/icons/Instagram_Signup_Logo.svg" alt=""> </div></div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <div class="boxHead" >
                                    Already a member?
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <!--<label for="email" class="col-md-4 control-label">E-Mail Address</label>-->

                            <div class="col-md-6 col-md-offset-3">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus placeholder="Email">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            
                            <div class="col-md-6 col-md-offset-3">
                                <input id="password" type="password" class="form-control" name="password" required placeholder="Password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-3 ">
                                <button type="submit" class="btn btn-primary form-control">
                                    SIGN IN
                                </button>
                            </div>
                        </div>
                        <div class="col-md-6 col-md-offset-3">
                            <div class="col-md-6 ">
                                <div class="checkbox">
                                    <!--<label>
                                        <input type="checkbox" name="remember"> Remember Me
                                    </label>-->
                                    <input type="checkbox" id="remember" name="remember" checked="checked">
                                    <label for="remember" class="check">
                                        <span>Remember Me</span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                 <a class="btn btn-link" href="{{ url('/password/reset') }}">
                                    Forgot Your Password?
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
