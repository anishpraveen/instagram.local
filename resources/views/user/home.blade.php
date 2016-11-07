@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">        
         <!--    Posts    -->
         <div class="col-md-9 ">            
            <div class="row">                 
                <!-- Previous Posts -->
                @if(!is_null($posts))
                @foreach($posts as $post) 
                    <div class="col-md-6 ">
                        <div class="panel panel-group">
                            <div class="panel-heading">        
                                <div class="hidden">
                                    {{ $user=App\User::where('id', '=', $post['userId'])->select('name','profilePic')->get() }}
                                    {{$dd=Carbon\Carbon::parse($post['publishedOn'])}} 
                                </div>    
                                <div class="row ">
                                    <div class="col-md-8">
                                        <img src="{{ $user[0]['profilePic'] }}" alt=""  class="img-circle" height="45" width="45">                                
                                        {{ $user[0]['name'] }} 
                                    </div>
                                    <div class="text-right" style="">
                                        {{  $dd->format('d, M Y') }}
                                        <img src="/icons/clock5.svg" alt="">
                                        <br>
                                        Kakkanad
                                        <a href="#" style="padding-right:5px;">
                                            <img src="/icons/pin5.svg" alt="">
                                        </a>
                                    </div>
                                </div>   
                            </div>

                            <div class="panel-body postImage">                                
                                <img  src="{{ $post['imageName'] }}"  id="{{ $post['id'] }}" onclick="modalPopup(this.id);"   alt="" 
                                class=" img-responsive myImg "  >
                                 
                            </div>
                            <div class="panel-footer" style="background-color: white; word-wrap: break-word;">   
                                {{ $post['description'] }}
                                <div style="float:right;">
                                    <a href="#" >
                                        <img src="/icons/liked.svg" alt="">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                   
                @endforeach
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
                                            <div class="col-md-3  col-xs-3 "  style="float:right;">
                                                <a href="#">                                                
                                                    <img src="{{ $user['follow']? '/icons/followers.svg': '/icons/follow.svg' }}" style="float:right;" alt="">
                                                </a>
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
<script>
    // Get the modal
    var modal = document.getElementById('myModal');

    // Get the image and insert it inside the modal - use its "alt" text as a caption

    var modalImg = document.getElementById("img01");
    var captionText = document.getElementById("caption");
    function modalPopup(id) {

        var img = document.getElementById(id);
        modal.style.display = "block";
        modalImg.src = img.src;
        captionText.innerHTML = img.alt;

    }

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks on <span> (x), close the modal
    span.onclick = function () {
        modal.style.display = "none";
    }
</script>
@endsection