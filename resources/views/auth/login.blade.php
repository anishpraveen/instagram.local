@extends('layouts.guest')

@section('content')
<link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">

<div class="container " id="mydiv">
    <div class="row">
        <div class="col-md-8 col-md-offset-2 ">
            <div class="panel panel-default transbox">
                <div class="panel-heading transbox">
                    <!--include('flash::message')-->
                    <div class="col-md-offset-5 clearfix">
                        <img src="/icons/Instagram_Signup_Logo.svg" alt=""> 
                    </div>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <div class="boxHead" >
                                    Already a member?
                            </div>
                            <div class="boxSubHead" >
                                    Sign in to your account
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <!--<label for="email" class="col-md-4 control-label">E-Mail Address</label>-->

                            <div class="col-md-6 col-md-offset-3">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus placeholder=@lang('placeholder.email')>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            
                            <div class="col-md-6 col-md-offset-3">
                                <input id="password" type="password" class="form-control" name="password" required placeholder=@lang('placeholder.password')>

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
                        <div class="col-md-6 col-md-offset-3 white">
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
                                 <a class="btn btn-link white" href="{{ url('/password/reset') }}">
                                    Forgot Your Password?
                                </a>
                            </div>
                        </div>
                    </form>                    
                    <div class="form-group white clearfix" id="divSignUp">
                        <div class="col-md-6 col-md-offset-3 ">
                            Dont't have an account?
                            <a href="/register"  class="pink">
                                SIGN UP
                            </a>
                        </div>
                    </div>
                    <div class="connectBox white">
                        Connect With 
                        <a href="{{ route('social.redirect', ['provider' => 'google']) }}"><img src="/icons/google-plus.svg" alt="google-plus"></a>
                        <a href="{{ route('social.redirect', ['provider' => 'facebook']) }}"><img src="/icons/facebook.svg" alt="facebook"></a>
                        
                    </div>
                </div>                
            </div>
        </div>
    </div>
</div>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script>
    toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": false,
        "progressBar": true,
        "positionClass": "toast-top-full-width",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "3000",
        "hideDuration": "10000",
        "timeOut": "50000",
        "extendedTimeOut": "10000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }
    @if(session()->has('flash_notification.message'))

        var type = "{{ Session::get('flash_notification.level', 'info') }}";
        switch(type){
            case 'info':
                toastr.info("{{ Session::get('flash_notification.message') }}");
                break;
            
            case 'warning':
                toastr.warning("{{ session('flash_notification.message') }}");
                break;
            case 'success':
                toastr.success("{{ session('flash_notification.message') }}");
                break;
            case 'danger':
                toastr.error("{{ Session::get('flash_notification.message') }}");
                break;
        }
    @endif
</script>
@endsection
