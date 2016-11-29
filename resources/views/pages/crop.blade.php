@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.4.0/croppie.css" />
    <div id="cropArea"></div>   
    <div class="actions col-md-2 col-md-offset-3">
        <!--Rotate Left-->
        <div class="col-md-4">
            <a class="vanilla-rotate btn" data-deg="-90" title="Rotate left">
                <img src="/icons/turn.svg" height="25" alt="">
            </a>        
        </div><!--!Rotate Left-->
        <!--Rotate Right-->
        <div class="col-md-4">
            <a class="vanilla-rotate btn" data-deg="90" title="Rotate right">
                <img src="/icons/turn.svg" height="25" alt="" style="transform:scale(-1,1);">
            </a>
        </div>
        <!--Edit Text-->
        <div class="col-md-1">
            <a id="aEditText" class="btn"  title="Edit description">
                <img src="/icons/edit-text.svg" height="25" alt="" >
            </a>
        </div>
        <br><br>
        <!--Save Changes-->
        <div class="col-md-4">
            <a ng-href="#result" class="vanilla-result btn " title="Save changes">
                <img src="/icons/save-file-button.svg" height="25" alt="">
            </a>
        </div>
        <!--Cancel editing-->
        <div class="col-md-4">   
            <a class="btn" href="{{URL::previous()}}" title="Cancel edits">
                <img src="/icons/clear-button.svg" height="25" alt="">
            </a>
        </div>
        <!--<div class="col-md-3"></div>
        <div class="panel col-md-5" style="background-color:#cbb956;">
            <div class="panel-body ">
                Edits once made cannot be undone.
            </div>        
        </div>-->
    </div>
    <div class="col-md-3">
        <input type="text" id="inputDescription" name="description" class="form-control" disabled value="{{$post->description }}"> 
    </div>
@endsection

@section('footer')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.4.0/croppie.js"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        function cropImage() {
            var imageLocation = '{{$post->imageName }}';
            
            var postId = '{{$post->id }}';
            var vEl = document.getElementById('cropArea'),
                vanilla = new Croppie(vEl, {
                viewport: { width: 400, height: 216 },
                boundary: { width: 800, height: 400 },
                showZoomer: true,
                enableOrientation: true
            });
            vanilla.bind({
                url: '/{{$post->imageName }}'
            });
            vEl.addEventListener('update', function (ev) {
                //console.log('vanilla update', ev);
            });
            document.querySelector('.vanilla-result').addEventListener('click', function (ev) {
                vanilla.result({
                    type: 'base64'
                }).then(function (blob) {
                    var image = document.getElementById("result");
                    var description = $('#inputDescription').val();
                    image.src = blob;
                    //console.log(blob);
                    //$( "#result" ).removeClass( "hidden" );
                    $.ajax({
                            type: "POST",
                            url: '/posts/savePost',
                            data: {base64:blob, location: imageLocation, id:postId, text:description },
                            beforeSend: function (request) {
                                return request.setRequestHeader('X-CSRF-Token', $("meta[name='csrf-token']").attr('content'));
                            },
                            success: function(id) {
                                console.log(id);
                                location.href = "{{URL::previous()}}";
                            }
                        });
                });
            });

            $('.vanilla-rotate').on('click', function(ev) {
                vanilla.rotate(parseInt($(this).data('deg')));
            });
        }
        cropImage();
    </script>
    <script>
        $(document).ready(function () {
            $('body').on('click', '#aEditText', function () {
                $('#inputDescription').removeAttr('disabled');
            });

        });
    </script>
@endsection