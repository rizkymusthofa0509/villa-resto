<!DOCTYPE html>
<html>
  <head>
    <title>Circles</title>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <style type="text/css">
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100%;
      }

      /* Optional: Makes the sample page fill the window. */
      html,
      body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
    </style>
    <script>

      const image = "";
      // const image = "https://cdn0.iconfinder.com/data/icons/small-n-flat/24/678111-map-marker-512.png";



      const citymap = {

       //Looping Area.

       <?php
        $openMaps = $this->db->query("SELECT * FROM attendance_location");
        foreach ($openMaps->result() as $maps){
          ?>
          Jakarta_<?= $maps->location_id ?>: {
            center: { lat:  <?= $maps->lat ?>, lng: <?= $maps->lon ?> },
            population: 0.10001000*<?= $maps->radius ?>,
            icon:image,
          }, 
          <?php
        }
       ?> 
      };

      function initMap() {
        // Create the map.
        const map = new google.maps.Map(document.getElementById("map"), {
          zoom: 15,
          center: { lat: -6.286445, lng: 106.8179028 },
          mapTypeId: "terrain",

        });

        // Construct the circle for each value in citymap.
        // Note: We scale the area of the circle based on the population.
        for (const city in citymap) {
          // Add the circle for this city to the map.
          const cityCircle = new google.maps.Circle({
            strokeColor: "#FF0000",
            strokeOpacity: 0.8,
            strokeWeight: 2,
            fillColor: "#FF0000",
            fillOpacity: 0.35,
            icon: image,
            map,
            center: citymap[city].center,
            radius: Math.sqrt(citymap[city].population) * 100,

          });
        }

        // Create markers.
        for (const city in citymap) {
          const marker = new google.maps.Marker({
            position: citymap[city].center,
            icon: citymap[city].icon,
            map: map,
          });
        }

      }
    </script>
  </head>
  <body>
    <div id="map"></div>

    <!-- Async script executes immediately and must be after any DOM elements used in callback. -->
   <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDK0Wk9CEkyOK4MtWPFkzvhBmxly_5TpU0&amp;libraries=weather&v=3.31&callback=initMap&sensor=true"></script> 
  </body>
</html>