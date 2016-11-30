<!DOCTYPE html>
<html lang="en">

<head>
    <title></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Latest compiled and minified CSS & JS -->
    <link rel="stylesheet" media="screen" href="//netdna.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropper/2.3.4/cropper.min.css">
    
    <style>
            /* Limit image width to avoid overflow the container */
        img {
        max-width: 100%; /* This rule is very important, please do not ignore this! */
        }
    </style>
</head>

<body>
    
    
    
    <a class="btn btn-primary" data-toggle="modal" href='#modal-id'>Trigger modal</a>
    <div class="col-md-5" >
        <div id="croppedResult">
            
        </div>
        
    </div>
    <div class="modal fade" id="modal-id">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Modal title</h4>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <!-- Wrap the image or canvas element with a block element (container) -->
                            <div style="height:300px; " class="col-md-5">
                                <img id="image" src="uploads/583bd6a6ad2ff.png">
                            </div>
                            
                        </div>
                        <br><br>
                        
                        <span class="input-group-btn">
                            <button id="result" type="button" class="btn btn-default">Go!</button>
                        </span>
                        
                        <a id="btnCroped">Crop</a>
                        <div class="row avatar-btns">
                            <div class="col-md-9">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-primary rotate" data-method="rotate" data-option="-90" title="Rotate -90 degrees">Rotate Left</button>
                                    <button type="button" class="btn btn-primary rotate" data-method="rotate" data-option="-15">-15deg</button>
                                    <button type="button" class="btn btn-primary rotate" data-method="rotate" data-option="-30">-30deg</button>
                                    <button type="button" class="btn btn-primary rotate" data-method="rotate" data-option="-45">-45deg</button>
                                </div>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-primary rotate" data-method="rotate" data-option="90" title="Rotate 90 degrees">Rotate Right</button>
                                    <button type="button" class="btn btn-primary rotate" data-method="rotate" data-option="15">15deg</button>
                                    <button type="button" class="btn btn-primary rotate" data-method="rotate" data-option="30">30deg</button>
                                    <button type="button" class="btn btn-primary rotate" data-method="rotate" data-option="45">45deg</button>
                                </div>
                            </div>
                            <div class="col-md-3">
                            <button type="submit" class="btn btn-primary btn-block avatar-save">Done</button>
                            </div>
                        </div>
                    </div>
                </div>                
            </div>
        </div>
    </div>
    

    <script src="//code.jquery.com/jquery.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>

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
            $('body').on('click', '#result', function () {
                console.log('output');
                var croppedCanvas;
                var $image = $('#image');
                //console.log($image);
                var canvasSize = { width: 200, height: 200 };
                var imageData = $image.cropper("getCroppedCanvas", canvasSize).toDataURL();
                croppedCanvas = $image.cropper('getCroppedCanvas');
                var $avatarPreview = $('.preview-new ');
                $('#croppedResult').html('<img src="' + croppedCanvas.toDataURL() + '">');
            });
            $('body').on('click', '.rotate', function (event) {
                var option = $(event.target).data('option');
                $('#image').cropper('rotate', option);
            });
        });
        $('#btnCroped').click(function () {


            var croppedCanvas;
            var $image = $('#image');
            //console.log($image);
            var canvasSize = { width: 200, height: 200 };
            var imageData = $image.cropper("getCroppedCanvas", canvasSize).toDataURL();
            croppedCanvas = $image.cropper('getCroppedCanvas');
            var $avatarPreview = $('.preview-new ');
            $('#croppedResult').html('<img src="' + croppedCanvas.toDataURL() + '">');
        });
        
    </script>
</body>

</html>