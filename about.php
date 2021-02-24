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
  <title>KivabeJaben-About</title>
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
		
			
		<img src="prototype.png" style="width:204px;height:228px;border:2px solid rgb(139, 51, 51);">
			
	   
		

		</div>
        <div class="sidebar">
          <h1> Prototype  @  Facebook</h1>
          <ul>
		 
            <li><a href="https://www.facebook.com/tasfia.bushra">Tasfia Bushra</a></li>
            <li><a href="https://www.facebook.com/ziaulmishu">Ziaul Zia</a></li>
            <li><a href="https://www.facebook.com/bahsnehal">Roy Snehal</a></li>
            <li><a href="https://www.facebook.com/jubayer.sanim">Jubayer Sanim</a></li>
			
          </ul>
        </div>
      </div>
      <div class="content">
        <h1>About Our Website & us</h1>
        <p><font color="#66ffff"><b>This website is built to help the people of Dhaka city with their transportation by bus.</p> 
        <p>It provides user with possible ways of bus transportation from one place to another.</p>
        <p>Users can easily search for their desired destination using our <a href="searchplace.php">Live Search</a> option. Not only that, but they can also use other searhing options such as 
		<a href="resultcombobox.php">Source-Destination</a> search and <a href="mapview.php">Map-view</a> search.</a></p>
        <p>This website is built by Team-Prototype. The team consists of four members - </br>
		1 - Tasfia Bushra </br>	
		2 - Ziaul Zia</br>	
		3 - Roy Snehal</br>	
		4 - Jubayer Sanim</p>
		<p>Our team will continue working for the improvement of this website. If you have any complains or any comments, feel free to send us a message from 
		"Contact US" section.</p></font>
       
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
