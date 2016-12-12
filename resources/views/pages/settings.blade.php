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
                    <img src="/icons/settings_select.svg" class="sideBarIcons" alt="">General Settings
                </div>
                <hr class="noMargin">
                <div class="panel-heading  sideBar text-left" style="">
                    <a href="/favourites">
                        <img src="/icons/heart_select.svg" class="sideBarIcons" alt=""> 
                        <span >Favorites</span>
                    </a>
                </div>
                <hr class="noMargin">
                <div class="panel-heading sideBar text-left">
                    <a href="{{ url('/logout') }}"
                        onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();" >
                    <img src="/icons/logout.svg" class="sideBarIcons" alt=" Logout "> Logout
                    </a>                    
                </div>
            </div>
        </div>
        <div class="col-md-9" style="padding-left:0;">
            <div class="panel panel-default" style="border:0;">
                <div class="panel-heading" style="border:0;" id="recommendedPeopleHeading">
                    General Account Settings
                    <a id="enableEdit" class="pointer"><img src="/icons/edit.svg" style="float:right; padding-top:3px;" alt=""></a>
                </div>
                <form class="" role="form" method="POST" action="{{ url('/user/save') }}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="panel-body">
                        
                        <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">                           
                            <div class="col-md-6 col-md-offset-1">
                                <div  style="postion: relative; ">
                                    <div id="profileAvatar" >
                                        <label class="btn ">
                                    <input name="image" type="file" accept="image/x-png,image/gif,image/jpeg,image/jpg" id="main-input" onchange="editProfilePic(this);"><img id="imgAddAvatar" src="/icons/add_button.svg" class="addButton hidden"></label>
                                    
                                        <img src="{{ Auth::user()->profilePic }} " class="imgCircle" width="95" height="95" 
                                            style=" border-radius: 50%;" id="avatar" alt="Profile picture">
                                        <!--<a class="editAvatar hidden" style=""> 
                                            <img src="/icons/edit.svg" alt="Edit" title="Edit Avatar" height="25" style=" transform: scaleX(-1);">
                                        </a>-->
                                    </div>
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
                                <label id="lblUsername" class="inputFieldsSettings" >http://www.instagram.com/{{ strtolower(Auth::user()->name) }}.{{ strtolower(Auth::user()->lastName) }}</label>

                            
                            </div>
                        </div>

                        <div class="clearfix">                    
                        </div>
                        <hr class="noMargin">
                        
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="contact" class="col-md-4 labelSettings">Contact</label>

                            <div class="col-md-6 ">
                                
                                <label id="lblUsername" class="inputFieldsSettings" >{{ Auth::user()->email }}</label>

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
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}" id="divPassword">
                            <label for="password" class="col-md-4 labelSettings">Password</label>

                            <div id="divPasswordInput" class="col-md-6 ">
                                <input id="password" type="password" class="inputFieldsSettings" disabled name="password" value="*********">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="clearfix">                    
                        </div>
                        <div class="hidden edit" >
                            <div class="col-md-3 col-md-offset-1" style="padding-bottom:20px;">
                                <a id="btnCancel" href="/settings" class="btn btn-danger form-control">
                                    CANCEL
                                </a>
                            </div>
                        </div>
                        <div class="hidden edit" >
                            <div class="col-md-3" style="padding-bottom:20px;">
                                <button id="btnSave" type="submit" class="btn btn-primary form-control">
                                    SAVE
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('footer')
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script src="/js/image.js"></script>

    <script>
        $("#enableEdit").click(function(event){
            event.preventDefault();
            $('.inputFieldsSettings').prop("disabled", false); // Element(s) are now enabled.
            $('#imgAddAvatar').removeClass("hidden");
            $('.edit').removeClass("hidden");
            $('.editAvatar').removeClass("hidden");
            $("#password").val("");
        });   
        $('#password').blur(function() {
          $.ajax({
                url: '/user/password',
                type: 'POST',
                data: {password:$('#password').val() },
                beforeSend: function (request) {
                            return request.setRequestHeader('X-CSRF-Token', $("meta[name='csrf-token']").attr('content'));
                        },
                success: function(data){
                    if(data['status'] == 'invalid'){
                        $('#btnSignUp').prop( "disabled", true );
                        $('#divPassword').addClass('has-error');
                        $( "#helpSpanPassword" ).remove();
                        $( "#divPasswordInput" ).append( '<span id="helpSpanPassword" class="help-block"><strong>'+data["message"]+'</strong></span>' );
                    }
                    else{
                        toastr.success(data["message"]);
                        $('#btnSignUp').prop( "disabled", false );
                        $('#divPassword').removeClass('has-error');
                        $( "#helpSpanPassword" ).remove();
                    }
                }
            });            
      });
    </script>
@endsection