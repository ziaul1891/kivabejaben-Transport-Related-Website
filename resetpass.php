<?php
error_reporting(E_ALL^E_NOTICE);

error_reporting(0);

session_start();
$userid = $_SESSION['userid'];
$username = $_SESSION['username'];

?>



<html>

<head>
  <title>KivabeJaben-Change Your Password</title>
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
     
	 
	 
	 
	 
	<div class="resetpass-form">
<h1>Change Your Password</h1>
	<?php
	if($username && $userid){
		if($_POST['resetpass']){
			//get the form data
			$pass = $_POST['pass'];
			
			$newpass = $_POST['newpass'];
			
			$confirmpass = $_POST['confirmpass'];
			
			if($pass){
				if($newpass){
					if($confirmpass){
						if($newpass===$confirmpass){
							$password = md5(md5("kjfiufj".$pass."Fj56fj"));
							
							//connect to db
							require("./connect.php");
							$query = mysql_query("SELECT *FROM users WHERE username = '$username' AND password='$password'");
							$numrows = mysql_num_rows($query);
							
							if($numrows == 1){
							//encrypt new pass
								$newpassword = md5(md5("kjfiufj".$newpass."Fj56fj"));
							
							//update the db with new pass
							mysql_query("UPDATE users SET password = '$newpassword' WHERE username = '$username'");
							
							//make sure the password was changed
							$query = mysql_query("SELECT *FROM users WHERE username = '$username' AND password='$newpassword'");
							$numrows = mysql_num_rows($query);
							
							if($numrows == 1){
								echo "<font color='#456'>Your password has been reset</font>";
							}
							else
								echo "<font color='#456'>An  error has occured, your password was not reset</font>";
							}
							else
								echo "<font color='#456'>Your current password is incorrect</font>";
							mysql_close();
						}
						else
							echo "<font color='#456'>Your new password did not match</font>";
					}
					else
						echo "<font color='#456'>Your must confirm your password</font>";
				}
				else
					echo "<font color='#456'>Your must enter your new passowrd</font>";
			}
			else
				echo "<font color='#456'>You must enter your current password</font>";
		}
		echo "<form action='./resetpass.php' method='post'>
	<table id='tableresetpass'>

	<tr>
		<td>Current Password: </td>
		<td><input type='password' name='pass' /></td>
	</tr>
	<tr>
		<td>New Password:</td>
		<td><input type='password' name='newpass' /></td>
	</tr>
	<tr>
		<td>Confirm Password:</td>
		<td><input type='password' name='confirmpass'/></td>
	</tr>
	<tr>
		<td></td>
		<td><input class= 'resetpassbutton' type='submit' name='resetpass' value='RESET PASS'></td>
	</tr>
	
	</table>
	</form>";
	}
	else
		echo "<font color='#456'>Please login to access this page : </font><a href='./login.php'><font color='red'>Login here</font></a>";
	
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
