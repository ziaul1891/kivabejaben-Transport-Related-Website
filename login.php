<?php
error_reporting(E_ALL^E_NOTICE);

error_reporting(0);

session_start();
$userid = $_SESSION['userid'];
$username = $_SESSION['username'];

?>


<html>

<head>
  <title>KivabeJaben-Login</title>
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
     
	 
	 
	 
	 
	 

	<div class="login-form">
<h1>Login</h1>
	<?php
	
	if($username && $userid){
		echo"<font color='#456'>You are already logged in as <b>$username</b>.<a href='./index.php'> click here</a> to go to Homepage</font>";
					
	}
	else{
	
	
	$form = "<form  action ='./login.php' method='post' >
	<table id='tablelogin'>
	<tr>
		<td>Username:</td>
		<td><input type='text'  autocomplete='off' name='user'  /></td>
	</tr>
	
	<tr>
		<td>Password:</td>
		<td><input type='password' autocomplete='off'  name='password'  /></td>
	</tr>
	
	<tr>
		<td></td>
		<td><input class='login' type='submit' name='loginbtn' value='Login' /></td>
	</tr>
	
	<tr>
		<td><a class = 'registerphp' href='./register.php'>Regsiter Now\t</a> </td>
		<td><a  class = 'forgotpass' href='./forgotpass.php'>Forgot Your Password?</a></td>
	</tr>
	</table>
	</form>";
	
	if($_POST['loginbtn']){
		$user=$_POST['user'];
		$password=$_POST['password'];
		
		if($user){
			if($password){
				//echo "$user - $password <hr /> $form";
				require ("connect.php");
				
				$password = md5(md5("kjfiufj".$password."Fj56fj"));
				
				
				
				
				
				//make sure login info correct
				
				
				$query=mysql_query("SELECT *FROM users WHERE username='$user'");
				$numrows=mysql_num_rows($query);
				if($numrows==1){
					$row = mysql_fetch_assoc($query);
					$dbid = $row['id'];
					$dbuser = $row['username'];
					$dbpass = $row['password'];
					$dbactive = $row['active'];
					
					if($password==$dbpass){
						if($dbactive==1){
							//set session info
							$_SESSION['userid'] = $dbid;
							$_SESSION['username'] = $dbuser;
							mysql_query("UPDATE users SET online='1' WHERE username = '$dbuser'");
							
							
							echo"<font color='#456'>You have logged in as <b>$dbuser</b>.<a href='./index.php'> click here</a> to go to Homepage</font>";
						}
						else
							echo "<font color='#456'>You must activate your account to login. $form</font>";
					}
					else
						echo "<font color='#456'>You did not enter correct password. $form</font>";
				}
				else
					echo "<font color='#456'>The username is incorrect. $form</font>";
				
				
				mysql_close();
			}
			else
				echo "<font color='#456'>You must enter password. $form</font>";
		}
		else
			echo "<font color='#456'>You must enter your username . $form</font>";
	}
	else
		echo $form;
	}
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
