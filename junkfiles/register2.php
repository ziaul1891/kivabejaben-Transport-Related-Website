<?php
error_reporting(E_ALL^E_NOTICE);

error_reporting(0);

session_start();
$userid = $_SESSION['userid'];
$username = $_SESSION['username'];

?>





<html>

<head>
  <title>CSS3_colour3</title>
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
          <h1><a href="index.html">CSS3<span class="logo_colour">_colour3</span></a></h1>
          <h2>Simple. Contemporary. Website Template.</h2>
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
     
	 
	 
	 
	 
	 
	<div class="register-form">
<h1>Registration</h1>
	<?php
	
	
	if($username && $userid){
		echo"<font color='#456'>You are already logged in as <b>$username</b>.<br><br><a href=./logout.php>Logout</a> to register new account.</font>";
					
	}
	else
	{
	
	if($_POST['registerbtn']){
		$getuser = $_POST['user'];
		
		$getemail = $_POST['email'];
		
		$password = $_POST['pass'];
		
		$getretypepass = $_POST['retypepass'];
		
		$getspecialcode = $_POST['getspecialcode'];
		
		$online = $_POST['0'];
		
		if($getuser){
			if($getemail){
				if($password){
					if($getretypepass){
						if($password === $getretypepass){
							if((strlen($getemail) >= 7)&&(strstr($getemail,"@"))&&(strstr($getemail,".")) ){
								require ("./connect.php");
								
								$query = mysql_query("SELECT * FROM users2 WHERE username='$getuser'");
								$numrows = mysql_num_rows($query);
								if ($numrows == 0){
								
								$query = mysql_query("SELECT * FROM users2 WHERE email='$getemail'");
								$numrows = mysql_num_rows($query);
								if ($numrows == 0){
									
									$password = md5(md5("kjfiufj".$password."Fj56fj"));
									
									
									$date = date("F d, Y");
									$code = md5(rand());
									echo "<font color='#456'>You must activate your account using this code<br/>(copy the following code please)</font><br/><font color='#654'>$code</font></br><font color='#456'>from
									<a href='./activate2.php'>Activation Page</a></font>";
									
									mysql_query("INSERT INTO users2 VALUES (
										'','$getuser','$password','$getemail','0','$code','$date','$getspecialcode','$online'
									)");
									
									$query = mysql_query("SELECT * FROM users2 WHERE username='$getuser'");
									$numrows = mysql_num_rows($query);
									
									if($numrows == 1){
										
										$site = "http://localhost/registration";
										$webmaster = "Ziaul <ziaul1891@gmail.com>";
										$headers = "From: $webmaster";
										$subject = "Activate Your Account";
										$message = "Thanks for registering . Click the link below to activate your account.\n";
										$message .= "$site/activate.php?user=$getuser&code=$code\n";
										$message .= "You must activate your account to login.";
										
										if(mail($getemail, $subject, $message, $headers)){
											
											$errormsg = "";
										
											$getuser = "";
											$getemail = "";
											$getspecialcode = "";
										}
										else
											echo "<font color='#456'>An error has occured. Your activation email was not sent.</font>";
									}
									else
										echo "<font color='#456'>An error has occured. Your account was not created</font>";
								}
								else
									echo "<font color='#456'>There is already a user with that email.</font>";
								
								}
								else
									echo "<font color='#456'>There is already a user with that username.</font>";
								
								mysql_close();
							}
							else
								echo"<font color='#456'>You must enter a valid email address to register.</font>";
						}
						else
							 echo "<font color='#456'>Your passwords did not match.</font>";
					
					}
					else
						echo  "<font color='#456'>You must enter your password to register.</font>";
				}
				else
					echo "<font color='#456'>You must enter your password to register.</font>";
			}
			else
				 echo "<font color='#456'>You must enter your email to register.</font>";
		}
		else
			echo"<font color='#456'>Your must enter your username to register.</font></br></br></br>";
	}
	else
	{
	
	echo "By clicking <font color='red'>register</font> you agree to our <a href='./terms.php' target='_blank'>Terms & Services</a>";
	
	echo "<form action='./register2.php' method='post' >
	<table id='tableregistration' >
	<tr>
		<td</td>
		<td><font color='red'>$errormsg</font></td>
	</tr>
	<tr>
		<td>Username:*</td>
		<td><input type='text' name='user' value='$getuser' title='You must enter your username' /></td>
	</tr>
	<tr>
		<td>Email:*</td>
		<td><input type='text' name='email' value='$getemail' title='You must enter your Email address' /></td>
	</tr>
	<tr>
		<td>Password:*</td>
		<td><input type='password' name='pass' value='' title='You must enter your password' /></td>
	</tr>
	<tr>
		<td>Retype:*</td>
		<td><input type='password' name='retypepass' value='' title='You must retype your password' /></td>
		</br></br>
	</tr>
	
	<tr>
		<td>Spcial Code: </td>
		<td><input type='text' name='getspecialcode' value='$getspecialcode' title='Special Code is not a must, but it should be entered because it will be used to recover your password if you ever forget it.
	You can register without filling that field, but we suggest to fill in.' /></td>
		</br></br>
	</tr>
	
	<tr>
		<td></td>
		
		<td><input class='register' type='submit' name='registerbtn' value='Register' /></td>
	</tr>
	
		
		
		
	
	
	</table>
	
	</form>";
	
	}
	//echo $form;
	
		
	}
	
	?>
	
	
</div>
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 </br>

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
