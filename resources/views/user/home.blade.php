@extends('layouts.app')
@section('title')
    Home
@endsection
@section('content')
<div class="container">
    <div class="row">        
         <!--    Posts    -->
         <div class="col-md-9 ">            
            <div class="row" id="divPosts">                 
                <!-- Previous Posts -->
               
                @if(!is_null($posts))
                    <div class="scroll">
                        @include('pages._posts')
                        {{$posts->setPath('home')->links()}}
                    </div>
                @else
                     <div class="col-md-6 ">
                            <div class="panel panel-group">
                                <div class="panel-heading postsUserName">                                         
                                    Follow some one 
                                </div>

                                <div class="panel-body postImage">                                
                                    
                                </div>
                                <div class="panel-footer" style="background-color: white; word-wrap: break-word;">   
                                   
                                </div>
                            </div>
                        </div>
                @endif
                
                <!-- The Modal -->
                <div id="myModal" class="modal">
                    <span class="close">×</span>
                    <img class="modal-content" id="img01">
                    <div id="caption"></div>
                </div>

                
            </div>            
        </div>

         <!-- Recommended List -->
        <div class="col-md-3 ">
            <div class="panel panel-group">
                <div class="panel-heading" id="recommendedPeopleHeading" style="color:#f02d88; text-align:left;">Recommended Peoples</div>

                <div class="panel-body">
                    @if(empty($userList)||!is_null($userList)) 
                        @foreach($userList as $user) 
                            <div class="left" style="float:left; padding-bottom:20px;">
                                <div class="container-fluid">
                                    <div class="row" style="width:250px;">
                                        <div class="col-md-3 col-xs-4" style="padding-right:5px;">
                                            <a href="/profile/{{ $user['id'] }}">
                                                <img src="{{ $user['profilePic'] }}" class="img-circle" alt="" height="50" width="50">      
                                            </a>                      
                                        </div>                                        
                                        <div class="col-md-6 col-xs-5" style="padding-left:15px; word-wrap: break-word;">
                                            <a href="/profile/{{ $user['id'] }}" style="text-decoration:none; line-height: 20px; font-family: Tahoma;font-size: 14px; color:#5e5e5e;">
                                                {{ $user['name'] }}
                                            </a>
                                            <br>
                                            <a style="font-family: Tahoma;font-size: 12px;color: #999999; line-height: 20px; text-decoration:none;">
                                                {{ $user['location'] }}
                                            </a>
                                        </div>
                                        <div class="col-md-1">                                                    
                                        </div>
                                        <div class="col-md-3  col-xs-3 " id="{{ $user['id'] }}"  style="float:right;">                                                       
                                            @if($user['follow'])  
                                                <a onclick="unfollow({{ $user['id'] }});" >                                       
                                                    <img src="/icons/followers.svg" style="float:right;" alt="following">
                                                </a>
                                            @else
                                                <a  onclick="follow({{ $user['id'] }});" >  
                                                    <img src="/icons/follow.svg" style="float:right;" alt="follow">
                                                </a>
                                            @endif                                                
                                        </div>
                                    </div>
                                </div>
                            </div>       
                            <br>
                            <div class="clearfix">
                            </div>                 
                        @endforeach  
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('footer')
    <!-- The Map Modal -->
        <script  src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDl4z35oKtxgRRzT9S-Bc4hk8YZ6gBna-U&sensor=false&extension=.js&output=embed"></script>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script src="/js/map.js"></script>
    <!-- /.modal -->
    <script src="/js/modal.js"></script>

    <script>
        function follow($id){        
            $.ajax({
                type: "GET",
                url: '/follow/'+$id,
                data: "",
                success: function(response) {
                    $html = '<a onclick="unfollow('+$id+')" ><img src="/icons/followers.svg" style="float:right;" alt=""></a>'   
                    document.getElementById($id).innerHTML = $html;                
                    $.ajax({
                        type: "GET",
                        url: '/posts',
                        data: "",
                        success: function(response) {                
                            //document.getElementById('divPosts').innerHTML = response;        
                            window.location.replace("");               
                        }
                    })
                }
            })
        }

        function unfollow($id){
            $.ajax({
                type: "GET",
                url: '/follow/'+$id+'/unfollow',
                data: "",
                success: function(response) {
                    
                    $html = '<a  onclick="follow('+$id+');" ><img src="/icons/follow.svg" style="float:right;" alt=""></a>'   
                    document.getElementById($id).innerHTML = $html;
                    $.ajax({
                        type: "GET",
                        url: '/posts',
                        data: "",
                        success: function(response) {
                            //document.getElementById('divPosts').innerHTML = response;
                            window.location.replace("");        
                        }
                    })
                }
            })
        }
    </script>

    <script src="/js/likePost.js"></script>

    @if(!is_null($posts) && !empty($posts) && isset($posts))       
        <script src="/js/scroll.js"></script>
    @endif
@endsection