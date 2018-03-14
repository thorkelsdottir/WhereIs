
var map ="";

function initMap() {

        // latLng = new google.maps.LatLng(data[0], data[1]);
        map = new google.maps.Map(document.getElementById('googlemaps'), {
          zoom: 14,
          streetViewControl: true,
          draggable: true,
          navigationControl: false,
          zoomControl: true,
          scaleControl: false,
          scrollwheel: false,
          disableDoubleClickZoom: true,
          mapTypeId: google.maps.MapTypeId.ROADMAP,
          center: new google.maps.LatLng(64.143240, -21.939343)
        });

}
