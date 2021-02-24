<?php
error_reporting(E_ALL^E_NOTICE);

error_reporting(0);

session_start();
$userid = $_SESSION['userid'];
$username = $_SESSION['username'];

?>





<html>

<head>
  <title>KivabeJaben-Contact US</title>
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
	#tablecontactus{
	position:relative;
	left:20px;
	color:black;
	}
	#commentbox{
	position:relative;
	top:0px;
	left:140px;
	
	}
	#submitbutton
	{
	position:relative;
	left:255px;
	top:10px;
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
     
	 
	 
	 
	 
	 
	<div class="register-form">
<h1>Contact Us</h1>
	
<h3>[ * ] marked fields are necessary</h3>	
	
	<form name="contactform" method="post" action="send_form_email.php" >
	<table id='tablecontactus' >
	
	<tr>
		 <td ><label for="first_name">First Name *</label> </td>
 
		<td> <input  type="text" name="first_name" maxlength="50" size="20"></td>
	</tr>
	
	<tr>
		 <td ><label for="last_name">Last Name *</label> </td>
 
		<td> <input  type="text" name="last_name" maxlength="50" size="20"></td>
	</tr>
	
	
	<tr>
		 <td ><label for="email">Email *</label> </td>
 
		<td> <input  type="text" name="email" maxlength="50" size="20"></td>
	</tr>
	<tr>
		 <td ><label for="telephone">Phone No</label> </td>
 
		<td> <input  type="text" name="telephone" maxlength="50" size="20"></td>
	</tr>
	<tr >
		 <td ><label for="comments">Comments *</label> </td>
 
		<td align="justify"> <textarea id="commentbox"  name="comments" maxlength="1000" cols="30" rows="7"></textarea></td>
	</tr>
	
	<tr>
		<td></td>
		
		<td><input id="submitbutton" type="submit" value="Submit"></td>
	</tr>
	
		
		
		
	
	
	</table>
	
	</form>
	
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
