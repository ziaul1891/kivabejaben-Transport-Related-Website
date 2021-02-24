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
  <title>KivabeJaben-Source-Destination View</title>
  <meta name="description" content="website description" />
  <meta name="keywords" content="website keywords, website keywords" />
  <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
  <link rel="stylesheet" type="text/css" href="css/style.css" />
  <!-- modernizr enables HTML5 elements and feature detects -->
  <script type="text/javascript" src="js/modernizr-1.5.min.js"></script>
  <style>
	#submitbuttonforresult
	{
	position:relative;
	left:60px;
	width: 10em;  height: 2em;
	font-weight: bold;
	font-size:15px;
	}
	#comboboxsource
	{
	width: 10em;  height: 1.8em;
	font-weight: bold;
	font-size:15px;
	
	}
	#comboboxdestination
	{
	width: 10em;  height: 1.8em;
	font-weight: bold;
	font-size:15px;
	}
	.content { 
	  text-align: left;
	  width:  930px;;
	  margin: 0 0 15px 0;
	  float: left;
	  font-size: 120%;
	  padding: 14px 0 0 0;
	}
	 #user{
	position:relative;
	float:right;
	}
</style>
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
     
	 <div id="source_destination">
	 
	 
	 <html>  
<form method="Post"/>

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
    $query = "SELECT  DISTINCT Source1 FROM bts UNION SELECT DISTINCT Source2 from bts ORDER BY Source1 asc;";

    // Successful query?
    if($result = mysql_query($query))  {

      // If there are results returned, prepare combo-box
      if($success = mysql_num_rows($result) > 0) {
        // Start combo-box
        echo "<font color='#3399FF'  style='font-size:22px; font-weight: bold'>Source - </font> <select id='comboboxsource' name='name1'>\n";
        //echo "<option>Source</option>\n";
		

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
    $query = "SELECT  DISTINCT Source2 FROM bts UNION SELECT DISTINCT Source1 FROM bts ORDER BY Source2 asc";
	


    // Successful query?
    if($result = mysql_query($query))  {

      // If there are results returned, prepare combo-box
      if($success = mysql_num_rows($result) >0) {
       
		
		//2nd combo-box
		
		echo "<font color='#3399FF'  style='font-size:20px; font-weight: bold'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Destination - </font><select id='comboboxdestination' name='name2'>\n";
        //echo "<option></option>\n";
		

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





<input id ="submitbuttonforresult" type="submit" name="Submit" value="Submit"  />

<html>
<div id="result">
<?php

if(isset($_POST["Submit"])){

$maker=mysql_real_escape_string($_POST['name1']);
$maker2=mysql_real_escape_string($_POST['name2']);





$servername = "localhost";
$username = "root";
$password = "";
$dbname = "company";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}



$sql = "SELECT Bus_id, Source1,Destination1,Bus_Name,Approximate_Fare,Approximate_Time,Distance FROM bts where ((Source1='".($maker)."') and (Destination1='".($maker2)."')) UNION  SELECT Bus_id, Source2,Destination2,Bus_Name,Approximate_Fare,Approximate_Time,Distance FROM bts where ((Source2='".($maker)."') and (Destination2='".($maker2)."'))";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {


    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
	
		
	
        echo "<br><br><font color='#00FFFF'  style='font-size:20px; font-weight: bold'>Starting Address:</font> <font color='#FFFFFF'  style='font-size:20px; font-weight: bold'>"  . $row["Source1"]. "</font> &nbsp;&nbsp;&nbsp;<font color='#00FFFF'  style='font-size:20px; font-weight: bold'>Ending Address:</font> <font color='#FFFFFF'  style='font-size:20px; font-weight: bold'>" . $row["Destination1"]. "</font><br>";
		echo "<br><br><font color='#00FFFF'  style='font-size:20px; font-weight: bold'>Bus Name: </font><font color='#FFFFFF'  style='font-size:20px; font-weight: bold'>". $row["Bus_Name"]. "</font><br>";
		
		echo "<br><br><font color='#00FFFF'  style='font-size:20px; font-weight: bold'>Fare: </font><font color='#FFFFFF'  style='font-size:20px; font-weight: bold'>". $row["Approximate_Fare"]. "</font><br>";
		
		echo "<br><br><font color='#00FFFF'  style='font-size:20px; font-weight: bold'>Required Time: </font><font color='#FFFFFF'  style='font-size:20px; font-weight: bold'>". $row["Approximate_Time"]. "</font><br>";
		
		echo "<br><br><font color='#00FFFF'  style='font-size:20px; font-weight: bold'>Distance: </font><font color='#FFFFFF'  style='font-size:20px; font-weight: bold'>". $row["Distance"]. "</font><br>";
		
		
		
	}
}

else {
if($maker==$maker2)
{
echo"<font color='#00FFFF'  style='font-size:20px; font-weight: bold'></br></br>Come on! Be Real! Don't Kid with me you naughty viewer. </br> </br>Your source and destination can't be same</font>";
}
else
    echo "<font color='#00FFFF'  style='font-size:20px; font-weight: bold'></br></br>Sorry! No possible Bus Transporation! </br></br> You can search through map view to find other transportation ways.  </font>";
}

mysqli_close($conn);


}
?> 
</div>
</html>




</form>
</html>
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
