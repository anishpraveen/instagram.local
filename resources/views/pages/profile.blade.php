@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <!-- User Details -->
        <div class="col-md-3 text-center">
            <div class="panel panel-group">
                <div class="panel-heading">Profile</div>

                <div class="panel-body">
                     <img src="{{ Auth::user()->profilePic }}" class="img-circle" alt="" height="145" width="145"> 
                </div>
            </div>
        </div>
         <!--    Posts    -->
         <div class="col-md-9">            
            <div class="row">
                 <!-- Add New Post -->
                <div class="col-md-12">
                    <div class="panel panel-group" style="background-color:#ececec;">
                        

                        <div class="panel-body transparent" style="padding:0; ">
                            <form class="form-horizontal" role="form" method="POST" action="{{ url('/posts') }}" enctype="multipart/form-data">
                                {{ csrf_field() }}

                                <div id="profileFormBar" class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div id="iconStatus" class="col-md-1 col-sm-1 col-xs-1 profileFormBarIcons">
                                                 <label id="lStatus" class="btn">
                                                    
                                                    </label>                                                
                                            </div>
                                            <div class="col-md-2 col-sm-2 col-xs-2 iii">
                                                &nbsp Status
                                            </div>
                                            <div id="iconImage" class="col-md-1 col-sm-1 col-xs-1 profileFormBarIcons">
                                                <label id="lImage" class="btn">
                                                    <input name="image" type="file" id="main-input" onchange="previewFile(this);">
                                                    
                                                </label>
                                            </div>
                                            <div class="col-md-2 col-sm-2 col-xs-2 iii" id="">
                                                &nbsp Image
                                            </div>
                                            <div id="iconClock" class="col-md-1 col-sm-1 col-xs-1 col-md-offset-1 iii">
                                                <label id="lClock" class="btn">
                                                     <l class="iii">&nbsp Today, 3.20 AM </l>
                                                    </label>     
                                                    
                                            </div>
                                           
                                        </div>
                                    </div>                                    
                                </div>

                                <div class="clearfix" >
                                </div>
                                   
                                <div class="{{ $errors->has('description') ? ' has-error' : '' }}">
                                    <div class="postInput bgwhite">
                                        <input id="description" type="textarea" class="form-control  " name="description" value="{{ old('description') }}" required placeholder="Type here">
                                        <button type="submit" class="btn btn-primary" id="btnPost">
                                            Post
                                        </button>
                                        @if ($errors->has('description'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('description') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                
                            </form>
                        </div>
                        
                    </div>
                </div>
                 <!-- Previous Posts -->
                <div class="col-md-6">
                    <div class="panel panel-group">
                        <div class="panel-heading">Dashboard</div>

                        <div class="panel-body">
                            Welcome {{ Auth::user()->name }} 
                        </div>
                        <div class="panel-footer" style="background-color: white;">
                            Welcome {{ Auth::user()->name }} 
                            
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="panel panel-group">
                        <div class="panel-heading">Dashboard</div>

                        <div class="panel-body">
                            Welcome {{ Auth::user()->name }} 
                        </div>
                        <div class="panel-footer" style="background-color: white;">
                            Welcome {{ Auth::user()->name }} 
                            
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="panel panel-group">
                        <div class="panel-heading">Dashboard</div>

                        <div class="panel-body">
                            Welcome {{ Auth::user()->name }} 
                        </div>
                        <div class="panel-footer" style="background-color: white;">
                            Welcome {{ Auth::user()->name }} 
                            
                        </div>
                    </div>
                </div>
            </div>            
        </div>
        
    </div>
</div>
@endsection
