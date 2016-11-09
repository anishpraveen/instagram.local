@extends('layouts.app')

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
                                    <div class="row" style="width:200px;">
                                        <div class="col-md-4 col-xs-4" >
                                            <img src="{{ $user['profilePic'] }}" class="img-circle" alt="" height="50" width="50">                            
                                        </div>                                        
                                        <div class="col-md-5 col-xs-5" style="padding-left:5px; word-wrap: break-word;">
                                            {{ $user['name'] }}
                                            <br>
                                            {{ $user['location'] }}
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
                            document.getElementById('divPosts').innerHTML = response;                       
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
                            document.getElementById('divPosts').innerHTML = response;
                        }
                    })
                }
            })
        }
    </script>

    @if(!is_null($posts) && !empty($posts) && isset($posts))
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <script src="/js/scroll.js"></script>
    @endif
@endsection