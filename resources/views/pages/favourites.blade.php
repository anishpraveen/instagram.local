@extends('layouts.app')

@section('title')
    Favorites
@endsection

@section('content')

<div class="container">
    <div class="row">
        <!-- User Details -->
        <div class="col-md-3 text-center">
            <div class="panel panel-group">
                <div class="panel-heading">General Settings</div>
                <div class="panel-heading">Favorites</div>
                <div class="panel-heading">Logout</div>
            </div>
        </div>
         <!--    Posts    -->
         <div class="col-md-9 ">            
            <div class="row">
                
                <div class="scroll">
                    @if(!is_null($posts) && !empty($posts) && isset($posts))
                        @foreach($posts as $post)
                            @include('pages._posts') 
                        @endforeach                    
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

<script src="/js/modal.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
@if(!is_null($posts) && !empty($posts) && isset($posts))
<script src="/js/scroll.js"></script>
@endif
@endsection