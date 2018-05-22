
<div id="map" style="width:100%;height:500px"></div>

<script>
function myMap() {
  var myCenter = new google.maps.LatLng(18.681852,105.693761);
  var mapCanvas = document.getElementById("map");
  var mapOptions = {center: myCenter, zoom: 15.5};
  var map = new google.maps.Map(mapCanvas, mapOptions);
  var marker = new google.maps.Marker({position:myCenter});
  marker.setMap(map);
}
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDHDImn4Et0jDuZusS-7VfXDjTPgcNDhWs&callback=myMap"></script>
