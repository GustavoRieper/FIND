<?php
$page = "Solicitar Profissional";
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="css/request-pro.css">
        
        <style>
       /* Set the size of the div element that contains the map */
      #map {
        height: 400px;  /* The height is 400 pixels */
        width: 100%;  /* The width is the width of the web page */
       }
    </style>
    </head>
    
    <body>
        <?php include 'default/menu.php';?>
        <div class="content" onclick="closeUser()">
    <h3>My Google Maps Demo</h3>
    <!--The div element for the map -->
    <div id="map"></div>
    <script>
// Initialize and add the map
function initMap() {
  // The location of Uluru
  var uluru = {lat: -26.334058, lng: -48.835740};
  // The map, centered at Uluru
  var map = new google.maps.Map(
      document.getElementById('map'), {zoom: 4, center: uluru});
  // The marker, positioned at Uluru
  var marker = new google.maps.Marker({position: uluru, map: map});
}
    </script>

    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBTsT3BQAGJ1DbmUnrRHZIrV9DfJBiikJk&callback=initMap">
    </script>
        
        </div>
    </body>
</html>