@extends('layouts.app')

@section('title')
    Profile
@endsection

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
         <div class="col-md-9 ">            
            <div class="row">
                 <!-- Add New Post -->
                <div class="col-md-12">
                    <div class="panel panel-group" id="divAddPost" style="background-color:#ececec; ">
                        

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
                                   
                                <div class="{{ $errors->has('description') ? ' has-error' : '' }} {{ $errors->has('image') ? ' has-error' : '' }}">
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
                                        @if ($errors->has('image'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('image') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                
                              
                            </form>
                        </div>
                        
                    </div>
                </div>
                 <!-- Previous Posts -->
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