<!DOCTYPE HTML>


<?php
error_reporting(E_ALL^E_NOTICE);

error_reporting(0);

session_start();
$userid = $_SESSION['userid'];
$username = $_SESSION['username'];

?>




<html>

<head>
  <title>KivabeJaben-Map View</title>
   <meta content="en" http-equiv="content-language">
   <link rel="stylesheet" href="http://code.jquery.com/mobile/1.2.0/jquery.mobile-1.2.0.min.css" />
  <link rel="stylesheet" type="text/css" href="css/style.css" />
  <!-- modernizr enables HTML5 elements and feature detects -->
  <script type="text/javascript" src="js/modernizr-1.5.min.js"></script>
  <style>
	
	.content { 
	  text-align: left;
	  width:  930px;
	 
	  margin: 0 0 15px 0;
	  float: left;
	  font-size: 120%;
	  padding: 14px 0 0 0;
	}
	 #map_page {
		
		height:100%;
		width:100%;
        margin-top: -15px;
        padding: 0px;
		position:relative;
		
      }
	  
	  #user{
	position:relative;
	float:right;
	}
	  
	 
</style>

 <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false&libraries=places"></script>
    <script type="text/javascript">
        google.maps.event.addDomListener(window, 'load', function () {
            var places = new google.maps.places.Autocomplete(document.getElementById('from'));
			var places = new google.maps.places.Autocomplete(document.getElementById('to'));
            google.maps.event.addListener(places, 'place_changed', function () {
                var place = places.getPlace();
                var address = place.formatted_address;
                var latitude = place.geometry.location.k;
                var longitude = place.geometry.location.D;
                var mesg = "Address: " + address;
                mesg += "\nLatitude: " + latitude;
                mesg += "\nLongitude: " + longitude;
              //  alert(mesg);
            });
        });
    </script>
		
	
  <script src="http://code.jquery.com/jquery-1.8.2.min.js"></script>
        <script src="http://code.jquery.com/mobile/1.2.0/jquery.mobile-1.2.0.min.js"></script>
       
        <script type="text/javascript">
            $(document).on("pageinit", "#map_page", function() {
                initialize();
            });

            $(document).on('click', '#submit', function(e) {
                e.preventDefault();
                calculateRoute();
            });

            var directionDisplay,
                directionsService = new google.maps.DirectionsService(),
                map;

            function initialize() 
            {
                directionsDisplay = new google.maps.DirectionsRenderer();
                var mapCenter = new google.maps.LatLng(23.7000, 90.37508);

                var myOptions = {
                    zoom:10,
                    mapTypeId: google.maps.MapTypeId.ROADMAP,
                    center: mapCenter
                }

                map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
                directionsDisplay.setMap(map);
                directionsDisplay.setPanel(document.getElementById("directions"));  
            }

            function calculateRoute() 
            {
                var selectedMode = $("#mode").val(),
                    start = $("#from").val(),
                    end = $("#to").val();

                if(start == '' || end == '')
                {
                    // cannot calculate route
                    $("#results").hide();
                    return;
                }
                else
                {
                    var request = {
                        origin:start, 
                        destination:end,
                        travelMode: google.maps.DirectionsTravelMode[selectedMode]
                    };

                    directionsService.route(request, function(response, status) {
                        if (status == google.maps.DirectionsStatus.OK) {
                            directionsDisplay.setDirections(response); 
                            $("#results").show();
                            /*
                                var myRoute = response.routes[0].legs[0];
                                for (var i = 0; i < myRoute.steps.length; i++) {
                                    alert(myRoute.steps[i].instructions);
                                }
                            */
                        }
                        else {
                            $("#results").hide();
                        }
                    });

                }
            }
        </script>

</head>

<body>
  <div id="main">
     <header>
      <div id="logo">
        <div id="logo_text">
          <!-- class="logo_colour", allows you to change the colour of the text -->
         <h1><a href="index.html">Kivabe<span class="logo_colour">Jaben</span><span style="color:white; font-size: 15pt">.com</span></a></h1>
          <h2>A Transportation Guide</h2>
       </div>
	   		
<div id="user">
<?php
if($username && $userid){
		echo "<font color='#3399FF' size='4px'><b>$username</b></font>, <font color='white' size='4px'>Click <a href='./logout.php'>Logout   </a>to Logout</font>";
		
	}

	

?>
</div>
      </div>
      <nav>
        <div id="menu_container">
          <ul class="sf-menu" id="nav">
            <li><a href="index.php">Home</a></li>
            <li><a href="#">Search</a>
			 <ul>
			   <li><a href="searchplace.php">Live Search</a>
                 
                </li>
              
                <li><a href="#">Source-Destination</a>
				 <ul>
                    <li><a href="resultcombobox.php">Normal View</a></li>
                    <li><a href="mapview.php">Google Map View</a></li>
                     </ul>
				
				</li>
              
              </ul>
			
			
			</li>
            <li><a href="memberchat.php">Chat</a></li>
            <li><a href="#">Registration</a>
			 <ul>
			   <li><a href="register.php">Sign-up</a></li>
               <li><a href="login.php">Login</a></li>
              <li><a href="resetpass.php">Change Password</a></li>
              <li><a href="activate.php">Activate</a></li>
              
        
              
                
				
				</li>
              
              </ul>
			
			</li>
            <li><a href="about.php">About</a>
             
            </li>
            <li><a href="faq.php">FAQ</a></li>
			 <li><a href="contact.php">Contact Us</a></li>
			
          </ul>
        </div>
      </nav>
    </header>
    <div id="site_content">
      
      <div class="content">
	  
			
	

	
	
    <div data-role="page" id="map_page">
		
		
		
	
	
	
	
            <div data-role="header">
                <h1><a href="#">Google maps directions service</h1>
            </div>
            <div data-role="content">
                <div class="ui-bar-c ui-corner-all ui-shadow" style="padding:1em;">
                    <div id="map_canvas" style="height:300px;"></div>
                    <div data-role="fieldcontain">
                        <label for="from">From</label> 
                        <input type="text" id="from"/>
                    </div>
                    <div data-role="fieldcontain">
                        <label for="to">To</label> 
                        <input type="text" id="to"/>
                    </div>
                    <div data-role="fieldcontain">
                        <label for="mode" class="select">Transportation method:</label>
                        <select name="select-choice-0" id="mode">
                            <option value="DRIVING">Bus</option>
                            <option value="WALKING">Walking</option>
                            <option value="BICYCLING">Bicycling</option>
                        </select>
                    </div>
                    <a data-icon="search" data-role="button" href="#" id="submit">Get directions</a>
                </div>
                <div id="results" style="display:none;">
                    <div id="directions"></div>
                </div>
            </div>
        </div>
		

      </div>
    </div>
    <footer>
      <p>Copyright &copy; Team Prototype</p>
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
