@extends('layouts.app')

@section('title')
    Settings
@endsection

@section('content')
<link href="/css/guest.css" rel="stylesheet">
<div class="container">
    <div class="row">
        <!-- Side bar -->
        <div class="col-md-3 text-center">
            <div class="panel panel-group" style="border:0;">
                <div class="panel-heading  selectedSideBar text-left sideBar">
                    <img src="/icons/settings_select.svg" style="padding-right:10px;" alt="">General Settings
                </div>
                <hr class="noMargin">
                <div class="panel-heading  sideBar text-left" style="">
                    <a href="/favourites">
                        <img src="/icons/heart_select.svg" style="padding-right:10px;" alt=""> 
                        <span >Favorites</span>
                    </a>
                </div>
                <hr class="noMargin">
                <div class="panel-heading sideBar text-left">
                    <img src="/icons/logout.svg" style="padding-right:10px;" alt="">Logout
                </div>
            </div>
        </div>
        <div class="col-md-9" style="padding-left:0;">
            <div class="panel panel-default" style="border:0;">
                <div class="panel-heading" style="border:0;" id="recommendedPeopleHeading">
                    General Accounts Settings
                    <a class="pointer"><img src="/icons/edit.svg" style="float:right;" alt=""></a>
                </div>

                <div class="panel-body">
                    
                    <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">                           
                        <div class="col-md-6 col-md-offset-1">
                            <div style="postion: relative; ">
                                <label class="btn ">
                                <input name="image" type="file" id="main-input" onchange="previewFile(this);"><img src="/icons/add_button.svg" class="addButton"></label>
                                <img src="{{ Auth::user()->profilePic }} " class="imgCircle" width="95" height="95" style=" border-radius: 50%;" id="avatar" alt="Profile picture">
                            </div>
                            @if ($errors->has('image'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('image') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    
                    <div class="clearfix">                    
                    </div>

                    <br>
                     <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="name" class="col-md-4 labelSettings">Name</label>

                        <div class="col-md-6 ">
                            <input type="text" class="inputFieldsSettings" disabled name="name" value="{{ Auth::user()->name }} {{ Auth::user()->lastName }}" required placeholder="First Name"  autofocus>

                            @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="clearfix">                    
                    </div>
                    <hr class="noMargin">
                    
                    <div class="form-group">
                        <label for="username" class="col-md-4 labelSettings">Username</label>

                        <div class="col-md-7 ">
                            <label class="inputFieldsSettings" >http://www.instagram.com/{{ Auth::user()->name }}.{{ Auth::user()->lastName }}</label>

                           
                        </div>
                    </div>

                    <div class="clearfix">                    
                    </div>
                    <hr class="noMargin">
                    
                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="contact" class="col-md-4 labelSettings">Contact</label>

                        <div class="col-md-6 ">
                            <input type="text" class="inputFieldsSettings" disabled name="email" value="{{ Auth::user()->email }} " required>

                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="clearfix">                    
                    </div>
                    <hr class="noMargin">                    
                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <label for="password" class="col-md-4 labelSettings">Password</label>

                        <div class="col-md-6 ">
                            <input type="password" class="inputFieldsSettings" disabled name="password" value="{{ Auth::user()->password }} " required>

                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('footer')
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script src="/js/image.js"></script>
@endsection