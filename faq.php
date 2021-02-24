<?php
error_reporting(E_ALL^E_NOTICE);

error_reporting(0);

session_start();
$userid = $_SESSION['userid'];
$username = $_SESSION['username'];

?>





<html>

<head>
  <title>KivabeJaben-Frequently Asked Questions</title>
  <meta name="description" content="website description" />
  <meta name="keywords" content="website keywords, website keywords" />
  <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
  <link rel="stylesheet" type="text/css" href="css/styleregistrationfull.css" />
   <link rel="stylesheet" type="text/css" href="css/styleregistrationform.css" />
 
  <!-- modernizr enables HTML5 elements and feature detects -->
  <script type="text/javascript" src="js/modernizr-1.5.min.js"></script>
  <style>
	
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
	  <h1>Frequently Asked Questions (FAQ)</h1>
     
	 
	 
	 
	 
	 <ul>
		<h2>Account</h2>
  <li><font color='#33ff33'  size="2"><font color='ff9999' size="3">How do I sign up?</font></li></br>
  <p>---You can sign up from <a href="register.php">Registration</a> section. To do this, you have to enter your username,password & email. Then a confirmation mail will be sent to your mail. By clicking that mail, you will be a member of our website. </p>
  </br>
  <li><font color='#33ff33'  size="2"><font color='ff9999' size="3">How do I change my password?</font></li></br>
  <p>---You can change your password from <a href="resetpass.php">Change Password</a> section which is a sub-menu of Registration section. To do this, you have to enter your old password first. Then you need to enter your new password twice (2nd time for confirmation). </p>
  </br>
  <li><font color='#33ff33'  size="2"><font color='ff9999' size="3">What happens if I forget my password?</font></li></br>
  <p>---You can create a new password from <a href="forgotpass.php">Forgot Password</a> section. 
To do this, you have to enter your username & email. Then a randomly generated password will be sent to your mail. You can use that to enter our site.  Afterwards you can change this to your own preferable password. </p>
  </br>
  <h2>Search</h2>
  <li><font color='#33ff33'  size="2"><font color='ff9999' size="3">How does search work?</font></li></br>
  <p>---You can search using two ways - 1. Live Search  2. Source-Destination Search</p>
  </br>
  
  <li><font color='#33ff33'  size="2"><font color='ff9999' size="3">How can I search using Live Search?</font></li></br>
  <p>---In <a href="searchplace.php">Live Search</a>, keyword based searching is implemented. 
Whenever you write anything in the blank textbox, a suggestion from our database will be shown to you. You can select from there to get your desired info.</p>
  </br>
  
  <li><font color='#33ff33'  size="2"><font color='ff9999' size="3">How can I search using Source-Destination?</font></li></br>
  <p>---In Source-Destination Search, you just need to select your source & destination. 
Then corresponding data will be shown to you. However there are two options - Normal view (plain text) & Map View.</p>
  </br>
  
  <li><font color='#33ff33'  size="2"><font color='ff9999' size="3">How can I search using Source-Destination (Normal View)?</font></li></br>
  <p>---In <a href="resultcombobox.php">normal view</a>, you just need to select your source & destination. 
Then corresponding data will be shown to you.</p>
  </br>
  
  <li><font color='#33ff33'  size="2"><font color='ff9999' size="3">How can I search using Source-Destination (Map View)?</font></li></br>
  <p>---In <a href="mapview.php">map view</a>, you just need to select your source & destination. 
Then whole path from source to destination will be shown to you. It will provide you 3 possible ways of transportation - Bus, Cycling & walking. Map view actually gives you a total estimation of how you can reach your destination, how long the distance is and how much time will it take approximately.</p>
  </br>
  
  <li><font color='#33ff33'  size="2"><font color='ff9999' size="3">How are Distance & Required Time calculated?</font></li></br>
  <p>---We calculated distance with the help of Google maps. Time is also calculated with the help of Google maps. But it should me noted that the time required is actually an 
  estimated time. There can be traffics on the road which we cannot be aware of. So we decided to calculate an estimated time depending on minimum traffic on the road.</p>
  </br>
  
  <h2>Chat</h2>
  <li><font color='#33ff33'  size="2"><font color='ff9999' size="3">How can I chat?</font></li></br>
  <p>---To chat you must be logged in to our website. If you are not, then log in from <a href="login.php">Login</a> section. If you haven't signed up yet, register from the <a href="register.php">registration</a> section. Then you can log in and use our chatting option.</p>
  </br>
  <li><font color='#33ff33'  size="2"><font color='ff9999' size="3">How do I which users are online right now?</font></li></br>
  <p>---There is a section on the right side of the chatting panel where you 
can see which users are currently online. Whenver a user signs out of the website, his/her username will be gone from that section.</p>
  </br>
  
  
  
  </font>
 
  </ul>







	 
	 
	
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	
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
