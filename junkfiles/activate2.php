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
     
	 
	 
	 
	 
		<div class="activate-form">
<h1>Activate Your Account</h1>
	<?php
	
	if($username && $userid){
		echo"<font color='#456'>You are already logged in as <b>$username</b>.No need to activate your account.</font>";
					
	}
	else{
	
	$getuser = $_GET['user'];
	
	$getcode = $_GET['code'];
	
	
	
	if($_POST['activatebtn']){
		$getuser = $_POST['user'];
		
		$getcode = $_POST['code'];
		
		if($getuser){
			if($getcode){
				require("./connect.php");
				
				$query = mysql_query("SELECT * FROM users2 WHERE username = '$getuser'");
				$numrows = mysql_num_rows($query);
				if($numrows == 1){
					$row = mysql_fetch_assoc($query);
					$dbcode = $row['code'];
					$dbactive = $row['active'];
					
					if($dbactive == 0){
						if($dbcode == $getcode){
							mysql_query("UPDATE users2 SET active = '1' WHERE username = '$getuser'");
							$query = mysql_query("SELECT * FROM users2 WHERE username = '$getuser' AND active = '1'");
							$numrows = mysql_num_rows($query);
							if($numrows == 1){
								echo"<font color='#456'>Your account has been activated.You may now </font><a href='./login2.php'>login.</a>";
								$getuser = "";
								$getcode = "";
							}
							else
								echo "<font color='#456'>Error occured. Account not activated.</font>";
						}
						else
							echo"<font color='#456'>Your code is incorrect.</font>";
					}
					else
						echo"<font color='#456'>This account is already active.</font>";
				}
				else
					echo "<font color='#456'>The username you entered was not found.</font>";
				
				mysql_close();
			
			}
			else
				echo"<font color='#456'>You must enter your code.</font>";
		}
		else
			echo "<font color='#456'>You must enter your username.</font>";
	}
	else
		//$errormsg = "";
		echo  "<form action ='./activate2.php' method='post'>
	<table id='tableactivate'>
	
	<tr>
		<td></td>
		<td>$errormsg</td>
	
	</tr>
	<tr>
		<td>Username:</td>
		<td><input type='text' name='user' value = '$getuser'/></td>
	
	</tr>
	
	<tr>
		<td>Code:</td>
		<td><input type='text'  name='code' value ='$getcode'/></td>
	
	</tr>
	
	<tr>
		<td></td>
		<td><input class='activate' type='submit' name='activatebtn' value = 'Activate'/></td>
	
	</tr>
	</table>
	</form>";
	
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
