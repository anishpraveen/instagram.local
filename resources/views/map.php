 <!DOCTYPE html>
 <html lang="en">
   <head>
     <title></title>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <link href="css/style.css" rel="stylesheet">
   </head>
   <body>
  
 
 
 <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
 
<script src="http://code.jquery.com/ui/1.11.1/jquery-ui.min.js"></script>

<button class="opener ">open the dialog</button>
<div id="dialog1" title="Dialog Title" style="border-style:dotted;">I'm a dialog</div>
 
<script>
    $(function () {
  $( "#dialog1" ).dialog({
    autoOpen: false
  });
  
  $("#opener").click(function() {
    $("#dialog1").dialog('open');
  });
});
</script>
 
 
 
 <script  src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDl4z35oKtxgRRzT9S-Bc4hk8YZ6gBna-U&sensor=false&extension=.js&output=embed"></script>
    
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">

<script type="text/javascript">
$(function () {
    $(".btnShow").click(function () {
        alert(this.id);
        $("#dialog").dialog({
          
            modal: true,
            title: "Google Map",
            width: 600,
            height: 550,
            buttons: {
                Close: function () {
                    $(this).dialog('close');
                }
            },
            open: function () {
                var mapOptions = {
                    center: new google.maps.LatLng(19.0606917, 72.83624970000005),
                    zoom: 18,
                    mapTypeId: google.maps.MapTypeId.ROADMAP,
                    disableDefaultUI: true
                }
                var map = new google.maps.Map($("#dvMap")[0], mapOptions);
            }
        });
    });
});
</script>



<button class="opener ">open the dialog</button>
<div id="dialog1" title="Dialog Title" style="border-style:dotted;">I'm a dialog</div>
 
<script>
$( "#dialog1" ).dialog({ autoOpen: false });
$( ".opener" ).click(function() {
  $( "#dialog1" ).dialog( "open" );
});
</script>




<input class = "btnShow" id="1" type="button" value="Show Maps"/>
<input class = "btnShow" id="2" type="button" value="Show Maps"/>
<a class=" btnShow" id="3"><img src="/icons/pin5.svg" alt=""></a>
<a class="btnShow" id="4" style="cursor: pointer; padding-right:5px;"><img src="/icons/pin5.svg" alt=""></a>
<div id="dialog" style="display: none">
<div id="dvMap" style="height: 380px; width: 580px;">
</div>
</div>



  
   </body>
 </html>