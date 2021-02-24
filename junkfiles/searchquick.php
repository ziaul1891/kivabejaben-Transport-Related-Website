<!DOCTYPE HTML>
<html>

<head>
  <title>CSS3_colour3</title>
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
</style>
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
    $query = "SELECT  DISTINCT Source1 FROM employee UNION SELECT DISTINCT Source2 from employee ORDER BY Source1 asc;";

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
    $query = "SELECT  DISTINCT Source2 FROM employee UNION SELECT DISTINCT Source1 FROM employee ORDER BY Source2 asc";
	


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



$sql = "SELECT employee_id, Source1,Destination1,employee_email FROM employee where ((Source1='".($maker)."') and (Destination1='".($maker2)."')) UNION  SELECT employee_id, Source2,Destination2,employee_email FROM employee where ((Source2='".($maker)."') and (Destination2='".($maker2)."'))";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {


    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
	
        echo "<br><br><font color='#00FFFF'  style='font-size:20px; font-weight: bold'>Starting Address:</font> <font color='#FFFFFF'  style='font-size:20px; font-weight: bold'>"  . $row["Source1"]. "</font> &nbsp;&nbsp;&nbsp;<font color='#00FFFF'  style='font-size:20px; font-weight: bold'>Ending Address:</font> <font color='#FFFFFF'  style='font-size:20px; font-weight: bold'>" . $row["Destination1"]. "</font><br>";
		echo "<br><br><font color='#00FFFF'  style='font-size:20px; font-weight: bold'>Email Address: </font><font color='#FFFFFF'  style='font-size:20px; font-weight: bold'>". $row["employee_email"]. "</font><br>";
		
		
	}
}

else {
if($maker==$maker2)
{
echo"<font color='#00FFFF'  style='font-size:20px; font-weight: bold'></br></br>Come on! Be Real! Don't Kid with me you naughty viewer. </br> </br>Your source and destination can't be same</font>";
}
else
    echo "<font color='#00FFFF'  style='font-size:20px; font-weight: bold'></br></br>Sorry Dude! No possible Bus Transporation! </br></br> Use your private JET </font>";
}

mysqli_close($conn);


}
?> 
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

$result = mysqli_query($con,"SELECT * FROM employee WHERE employee_id = ".$id);

while($row = mysqli_fetch_array($result)) {


echo "<br><br><font color='#00FFFF'  style='font-size:20px; font-weight: bold'>Address 1:</font> <font color='black'  style='font-size:20px; font-weight: bold'>"  . $row["Source1"]. "</font> &nbsp;&nbsp;&nbsp;<font color='#00FFFF'  style='font-size:20px; font-weight: bold'>Address2:</font> <font color='black'  style='font-size:20px; font-weight: bold'>" . $row["Destination1"]. "</font><br>";
echo "<br><br><font color='#00FFFF'  style='font-size:20px; font-weight: bold'>Email Address: </font><font color='black'  style='font-size:20px; font-weight: bold'>". $row["employee_email"]. "</font><br>";
		
}

?>


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































<?php
/*
$con=mysqli_connect("localhost","root","","company");
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$id = $_GET['id'];

$result = mysqli_query($con,"SELECT * FROM employee WHERE employee_id = ".$id);

while($row = mysqli_fetch_array($result)) {



echo "<font color='#3399FF' ><b>Source	: </b><br/><br/></font><font color='black'>".$row['Source1']."</font><br/><br/><br/><br/>";
echo "<font color='#3399FF' ><b>Destination	: </b><br/><br/></font><font color='black'>".$row['Destination1']."</font><br/><br/><br/><br/>";

}
*/
?>

