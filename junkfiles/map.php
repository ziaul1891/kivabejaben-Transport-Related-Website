
<html>
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <title>Directions service</title>
    <style>
      #map-canvas {
        height: 100%;
        margin: 0px;
        padding: 0px;
		
      }
      #panel {
        position: absolute;
        top: 5px;
        left: 50%;
        margin-left: -180px;
        z-index: 5;
        background-color: #fff;
        padding: 5px;
        border: 1px solid #999;
      }
	 
	  
    </style>
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>
	

    <script>
var directionsDisplay;
var directionsService = new google.maps.DirectionsService();
var map;

function initialize() {
  directionsDisplay = new google.maps.DirectionsRenderer();
  var chicago = new google.maps.LatLng(23.7000, 90.3750);
  var mapOptions = {
    zoom:7,
    center: chicago
  };
  map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
  directionsDisplay.setMap(map);
}

function calcRoute() {
  var start = document.getElementById('start').value;
  var end = document.getElementById('end').value;
  var request = {
      origin:start,
      destination:end,
      travelMode: google.maps.TravelMode.DRIVING
  };
  directionsService.route(request, function(response, status) {
    if (status == google.maps.DirectionsStatus.OK) {
      directionsDisplay.setDirections(response);
    }
  });
}

google.maps.event.addDomListener(window, 'load', initialize);

    </script>
  </head>
  <body>
    <div id="panel">
    <b>Start: </b>
	<!--
    <select id="start" onchange="calcRoute();">
      
	  <option value="Mohammadpur, Dhaka, Dhaka Division, Bangladesh">Mdpur</option>
   	  <option value="Dhanmondi, Dhaka, Dhaka Division, Bangladesh">Dhanmondi</option>
      <option value="Gulshan, Dhaka, Dhaka Division, Bangladesh">Gulshan</option>
      <option value="oklahoma city, ok">Oklahoma City</option>
      <option value="amarillo, tx">Amarillo</option>
      <option value="gallup, nm">Gallup, NM</option>
      <option value="flagstaff, az">Flagstaff, AZ</option>
      <option value="winona, az">Winona</option>
      <option value="kingman, az">Kingman</option>
      <option value="barstow, ca">Barstow</option>
      <option value="san bernardino, ca">San Bernardino</option>
      <option value="los angeles, ca">Los Angeles</option> 
    </select>
	-->
    <b>End: </b>
    <!--
	<select id="end" onchange="calcRoute();">
	 
      <option value="Mohammadpur, Dhaka, Dhaka Division, Bangladesh">Mdpur</option>
      <option value="Dhanmondi, Dhaka, Dhaka Division, Bangladesh">Dhanmondi</option>
      <option value="Gulshan, Dhaka, Dhaka Division, Bangladesh">Gulshan</option>
      <option value="oklahoma city, ok">Oklahoma City</option>
      <option value="amarillo, tx">Amarillo</option>
      <option value="gallup, nm">Gallup, NM</option>
      <option value="flagstaff, az">Flagstaff, AZ</option>
      <option value="winona, az">Winona</option>
      <option value="kingman, az">Kingman</option>
      <option value="barstow, ca">Barstow</option>
      <option value="san bernardino, ca">San Bernardino</option>
      <option value="los angeles, ca">Los Angeles</option>
    </select>
	-->
	
	
	
	
	
	
	
	
	
	<?php


  // Connect to the database
$user = "root";
$password = "";
$database = "company";

  // Connect to the database
	$con = mysql_connect("localhost",$user,$password) or die ('Could not connect: ' . mysql_error());
	mysql_select_db($database, $con);
	
    // Create the form, post to the same file
   

    // Form a query to populate the combo-box
    $query = "SELECT  DISTINCT Source1 FROM employee UNION SELECT DISTINCT Source2 from employee ORDER BY Source1 asc;";

    // Successful query?
    if($result = mysql_query($query))  {

      // If there are results returned, prepare combo-box
      if($success = mysql_num_rows($result) > 0) {
        // Start combo-box
        echo "<select id='start' onchange='calcRoute();'>\n";
        echo "<option>Source</option>\n";
		

        // For each item in the results...
        while ($row = mysql_fetch_array($result))
          // Add a new option to the combo-box
         echo "<option value='$row[Source1]'>$row[Source1]</option>\n";
		  

        // End the combo-box
        echo "</select>\n";
		
		
		
      }
      // No results found in the database
      else { echo "No results found."; }
    }
    // Error in the database
    else { echo "Failed to connect to database."; }

   
  
?>
	
	
	
	
	
	
	<?php


  // Connect to the database
$user = "root";
$password = "";
$database = "company";

  // Connect to the database
	$con = mysql_connect("localhost",$user,$password) or die ('Could not connect: ' . mysql_error());
	mysql_select_db($database, $con);
	
    // Create the form, post to the same file
   

    // Form a query to populate the combo-box
    $query = "SELECT  DISTINCT Source2 FROM employee UNION SELECT DISTINCT Source1 FROM employee ORDER BY Source2 asc";
	


    // Successful query?
    if($result = mysql_query($query))  {

      // If there are results returned, prepare combo-box
      if($success = mysql_num_rows($result) >0) {
       
		
		//2nd combo-box
		echo "<select id='end' onchange='calcRoute();'>\n";
        echo "<option>Destination</option>\n";
		

        // For each item in the results...
        while ($row = mysql_fetch_array($result))
          // Add a new option to the combo-box
          echo "<option value='$row[Source2]'>$row[Source2]</option>\n";
		 

        // End the combo-box
        echo "</select>\n";
      }
      // No results found in the database
      else { echo "No results found."; }
    }
	
    // Error in the database
    else { echo "Failed to connect to database."; }

   
  
?>
	
	
	
	
	
	
	
	
	
	
	
    </div>
    <div id="map-canvas" style="width:600px;height:380px;">
	
	</div>
  </body>
</html>