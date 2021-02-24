<?php
error_reporting(E_ALL^E_NOTICE);

error_reporting(0);

session_start();
$userid = $_SESSION['userid'];
$username = $_SESSION['username'];

?>


<div id="user">
<?php
if($username && $userid){
		echo "<font color='#3399FF'><b>$username</b></font>, <font color='white'>Click <a href='./logout.php'>Logout   </a>to Logout</font>";
		
	}

	

?>
</div>



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
  
<script>

function submitChat(){
		
		if(form1.msg.value == '' ){
				alert('Enter Your Message');
				return;
			}
			
			$('#imageload').show();
		
			var msg = form1.msg.value;
			
			var xmlhttp = new XMLHttpRequest();
			
			xmlhttp.onreadystatechange = function(){
					if(xmlhttp.readyState==4&&xmlhttp.status==200){
							document.getElementById('chatlogs').innerHTML = xmlhttp.responseText;
							$('#imageload').hide();
							
							
						}
				}
			xmlhttp.open('GET','insert.php?&msg='+msg,true);
			xmlhttp.send();
			
	}
	
	$(document).ready(function(e) {
        $.ajaxSetup({cache:false});
		setInterval(function() {$('#chatlogs').load('logs.php');}, 2000);
    });

</script>
  <style>
	
	.content { 
	  text-align: left;
	  width:  930px;;
	  margin: 0 0 15px 0;
	  float: left;
	  font-size: 120%;
	  padding: 14px 0 0 0;
	}
	
	#chatbox{
position:relative;
color:white;
margin-left:36%;

}


.msg{
		color:#FFF;
		
		font-size:15px;
		font-family:Georgia, "Times New Roman", Times, serif;
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
     
		<div id="chatbox">
		
<br/><br/>		
		
<form name="form1" >
<table border = "1" align="center" style="#790: red;border-radius:7px;-moz-border-radius:7px;-webkit-border-radius:7px";>
<tr bgcolor="#6666FF" >
<td align="center" valign="middle"><b>Name</b> </td><td align="center" valign="middle"> <b> <?php echo $_SESSION['username']; ?></b></td>
</tr>

<tr bgcolor="#790">
<td align="center" valign="middle">
<b>Message</b> <br /></td>
<td>
<textarea name="msg"  style="width:200px; height:70px " ></textarea></td>

   

</tr>

<tr>
<td colspan="2" align="center" valign="middle">
<input type="reset" style="font-weight:bold ;background-color:#01b9c1" onclick="submitChat()" class="button" value="Send" ><br /></td>
</tr>
<tr>
<td colspan="2" align="center" valign="middle">
<a href="logout.php">Logout</a></td>
</tr>

</table>

</form>
<div id="imageload" style="display:none;">
<img src="1-0.gif" />
</div>
<br/><br/>
<div id="chatlogs" style="width:100%; text-align:center">
LOADING CHATLOGS PLEASE WAIT... <img src="1-0.gif" />
</div>
	
	
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
