@extends('layouts.app')

@section('title')
    Favorites
@endsection

@section('content')

<div class="container">
    <div class="row">
        <!-- Side bar -->
        <div class="col-md-3 text-center">
            <div class="panel panel-group" style="border:0;">
                <div class="panel-heading text-left sideBar">
                    <a href="/settings">
                        <img src="/icons/settings.svg" style="padding-right:10px;" alt="">
                        <span>General Settings</span>
                    </a>
                </div>
                <div class="panel-heading selectedSideBar sideBar text-left">
                    <img src="/icons/fav.svg" style="padding-right:10px;" alt=""> Favorites
                </div>
                <div class="panel-heading sideBar text-left">
                    <a href="{{ url('/logout') }}"
                        onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();" >
                    <img src="/icons/logout.svg" alt=" Logout "> Logout
                    </a>                    
                </div>
            </div>
        </div>
         <!--    Posts    -->
         <div class="col-md-9 ">            
            <div class="row">
                
                <div class="scroll">
                    @if(!is_null($posts) && !empty($posts) && isset($posts))
                        
                            @include('pages._posts') 
                                   
                        {{$posts->setPath('favourites')->links()}}
                    @else
                     <div class="col-md-6 ">
                            <div class="panel panel-group">
                                <div class="panel-heading postsUserName">                                         
                                    Like some posts
                                </div>

                                <div class="panel-body postImage">                                
                                    
                                </div>
                                <div class="panel-footer" style="background-color: white; word-wrap: break-word;">   
                                   
                                </div>
                            </div>
                        </div>
                @endif
                </div>
                <!-- The Modal -->
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

    <script src="/js/modal.js"></script>
    <script src="/js/likePost.js">
    @if(!is_null($posts) && !empty($posts) && isset($posts))
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <script src="/js/scroll.js"></script>
    @endif
@endsection