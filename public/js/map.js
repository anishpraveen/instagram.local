


$(document).ready(function () {
    $('body').on('click', '.btnShow', function () {
        var info = document.getElementById('lInfo');
       var mapMarker = new google.maps.LatLng($( this ).attr('latitude'), $( this ).attr('longitude'));
        $("#dialog").dialog({
            modal: true,
            width: 600,
            height:  375,
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
            },
            closeText: 'X',
            classes: {
                "ui-dialog": "mapDialog"
            }
        });
         
         
    });

    $('body').on('click', '.btnShowProfile', function () {
        var info = document.getElementById('lInfo');
        var mapMarker = new google.maps.LatLng($( this ).attr('latitude'), $( this ).attr('longitude'));
        $("#dialog").dialog({          
            modal: true,            
            width: 600,
            height:  380,            
            open: function () {
                
                var mapOptions = {
                    center: mapMarker,
                    zoom: 12,
                    mapTypeId: google.maps.MapTypeId.ROADMAP,
                    disableDefaultUI: true
                }
                var map = new google.maps.Map($("#dvMap")[0], mapOptions);
                var marker = new google.maps.Marker({
                        position: mapMarker,
                        icon: "/icons/mapPin.svg",
                        draggable:true,
                        //animation: google.maps.Animation.BOUNCE
                    });
                marker.setMap(map);
                var infoWindow = new google.maps.InfoWindow();
                    infoWindow.setContent('Drag marker and click on in it after placing it in your place');
                    infoWindow.open(map, marker);
                var geocoder = geocoder = new google.maps.Geocoder();
                google.maps.event.addListener(marker, "click", function (e) {
                    
                    lat = marker.getPosition().lat();
                    lng = marker.getPosition().lng();
                    //alert('lat' + lat);
                    //alert('lng' + lng);
                    var locationURL = 'http://maps.googleapis.com/maps/api/geocode/json?latlng='+lat+','+lng;
                    //alert(json);
                    //console.log(json);
                    $.ajax({
                        data: {url:locationURL, latitude:lat, longitude:lng },
                        url: '/user/location',
                        type: 'POST',
                        beforeSend: function (request) {
                            return request.setRequestHeader('X-CSRF-Token', $("meta[name='csrf-token']").attr('content'));
                        },
                        success: function(response){
                            infoWindow.setContent('Location updated');
                            infoWindow.open(map, marker);
                            console.log(response);
                        }
                    })
                    console.log('updated');
                });
            }
        });
       
    });



});

