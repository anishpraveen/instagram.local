<!DOCTYPE html>
<html lang="en">

<head>
    <title></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  
    
    <!-- Latest compiled and minified CSS & JS -->
    <link rel="stylesheet" media="screen" href="//netdna.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <script src="//code.jquery.com/jquery.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/js/materialize.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.4.0/croppie.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.4.0/croppie.js"></script>
</head>

<body>
    
<div class="container">
  <h2>Activate Modal with JavaScript</h2>
  <!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-info btn-lg" id="myBtn">Open Modal</button>

  <!-- Modal -->
  <div class="modal" id="myPostModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>
        <div class="modal-body">
            <div id="cropArea"></div>
            
        </div>
        <div class="modal-footer">
            <div class="actions col-md-6 col-md-offset-3">
                <button class="vanilla-rotate btn btn-info col-md-5" data-deg="-90">Rotate Left</button>
                <div class="col-md-2"></div>
                <button class="vanilla-rotate btn btn-info col-md-5" data-deg="90">Rotate Right</button><br><br>
                <button ng-href="#result" class="vanilla-result btn btn-primary col-md-12">Save</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
      </div>
      
    </div>
  </div>
  
</div>
<img src="" id="result" style="display:true;" height="216" alt="">
<div id="divOut">
    
</div>
<script src="https://code.jquery.com/jquery-2.1.4.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/js/materialize.min.js"></script>
  <script src="http://lazer.am/logobar/js/croppie.js"></script>
  
  <div id="croppie" class="modal">
	<div class="modal-content">
  	<div id="croppieHolder"></div>
    <div id="crtest">test</div>
    <button ng-href="#result" class="basic-result btn btn-primary col-md-6">Save</button>
  </div>
</div>
  <button id="open">open</button>
  <script>
     function demoVanilla() {
		var vEl = document.getElementById('croppieHolder'),
			vanilla = new Croppie(vEl, {
			viewport: { width: 100, height: 100 },
			boundary: { width: 300, height: 300 },
			showZoomer: false,
            enableOrientation: true
		});
        
		vanilla.bind({
            url: 'uploads/posts/582ac4516e8a7.png',
            orientation: 4,
            zoom: 0
        });
        vanilla.result({
				type: 'base64'
			}).then(function (base64) {
                console.log('out');
				console.log(base64);
                var image = document.getElementById("result");
                // /image.src = blob;
                $('#divOut').html(base64);
			});
        vEl.addEventListener('update', function (ev) {
        	console.log('vanilla update', ev);
        });
        
		document.querySelector('.basic-result').addEventListener('click', function (ev) {
			vanilla.result({
				type: 'base64'
			}).then(function (blob) {
                console.log('out');
				console.log(blob);
                var image = document.getElementById("result");
                // /image.src = blob;
                $('#divOut').html(blob);
			});
		});

		$('.vanilla-rotate').on('click', function(ev) {
			vanilla.rotate(parseInt($(this).data('deg')));
		});
	}
    $(document).ready(function(){
        $('#open').on('click', function(){
            $('#croppie').openModal();
            demoVanilla();
            console.log('demo');
        });
    });
    
  </script>
<!--<script>
    $(document).ready(function(){
        $("#myBtn").click(function(){
            $("#myPostModal").modal();
            
            cropImage();
        });
        
    });
    function cropImage() {
        var imageLocation = 'uploads/posts/582ac4516e8a7.png';
        var vEl = document.getElementById('cropArea');
        console.log('new inst');
            vanilla = new Croppie(vEl, {
            viewport: { width: 400, height: 216 },
            boundary: { width: 600, height: 400 },
            showZoomer: true,
            enableOrientation: true,
            mouseWheelZoom: true
        });
        vanilla.bind({
            url: 'uploads/posts/582ac4516e8a7.png'
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
                
            });
        });

        $('.vanilla-rotate').on('click', function(ev) {
            vanilla.rotate(parseInt($(this).data('deg')));
        });
        $('#myPostModal').on('hidden.bs.modal', function (e) {
            console.log('close');
            vanilla.destroy();
        });
    }
        
</script>-->


</body>

</html>