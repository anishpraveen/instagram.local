@extends('layouts.app')

@section('title')
    Profile
@endsection

@section('content')
<div class="hidden laravelInfo" >
   {{ $mytime = Carbon\Carbon::now() }} 
   
</div>

<div class="container">
    <div class="row">
        <!-- User Details -->
        <div class="col-md-3 text-center">
            <div class="panel panel-group">
                <div class="panel-heading"></div>

                <div class="panel-body">
                     <img src="{{ $user->profilePic }}" class="img-circle" alt="" height="145" width="145"> 
                     <div class="centerDiv">
                         <span id="spanProfileName">{{ $user->name }}&nbsp{{ $user->lastName }}</span>
                         <br>
                         <span id="spanProfileLocation">
                             <a class="btnShowProfile {{ $user->id == Auth::user()->id ? ' btnShowProfile' : 'btnShow' }}" style="cursor:pointer;" latitude="{{ $user['latitude'] }} " longitude="{{ $user['longitude'] }} ">
                                 <img src="/icons/pin_profile.svg" alt="">
                             </a>
                             &nbsp{{ $user->locationName }}
                        </span>
                        <br><br>
                        @if(Auth::user()->id != $user->id)
                            <div id="divFollow">
                                @if(!App\Follower::where('follower_id','=',Auth::user()->id)->where('user_id','=',$user->id)->count())
                                    <button type="button" id="btnFollowMe" class="btn btn-large btn-block btn-default btnFollow">
                                        <span id="{{ $user->id }}">Follow Me</span>
                                    </button>
                                @else
                                    <button type="button" id="btnFollowing" class="btn btn-large btn-block btn-default btnFollow">
                                        <span id="{{ $user->id }}">Following</span>
                                    </button>
                                @endif
                            </div>
                        @endif
                        <br>
                        <span class="spanFollow" id="spanFollowerCount" style="float:left; padding-left:8px;">{{ $user->followers }} Followers</span>
                        <span class="spanFollow" style="float:right; padding-right:8px;">{{ $user->follow }}  Following</span>
                        
                        
                     </div>
                </div>
            </div>
        </div>
         <!--    Posts    -->
         <div class="col-md-9 ">            
            <div class="row">
                @if($user->id == Auth::user()->id)
                    <!-- Add New Post -->
                    <div class="col-md-12" style="padding-bottom:30px;">
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/posts') }}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="col-md-6" id="profileBar" >
                                <div class="col-md-4 col-sm-4 col-xs-4" style="padding-right:0;">
                                    <div class="row">
                                        <div class="col-md-5 col-sm-5 col-xs-5 divImgProfileBar" >
                                            <img src="/icons/status.svg" alt="">
                                        </div>
                                        <div class="col-md-3 col-sm-3 col-xs-3 spanDeleteElement" style="padding-top:15px;">
                                            <span>Status</span>
                                        </div>
                                    </div>
                                    
                                    
                                </div>                                
                                <div class="col-md-3 col-sm-3 col-xs-3">
                                    <div class="row">
                                        <div class="col-md-5 col-sm-5 col-xs-5 divImgProfileBar" >
                                            <label id="">
                                                <input name="image" type="file" id="main-input" accept="image/*">
                                                <img src="/icons/camera.svg" alt="" class="pointer">
                                            </label> 
                                        </div>
                                        <div class="col-md-3 col-sm-3 col-xs-3 spanDeleteElement" style="padding-top:15px;">
                                            <span id="spanImage">Image</span>
                                        </div>
                                    </div>
                                    
                                </div>
                                <div id="divNewClock" class="col-md-5 col-sm-5 col-xs-5 " style="padding-top:15px;padding-right:0;">
                                    <div style="float:right; padding-right:10px;">
                                        <img  src="/icons/clock_post.svg" alt="">
                                        <span style="font-size: 12px;"> 
                                            <span class="spanDeleteElement" id="spanTodayText" style="text-decoration: none;"> Today, </span>
                                            <span id="lClock" >{{ $mytime->format('h.i A') }}</span>
                                        </span>                                
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 " style="background-color:white; height:70px;padding-left:0;">
                                <div class="col-md-10 col-sm-10 col-xs-7" style="padding-left:0;" >
                                    <input id="description" type="textarea" class="form-control  " name="description" value="{{ old('description') }}" required placeholder="Type here"
                                     style="background-color:white; border:0;height:70px"
                                    >                                
                                </div>
                                <div class="col-md-2 col-sm-2 col-xs-5" style="padding-top:15px; ">
                                    <button type="submit" class="btn btn-primary" id="btnPost" style="">
                                        Post
                                    </button>
                                </div>                                
                            </div>
                            <div class="col-md-12 {{ $errors->has('description') ? ' has-error' : '' }} {{ $errors->has('image') ? ' has-error' : '' }}">
                                @if ($errors->has('description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                                @if ($errors->has('image'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('image') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </form>
                        
                    </div>
                @endif
                <!-- Previous Posts -->
                <div class="scroll">
                    @if(!is_null($posts) && !empty($posts) && isset($posts))
                        
                            @include('pages._posts') 
                                   
                        {{$posts->setPath('')->links()}}
                    @else
                     <div class="col-md-6 ">
                            <div class="panel panel-group">
                                <div class="panel-heading postsUserName">                                         
                                    Add some posts
                                </div>

                                <div class="panel-body postImage">                                
                                    
                                </div>
                                <div class="panel-footer" style="background-color: white; word-wrap: break-word;">   
                                   
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
                <!-- The Image Modal -->
                <div id="myModal" class="modal">
                    <span class="close">×</span>
                    <img class="modal-content" id="img01">
                    <div id="caption"></div>
                </div>
            </div>            
        </div>
        
    </div>
</div>
@endsection

@section('footer')
    
    
    <script  src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDl4z35oKtxgRRzT9S-Bc4hk8YZ6gBna-U&sensor=false&extension=.js&output=embed"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="/js/map.js"></script>
    @if(Auth::user()->id == $user->id)
        <script src="/js/time.js"></script>
    @endif
    <script src="/js/modal.js"></script>
    <script src="/js/likePost.js"></script>
    <script src="/js/follow.js"></script>
    @if(!is_null($posts) && !empty($posts) && isset($posts))
        
        <script src="/js/scroll.js"></script>
    @endif

    <script>
        $(document).ready(function(){
            $("#main-input").on('change',function(){
                $('#spanImage').text('Uploaded');
                $('#spanImage').css('color','#ff5445');
            });
        });
    </script>
    
@endsection