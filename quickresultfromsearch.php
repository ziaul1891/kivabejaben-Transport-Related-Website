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
  <title>KivabeJaben-Quickresult from Search</title>
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







<html>
<div id="result">

</div>
</html>




</form>
</html>
</div>

<?php

$con=mysqli_connect("localhost","root","","company");
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$id = $_GET['id'];

$result = mysqli_query($con,"SELECT * FROM bts WHERE Bus_id = ".$id);

while($row = mysqli_fetch_array($result)) {


echo "<br><br><font color='#00FFFF'  style='font-size:20px; font-weight: bold'>Address 1:</font> <font color='#FFFFFF'  style='font-size:20px; font-weight: bold'>"  . $row["Source1"]. "</font> &nbsp;&nbsp;&nbsp;<font color='#00FFFF'  style='font-size:20px; font-weight: bold'>Address 2:</font> <font color='#FFFFFF'  style='font-size:20px; font-weight: bold'>" . $row["Destination1"]. "</font><br>";
echo "<br><br><font color='#00FFFF'  style='font-size:20px; font-weight: bold'>Bus Name: </font><font color='#FFFFFF'  style='font-size:20px; font-weight: bold'>". $row["Bus_Name"]. "</font><br>";
echo "<br><br><font color='#00FFFF'  style='font-size:20px; font-weight: bold'>Fare: </font><font color='#FFFFFF'  style='font-size:20px; font-weight: bold'>". $row["Approximate_Fare"]. "</font><br>";
		
echo "<br><br><font color='#00FFFF'  style='font-size:20px; font-weight: bold'>Required Time: </font><font color='#FFFFFF'  style='font-size:20px; font-weight: bold'>". $row["Approximate_Time"]. "</font><br>";
		
echo "<br><br><font color='#00FFFF'  style='font-size:20px; font-weight: bold'>Distance: </font><font color='#FFFFFF'  style='font-size:20px; font-weight: bold'>". $row["Distance"]. "</font><br>";
				
}

?>


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































<?php
/*
$con=mysqli_connect("localhost","root","","company");
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$id = $_GET['id'];

$result = mysqli_query($con,"SELECT * FROM bts WHERE Bus_id = ".$id);

while($row = mysqli_fetch_array($result)) {



echo "<font color='#3399FF' ><b>Source	: </b><br/><br/></font><font color='black'>".$row['Source1']."</font><br/><br/><br/><br/>";
echo "<font color='#3399FF' ><b>Destination	: </b><br/><br/></font><font color='black'>".$row['Destination1']."</font><br/><br/><br/><br/>";

}
*/
?>

