@extends('layouts.guest')

@section('content')
<div class="container" id="mydiv" >
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default transbox">
                <div class="panel-heading transbox"><div class="col-md-offset-5"><img src="/icons/Instagram_Signup_Logo.svg" alt=""> </div></div>
                <div class="panel-body "  >
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }} " enctype="multipart/form-data" >
                        {{ csrf_field() }}

                        <div class="form-group">
                            <div class="boxHead" >
                                    Sign Up
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                           
                            <div class="col-md-6 col-md-offset-4">
                                <div style="postion: relative; ">
                                    <label class="btn ">
                                    <input name="image" type="file" id="main-input" onchange="previewFile(this);"><img src="/icons/add_button.svg" class="addButton"></label>
                                    <img src="/icons/Avatar.svg" class="imgCircle" width="95" height="95" style=" border-radius: 50%;" id="avatar" alt="Profile picture">
                                </div>
                                @if ($errors->has('image'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('image') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                           <!-- <label for="name" class="col-md-4 control-label">Name</label> -->

                            <div class="col-md-6 col-md-offset-3">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required placeholder="First Name"  autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('lastname') ? ' has-error' : '' }}">
                            
                            <div class="col-md-6 col-md-offset-3">
                                <input id="lastname" type="text" class="form-control" name="lastname" value="{{ old('lastname') }}" required placeholder="Last Name" >

                                @if ($errors->has('lastname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('lastname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            
                            <div class="col-md-6 col-md-offset-3">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required placeholder="Email Address" >

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            
                            <div class="col-md-6 col-md-offset-3">
                                <input id="password" type="password" class="form-control" name="password" required placeholder="Password" >

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!--<div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>-->
                        <style>
                            .ddl {
                                
                                height: 36px;
                                padding: 6px 5px;                               
                                background-color: #fff;
                                border: 1px solid #ccd0d2;                                       
                                box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
                                font-family: ProximaNova-Regular;
                                font-size: 15px;
                                color: #bebebe;
                                margin-right: 5px;
                            }
                        </style>
                        <div class="form-group{{ $errors->has('DOBMonth') ? ' has-error' : '' }}{{ $errors->has('DOBYear') ? ' has-error' : '' }}">
                            <div class="col-md-6 col-md-offset-3">
                                <label for="birthday" class="subHeading">Birthday</label>

                                <div >
                                    <!-- <input id="birthday" type="date" class="form-control" name="birthday" required>
                                        <select name="DOBMonth">
                                            <option hidden>Month</option>
                                            <option value="January">Jan</option>
                                            <option value="Febuary">Feb</option>
                                            <option value="March">Mar</option>
                                            <option value="April">Apr</option>
                                            <option value="May">May</option>
                                            <option value="June">Jun</option>
                                            <option value="July">Jul</option>
                                            <option value="August">Aug</option>
                                            <option value="September">Sep</option>
                                            <option value="October">Oct</option>
                                            <option value="November">Nov</option>
                                            <option value="December">Dec</option>
                                        </select>
                                        -->
                                    
                                    <select id="DOBDay" required  name="DOBDay" class="ddl col-md-3" >
                                        {{ $last= 31 }}
                                        {{ $now = 1 }}
                                        <option hidden value="">Day</option>
                                        @for ($i = $now ; $i <=  $last ; $i++)
                                            <option value="{{ $i }}"  @if (old('DOBDay') == $i) selected="selected" @endif>{{ $i }}</option>
                                        @endfor 
                                        
                                    </select>
                                
                                    <select id="DOBMonth" required name="DOBMonth" class="ddl col-md-4">
                                        <option hidden value="">Month</option>
                                        <option value="1">Jan</option>
                                        <option value="2">Feb</option>
                                        <option value="3">Mar</option>
                                        <option value="4">Apr</option>
                                        <option value="5">May</option>
                                        <option value="6">Jun</option>
                                        <option value="7" >Jul</option>
                                        <option value="8">Aug</option>
                                        <option value="9">Sep</option>
                                        <option value="10">Oct</option>
                                        <option value="11">Nov</option>
                                        <option value="12">Dec</option>
                                    </select>
                                
                                    <select id="DOBYear" required name="DOBYear" class="ddl col-md-4">
                                        {{ $last= date('Y')-120 }}
                                        {{ $now = date('Y') }}
                                        <option hidden value="">Year</option>
                                        @for ($i = $now ; $i >=  $last ; $i--)
                                            <option value="{{ $i }}" @if (old('DOBYear') == $i) selected="selected" @endif>{{ $i }}</option>
                                        @endfor 
                                        
                                    </select>
                                    
                                     @if ($errors->has('DOBDay'))
                                         <span class="help-block">
                                             <strong>{{ $errors->first('DOBDay') }}</strong>
                                         </span>
                                     @endif
                                     @if ($errors->has('DOBMonth'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('DOBMonth') }}</strong>
                                        </span>
                                    @endif
                                    @if ($errors->has('DOBYear'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('DOBYear') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <style>
                        
                            input[type=radio]{display:none;}
                            
                            input[type=radio] + label.male{
                                display:inline-block;
                                cursor: pointer;
                                
                                
                                background-image: url(/icons/round.svg);
                                background-repeat: no-repeat;
                                
                                text-indent: 25px;
                            }
                            
                            input[type=radio]:checked + label.male{   
                                background-image: url(/icons/round_select.svg);
                                }

                            input[type=radio] + label.female{
                                display:inline-block;
                                cursor: pointer;
                            
                                background-image: url(/icons/round.svg);
                                background-repeat: no-repeat;
                                
                                text-indent: 25px;
                            }
                            
                            input[type=radio]:checked + label.female{   
                                background-image: url(/icons/round_select.svg);
                                }



                        </style>
                        <div class="form-group{{ $errors->has('gender') ? ' has-error' : '' }} ">
                            <div class="col-md-6 col-md-offset-3 ">
                                <label for="gender" class="subHeading">Gender</label>

                                <br>
                                <input type="radio" id="radio-img-1" name="gender" value="male">
                                <label for="radio-img-1" class="male">Male</label>

                                <input type="radio" id="radio-img-2" name="gender"  value="female" checked="checked">
                                <label for="radio-img-2" class="female">Female</label>
                            </div>
                            @if ($errors->has('gender'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('gender') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <div class="col-md-7 col-md-offset-3">
                                <button type="submit" class="btn btn-primary form-control">
                                    SIGN UP
                                </button>
                            </div>
                        </div>
                    </form>
                    <div>
                        <div>
                            <a href="/login" id="aBack">Back</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--
@if ($errors->any())
	
	<ul class="alert alert-danger form-group">	
		@foreach ($errors->all() as $error)
			<li>{{ $error }}</li>
		@endforeach
	</ul>

@endif
-->


@endsection
