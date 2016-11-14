


$(document).ready(function () {
    $('body').on('click', '.btnShow', function () {
        var info = document.getElementById('lInfo');

        //alert($( this ).attr('latitude'));
        //alert($( this ).attr('longitude'));
       var mapMarker = new google.maps.LatLng($( this ).attr('latitude'), $( this ).attr('longitude'));
        $("#dialog").dialog({
          
            modal: true,
            
            width: 600,
            height:  380,
            
            open: function () {
                
                var mapOptions = {
                    center: mapMarker,
                    zoom: 17,
                    mapTypeId: google.maps.MapTypeId.ROADMAP,
                    disableDefaultUI: true
                }
                var map = new google.maps.Map($("#dvMap")[0], mapOptions);
                 var marker = new google.maps.Marker({
                        position: mapMarker,
                        icon: "/icons/mapPin.svg",
                        //animation: google.maps.Animation.BOUNCE
                    });
                    marker.setMap(map);
            }
        });
    });
});