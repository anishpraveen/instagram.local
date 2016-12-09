@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropper/2.3.4/cropper.min.css">
    
    <style>
            /* Limit image width to avoid overflow the container */
        img {
        max-width: 100%; /* This rule is very important, please do not ignore this! */
        }
    </style>
    <div class="col-md-8 col-md-offset-2" style="">
        <img id="image" src="/{{$post->imageName }}">
    </div>   
    <br><br><br><br>
    
    <div class="clearfix"></div><br>
    <div class="col-md-8 col-md-offset-2">
        <div class="col-md-6">
            <!--Action Buttons-->
            <div class="actions ">
                <div class="">
                    <div class="btn-group" title="Rotate left">
                        <button type="button" class="btn btn-danger rotate" data-method="rotate" data-option="-90" title="Rotate -90 degrees">
                            <img src="/icons/ic_rotate_left_black_24px.svg" alt="" height="20" data-method="rotate" data-option="-90">
                            <!--Rotate Left-->
                        </button>
                        <button type="button" class="btn btn-warning rotate" data-method="rotate" data-option="-15">-15deg</button>
                        <button type="button" class="btn btn-warning rotate" data-method="rotate" data-option="-30">-30deg</button>
                        <button type="button" class="btn btn-warning rotate" data-method="rotate" data-option="-45">-45deg</button>
                    </div><div class="clearfix"></div><br>
                    <div class="btn-group" title="Rotate right">
                        <button type="button" class="btn btn-danger rotate" data-method="rotate" data-option="90" title="Rotate 90 degrees">
                            <img src="/icons/ic_rotate_right_black_24px.svg" alt="" height="20" data-method="rotate" data-option="90">
                            <!--Rotate Right-->
                        </button>
                        <button type="button" class="btn btn-warning rotate" data-method="rotate" data-option="15">+15deg</button>
                        <button type="button" class="btn btn-warning rotate" data-method="rotate" data-option="30">+30deg</button>
                        <button type="button" class="btn btn-warning rotate" data-method="rotate" data-option="45">+45deg</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <!--Edit Description-->            
            <div class="">
                <label for="description" class="col-md-1 control-label" style="padding:0;padding-top:6px;">
                    <a id="aEditText"  title="Edit description">
                        <img src="/icons/ic_text_fields_black_24px.svg" height="25" alt="" >
                    </a>
                </label>
                <div class="col-md-8">
                    <input type="text" id="inputDescription" name="description" class="form-control" value="{{$post->description }}" maxlength="80"> 
                </div>
                
            </div>
            <div style="padding-top:40px;">
                
                <button type="button" class="btn transparent" id="mirrorImage">
                    <img src="/icons/ic_flip_black_24px.svg" alt="Vertical" title="Flip Vertical "  data-scaleX="1">
                </button>
                <button type="button" class="btn transparent" id="flipImage">
                    <img src="/icons/ic_flip_black_24px.svg" alt="Horizontal" title="Flip Horizontal" style="transform:rotate(90deg);" data-scaleY="1">
                </button>
                
                <button type="button" class="btn  transparent" id="resetCrop" title="Undo all changes">
                    <img src="/icons/ic_cached_black_24px.svg" alt="">    
                    Reset Image
                </button>
            </div>
        </div>        
    </div>
    
    <div class="clearfix"></div><br>
    <!--Cancel editing-->
    <div class="col-md-2 col-md-offset-4">        
        <button type="button" id="btnCancel" class="btn btn-large btn-block transparent">
           
                <img src="/icons/ic_cancel_black_24px.svg" height="25" alt="">
            
            Cancel
        </button>
    </div>
     <!--Save Changes-->
    <div id="" class="col-md-2 ">
        
        <button type="button" class="btn col-md-12 transparent" id="aSaveChanges" title="Save changes">
            <img src="/icons/ic_done_black_24px.svg" alt="">
            Save
        </button>
    </div>
@endsection

@section('footer')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.4.0/croppie.js"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropper/2.3.4/cropper.min.js"></script>
    
    <script>
        $('#image').cropper({
            aspectRatio: 16 / 9,
            modal: true,
            crop: function(e) {
                // Output the result data for cropping image.
                // console.log(e.x);
                // console.log(e.y);
                // console.log(e.width);
                // console.log(e.height);
                // console.log(e.rotate);
                // console.log(e.scaleX);
                // console.log(e.scaleY);
                
            }
        });
        $(document).ready(function () {
            var mirror = false;
            var flip = false;
            $('body').on('click', '#aSaveChanges', function () {
                console.log('output');
                var croppedCanvas;
                var $image = $('#image');
                //var canvasSize = { width: 200, height: 200 };
                //var imageData = $image.cropper("getCroppedCanvas", canvasSize).toDataURL();
                croppedCanvas = $image.cropper('getCroppedCanvas');
                //var $avatarPreview = $('.preview-new ');
                //$('#croppedResult').html('<img src="' + croppedCanvas.toDataURL() + '">');
                var postId = '{{$post->id }}';
                var image = document.getElementById("result");
                var description = $('#inputDescription').val();
                var croppedImage = croppedCanvas.toDataURL();
                var imageLocation = '{{$post->imageName }}';
                $.ajax({
                        type: "POST",
                        url: '/posts/savePost',
                        data: {base64:croppedImage, location: imageLocation, id:postId, text:description },
                        beforeSend: function (request) {
                            return request.setRequestHeader('X-CSRF-Token', $("meta[name='csrf-token']").attr('content'));
                        },
                        success: function(id) {
                            console.log(id);
                            var url      = window.location.href; 
                            var lastPage =  "{{URL::previous()}}";
                            location.href = "{{URL::previous()}}";
                            if(url == lastPage){
                                location.href = '/profile';
                            }
                            else{
                                location.href = lastPage;
                            }
                        }
                    });
            });
            $('body').on('click', '.rotate', function (event) {                
                var option = $(event.target).data('option');
                $('#image').cropper('rotate', option);
            });
            $('body').on('click', '#resetCrop', function (event) {
                $('#image').cropper('reset');
                mirror = false;
                flip = false;
            });
            
            $('body').on('click', '#mirrorImage', function (event) {
                var option = $(event.target).data('scaleX');
                mirror = !mirror;   
                if(mirror == true)
                    $('#image').cropper('scaleX','-1');
                else
                    $('#image').cropper('scaleX','1');
            });
            
            $('body').on('click', '#flipImage', function (event) {
                var option = $(event.target).data('scaleY');
                flip = !flip;   
                if(flip == true)
                    $('#image').cropper('scaleY','-1');
                else
                    $('#image').cropper('scaleY','1');
            });
        });
        
        
    </script>
    <script>
        $(document).ready(function () {
            $('body').on('click', '#aEditText', function () {
                $('#inputDescription').removeAttr('disabled');
            });
            $('body').on('click', '#btnCancel', function () {
                var url      = window.location.href; 
                var lastPage =  "{{URL::previous()}}";
                location.href = "{{URL::previous()}}";
                if(url == lastPage){
                    location.href = '/profile';
                }
                else{
                    location.href = lastPage;
                }
            });

        });
    </script>
@endsection