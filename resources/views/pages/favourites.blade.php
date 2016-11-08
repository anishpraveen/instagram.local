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
                <div class="panel-heading">General Settings</div>
                <div class="panel-heading">Favorites</div>
                <div class="panel-heading">Logout</div>

               
            </div>
        </div>
         <!--    Posts    -->
         <div class="col-md-9 ">            
            <div class="row">
                
                 <!-- Favorite Posts -->
               @include('pages._posts')
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