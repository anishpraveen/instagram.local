

$(document).ready(function () {

  $('.modal').on('shown.bs.modal', function () {
    //Make sure the modal and backdrop are siblings (changes the DOM)
    $(this).before($('.modal-backdrop'));
    //Make sure the z-index is higher than the backdrop
    $(this).css("z-index", parseInt($('.modal-backdrop').css('z-index')) + 1);
  });

  var map;
  

  function initialize() {
    
    var myCenter = new google.maps.LatLng(9.996492, 76.301079);
    var marker = new google.maps.Marker({
      position: myCenter,
      icon: "/icons/mapPin.svg",
      //animation: google.maps.Animation.BOUNCE
    });
  
    var mapProp = {
      center: myCenter,
      zoom: 14,
      draggable: false,
      scrollwheel: false,
      mapTypeId: google.maps.MapTypeId.ROADMAP,
      disableDefaultUI: true
    };

    map = new google.maps.Map(document.getElementById("map-canvas"), mapProp);
    marker.setMap(map);

    google.maps.event.addListener(marker, 'click', function () {

      infowindow.setContent(contentString);
      infowindow.open(map, marker);

    });
  };
  google.maps.event.addDomListener(window, 'load', initialize());
  google.maps.event.addDomListener(window, "resize", resizingMap());

  
  $('#myMapModal').on('show.bs.modal', function () {
    //Must wait until the render of the modal appear, thats why we use the resizeMap and NOT resizingMap!! ;-)
    resizeMap();
  })

  function resizeMap() {
    if (typeof map == "undefined") return;
    setTimeout(function () { resizingMap(); }, 400);
  }

  function resizingMap() {alert(this.id);
    if (typeof map == "undefined") return;
    var center = map.getCenter();
    google.maps.event.trigger(map, "resize");
    map.setCenter(center);
  }

});

