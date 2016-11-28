@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.4.0/croppie.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.4.0/croppie.js"></script>
    <img id="result" src="/{{$post->imageName }}" height="150" class="hidden" >   
    <div id="cropArea"></div>
    <div class="actions col-md-6 col-md-offset-3">
        <button class="vanilla-rotate btn btn-info col-md-5" data-deg="-90">Rotate Left</button>
        <div class="col-md-2"></div>
        <button class="vanilla-rotate btn btn-info col-md-5" data-deg="90">Rotate Right</button><br><br>
        <button ng-href="#result" class="vanilla-result btn btn-primary col-md-12">Save</button>
        
    </div>
@endsection

@section('footer')
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
                    image.src = blob;
                    //console.log(blob);
                    //$( "#result" ).removeClass( "hidden" );
                    $.ajax({
                            type: "POST",
                            url: '/posts/savePost',
                            data: {base64:blob, location: imageLocation, id:postId },
                            beforeSend: function (request) {
                                return request.setRequestHeader('X-CSRF-Token', $("meta[name='csrf-token']").attr('content'));
                            },
                            success: function(id) {
                                console.log(id);
                                location.href = "/profile";
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
@endsection