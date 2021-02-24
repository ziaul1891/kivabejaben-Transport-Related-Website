<?php
error_reporting(E_ALL^E_NOTICE);

error_reporting(0);

session_start();
$userid = $_SESSION['userid'];
$username = $_SESSION['username'];

?>




<html>

<head>
  <title>KivabeJaben-Forgot Your Password?</title>
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
     
	 
	 
	 
	<div class="forgotpass-form">
<h1>Forgot Your Password?</h1>
	<?php
	
	
	
	if(!$username && !$userid){
		if($_POST['resetbtn']){
			//get the form data
			$user = $_POST['user'];
			$specialcode = $_POST ['specialcode'];
			
			if($user){
				if($specialcode){
					
						//connect
						require ("./connect.php");
						
						$query = mysql_query("SELECT *FROM users WHERE username='$user'");
						$numrows=mysql_num_rows($query);
						if($numrows==1){
							//get the info about account
							$row = mysql_fetch_assoc($query);
							$dbspecialcode = $row['specialcode'];
							
							//make sure email is correct
							if($specialcode == $dbspecialcode){
								$pass = rand();
								$pass = md5($pass);
								$pass = substr($pass,0,15);
								$password = md5(md5("kjfiufj".$pass."Fj56fj"));
								//update db with new pass
								mysql_query("UPDATE users SET password='$password' WHERE username= '$user'");
								
								//make sure the password was changed
								$query = mysql_query("SELECT * FROM users WHERE username = '$user' AND password='$password'");
								$numrows = mysql_num_rows($query);
								
								if($numrows == 1){
									//create email variables
									$webmaster = "Admin-KivabeJaben.com <ziaul1891@gmail.com>";
									$headers = "From: $webmaster";
									$subject = "Your new password";
									$message = "Your password has been reset.Your new password is below.\n";
									$message .= "Password: $pass\n";
									
									if(mail($specialcode,$subject,$message,$headers)){
										
										echo "<font color='#456'>Your password has been reset.Your new password is:</font><font color='#945'><br/>$pass<br/></font>"; 
										echo "<font color='#456'>(You can copy the above password)<br/></font>"; 
										echo "<font color='#456'>Now you can login from <a href=./login.php>here</a></font>"; 
										
										//echo "<font color='#456'>Your password has been reset. An email has been sent to your mail address with your new password.";
										
										
									}
									else
										echo "<font color='#456'>An error has occurred, your email was not send containing new password</font>";
								
								}
								else
									echo "<font color='#456'>And error has occured, the password was not reset</font>";
								
							}
							else
								echo "<font color='#456'>You have entered the wrong special codeword</font>";
						}
						else
							echo "<font color='#456'>Your username was not found</font>";
						
						
						mysql_close();
					
					
				}
				else
					echo "<font color='#456'>Please enter your special codeword.</font>";
			}
			else
				echo "<font color='#456'>Please enter your username.</font>";
		}
		else
			echo "<form action='./forgotpass.php' method='post'>
		<table id='tableforgotpass'>
		<tr>
			<td>Username:</td>
			<td><input type='text' name='user' /></td>
		</tr>
		
		<tr>
			<td>Special Code:</td>
			<td><input type='text' name='specialcode' /></td>
		</tr>
		
		<tr>
			<td></td>
			<td><input class= 'forgotpass' type='submit' name='resetbtn' value='Reset Password' /></td>
		</tr>
		</table>
		</form>";
		
		
		
	}
	else
		echo "Please logout to view this page.";
	?>
</div>

	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 </br>

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
