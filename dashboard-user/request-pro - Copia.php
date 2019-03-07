<?php
$page = "Solicitar Profissional";
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="css/request-pro.css">
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 90%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
    </style>
        
        <script>
        var map;
 
        function initialize() {
            var latlng = new google.maps.LatLng(-18.8800397, -47.05878999999999);

            var options = {
                zoom: 5,
                center: latlng,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };

            map = new google.maps.Map(document.getElementById("mapa"), options);
        }

        initialize();
        
        
        </script>
    </head>
    
    <body>
        <?php include 'default/menu.php';?>


            
      <h3>My Google Maps Demo</h3>
        
        <div id="map"></div>
        
       <script src="http://maps.google.com/maps/api/js"></script>
        <script>
        
        var lat = '';
var lng = '';
var address = {cep} or {endereço};
geocoder.geocode( { 'address': address}, function(results, status) {
  if (status == google.maps.GeocoderStatus.OK) {
     lat = results[0].geometry.location.lat();
     lng = results[0].geometry.location.lng();
  } else {
     alert("Não foi possivel obter localização: " + status);
  }
});
alert('Latitude: ' + lat + ' Logitude: ' + lng);
        </script>
<!--        <script src="js/mapa.js"></script>-->
    

            
            
            
            

    </body>
</html>