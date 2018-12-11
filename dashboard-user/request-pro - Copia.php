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
    </head>
    
    <body>
        <?php include 'default/menu.php';?>


            
      <h3>My Google Maps Demo</h3>
        
        <div id="map"></div>
        
        <script>
              var map;
              function initMap() {
                map = new google.maps.Map(document.getElementById('map'), {
                  zoom: 2,
                  center: new google.maps.LatLng(2.8,-187.3),
                  mapTypeId: 'terrain'
                });

                // Create a <script> tag and set the USGS URL as the source.
                var script = document.createElement('script');
                // This example uses a local copy of the GeoJSON stored at
                // http://earthquake.usgs.gov/earthquakes/feed/v1.0/summary/2.5_week.geojsonp
                script.src = 'https://developers.google.com/maps/documentation/javascript/examples/json/earthquake_GeoJSONP.js';
                document.getElementsByTagName('head')[0].appendChild(script);
              }

              // Loop through the results array and place a marker for each
              // set of coordinates.
              window.eqfeed_callback = function(results) {
                for (var i = 0; i < results.features.length; i++) {
                  var coords = results.features[i].geometry.coordinates;
                  var latLng = new google.maps.LatLng(coords[1],coords[0]);
                  var marker = new google.maps.Marker({
                    position: latLng,
                    map: map
                  });
                }
              }

        </script>
    
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCwB1RwjshZkpg1TRWWEdCqmzVMHXoS5jY&callback=initMap">
    </script>
<!--
        <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC6Am7wIw0Q1zw6wl55YCFGN4EEDWDwxHA&callback=initMap">
    </script>
-->
            
            
            
            

    </body>
</html>