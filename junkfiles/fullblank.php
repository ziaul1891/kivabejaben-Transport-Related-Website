<!DOCTYPE HTML>
<html>

<head>
  <title>CSS3_colour3</title>
  <meta name="description" content="website description" />
  <meta name="keywords" content="website keywords, website keywords" />
  <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
  <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
  <link rel="stylesheet" type="text/css" href="css/style.css" />
  <!-- modernizr enables HTML5 elements and feature detects -->
  <script type="text/javascript" src="js/modernizr-1.5.min.js"></script>
  <style>
	 #map-canvas {
        height: 100%;
        margin: 0px;
        padding: 0px;
		position:relative;
		left:15%;
      }
    
	.content { 
	  text-align: left;
	  width:  930px;;
	  margin: 0 0 15px 0;
	  float: left;
	  font-size: 120%;
	  padding: 14px 0 0 0;
	}
	
	#start
	{
	width: 10em;  height: 1.8em;
	font-weight: bold;
	font-size:15px;
	
	}
	#end
	{
	
	width: 10em;  height: 1.8em;
	font-weight: bold;
	font-size:15px;
	}
	
	#source_destination {
        position: relative;
       
        left: 20%;
       
        z-index: 5;
       
       
       
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
  <div id="main">
    <header>
      <div id="logo">
        <div id="logo_text">
          <!-- class="logo_colour", allows you to change the colour of the text -->
          <h1><a href="index.html">CSS3<span class="logo_colour">_colour3</span></a></h1>
          <h2>Simple. Contemporary. Website Template.</h2>
        </div>
      </div>
      <nav>
        <div id="menu_container">
          <ul class="sf-menu" id="nav">
            <li><a href="index.html">Home</a></li>
            <li><a href="examples.html">Examples</a></li>
            <li><a href="page.html">A Page</a></li>
            <li><a href="another_page.html">Another Page</a></li>
            <li><a href="#">Example Drop Down</a>
              <ul>
                <li><a href="#">Drop Down One</a></li>
                <li><a href="#">Drop Down Two</a>
                  <ul>
                    <li><a href="#">Sub Drop Down One</a></li>
                    <li><a href="#">Sub Drop Down Two</a></li>
                    <li><a href="#">Sub Drop Down Three</a></li>
                    <li><a href="#">Sub Drop Down Four</a></li>
                    <li><a href="#">Sub Drop Down Five</a></li>
                  </ul>
                </li>
                <li><a href="#">Drop Down Three</a></li>
                <li><a href="#">Drop Down Four</a></li>
                <li><a href="#">Drop Down Five</a></li>
              </ul>
            </li>
            <li><a href="contact.php">Contact Us</a></li>
          </ul>
        </div>
      </nav>
    </header>
    <div id="site_content">
      
      <div class="content">
	  
			 <div id="source_destination">
   	
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
        echo "<font color='#3399FF'  style='font-size:22px; font-weight: bold'>Source - </font><select id='start' onchange='calcRoute();'>\n";
       
		

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
		echo "<font color='#3399FF'  style='font-size:20px; font-weight: bold'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Destination - </font><select id='end' onchange='calcRoute();'>\n";
       
		

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
	</br></br>
    <div id="map-canvas" style="width:700px;height:600px;">
	
	</div>

      </div>
    </div>
    <footer>
      <p>Copyright &copy; CSS3_colour3 | <a href="http://www.css3templates.co.uk">design from css3templates.co.uk</a></p>
    </footer>
  </div>
  <p>&nbsp;</p>
  <!-- javascript at the bottom for fast page loading -->
  <script type="text/javascript" src="js/jquery.js"></script>
  <script type="text/javascript" src="js/jquery.easing-sooper.js"></script>
  <script type="text/javascript" src="js/jquery.sooperfish.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {
      $('ul.sf-menu').sooperfish();
    });
  </script>
</body>
</html>
