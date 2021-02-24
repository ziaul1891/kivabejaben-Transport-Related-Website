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
  <title>KivabeJaben.com</title>
  <meta name="description" content="website description" />
  <meta name="keywords" content="website keywords, website keywords" />
  <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
  <link rel="stylesheet" type="text/css" href="css/style.css" />
  <!-- modernizr enables HTML5 elements and feature detects -->
  <script type="text/javascript" src="js/modernizr-1.5.min.js"></script>
  <style>
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
      <div id="sidebar_container">
        <div class="sidebar">
		<h1>Recently Updated</h1>
		<marquee scrollamount="2" onmouseover="this.scrollAmount='2'" onmouseout="this.scrollAmount='2'" direction="up" loop="true" height="225" width="200">
			

			<?php
			
			include 'connect.php'	;
				
		
		
		
			$query = "SELECT *FROM bts ORDER by Bus_id desc LIMIT 8";
  
   

		
		
		$query_run = mysql_query($query);
		
		
		
		
		while($query_row = mysql_fetch_array($query_run)){
			
			
			$id = $query_row['Bus_id'];
			$name = $query_row['Source1'];
			$name1 = $query_row['Destination1'];
			
			


			//echo "<a href='anotherpage.php?id=$id'>$name</a><br />";
			echo "<font size=3>" . "<a href='quickresult.php?id=$id'>$name - $name1</a> <br /><br/>" . "</font>";
			
			
	
			}
			?>
	   
		</marquee>

		</div>
        <div class="sidebar">
          <h3>Useful Links</h3>
          <ul>
            <li><a href="resultcombobox.php">Source-Destination Search</a></li>
            <li><a href="mapview.php">Map Search</a></li>
            <li><a href="faq.php">FAQ</a></li>
            <li><a href="contact.php">Contact us</a></li>
          </ul>
        </div>
      </div>
      <div class="content">
		<img src="kivabejaben.png" style="width:654px;height:288px">
	  
        <h1>Welcome to Kivabe<font color='#FD710B'>Jaben</font>.com</h1>
		<font color='lightgreen'>
        <p>kivabejaben.com is a website which offers information about all possible ways to go from place to place by bus inside Dhaka city.</strong></p>
        <p>This website offers various searching techniques for all the users.</strong>.</p>
        <p>A lot of people go from one place to another by bus. So bus transportation is a very common thing in Dhaka. The goal of our website is to let people
		know about various ways of bus transportation inside Dhaka so that they can travel easily. </p>
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
