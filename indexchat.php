<!DOCTYPE HTML>


<?php
error_reporting(E_ALL^E_NOTICE);

error_reporting(0);

session_start();
$userid = $_SESSION['userid'];
$username = $_SESSION['username'];
?>




<?php
session_start();
if(!isset($_SESSION['username'])){
	header('location:login.php');
	
}

?>





<html>

<head>
  <title>KivabeJaben-Chat</title>
  <meta name="description" content="website description" />
  <meta name="keywords" content="website keywords, website keywords" />
  <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
   <link rel="stylesheet" type="text/css" href="css/styleregistrationfull.css" />
  <!-- modernizr enables HTML5 elements and feature detects -->
  <script type="text/javascript" src="js/modernizr-1.5.min.js"></script>
  <script src="http://code.jquery.com/jquery-1.9.0.js"></script> 
  
  
  

  
  <script>
 
/*for online users view*/  
  
 $(document).ready(function() {
 $('#imageload1').show();
  $.ajaxSetup({ cache: false }); // This part addresses an IE bug.  without it, IE will only load the first number and will never refresh
  setInterval(function() {
  $('#imageload1').hide();
    $('#sidebar1').load('showonline.php');
  }, 3000); // the "3000" 
});
/*for online users view*/ 




/*for chat box Enter press*/ 

function trimfield(str) 
{ 
    return str.replace(/^\s+|\s+$/g,''); 
}


function formatTextArea(textArea) {
        textArea.value = '';
    }

    window.onload = function() {
        var textArea = document.getElementById("crazytext");
		
        textArea.onkeyup = function(evt) {
		
            evt = evt || window.event;

			

            if (evt.keyCode == 13) {
			
			var tag = $("#crazytext").val();
			if(!/\S/.test(tag)) {
			 formatTextArea(this);
				alert('Enter Your Message');
				
				}
			else
			{
					
			
			$('#imageload').show();
		
			var msg = form1.msg.value;
			
			var xmlhttp = new XMLHttpRequest();
			
			xmlhttp.onreadystatechange = function(){
					if(xmlhttp.readyState==4&&xmlhttp.status==200){
							document.getElementById('chatlogs').innerHTML = xmlhttp.responseText;
							$('#imageload').hide();
							
							
						}
				}
				}
			xmlhttp.open('GET','insert.php?&msg='+msg,true);
			xmlhttp.send();
                formatTextArea(this);
				
            }
			
			
        };
    };





/*for chat box Enter press*/ 




/*for chat box Submit button*/ 

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
	
	

/*for chat box Submit button*/ 


/*for chat logs*/	
	
	$(document).ready(function(e) {
        $.ajaxSetup({cache:false});
		setInterval(function() {$('#chatlogs').load('logs.php');}, 3000);
    });
	
/*for chat logs*/	

</script>
  <style>
  #user{
	position:relative;
	float:right;
	
	}
	
	#chatbox{
position:relative;
color:white;


}

#chatlogs{
position:relative;
color:white;


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
	  
	  
        <div class="sidebar" id="sidebar1">
		<h1 align="center">Online Users</h1>
		<div id="imageload1" style="display:none;" align="center">
		<img src="1-0.gif" />
		</div>
		<!--
		<h1 align="center">Online Users</h1>
		<marquee scrollamount="6" onmouseover="this.scrollAmount='0'" onmouseout="this.scrollAmount='6'" direction="up" loop="true" height="225" width="200" align="middle" >
			
			
			<?php
			/*
mysql_connect("localhost", "root", "")or die("cannot connect to server");
mysql_select_db("company")or die("cannot select DB");

$sql3="SELECT username FROM users where online='1' ORDER by username asc";
$result3=mysql_query($sql3);

while($query_row = mysql_fetch_array($result3)){
			
			
			//$id = $query_row['id'];
			$name = $query_row['username'];
			
			
			


			//echo "<a href='anotherpage.php?id=$id'>$name</a><br />";
			echo "<div align='center'><font size=3 color=yellow >" . "$name<br /><br/>" . "</font></div>";
			
			
	
			}
			*/
			?>
	   
		</marquee>
		-->
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
	  
	  <div id="chatbox">
		
<br/><br/>		
		
<form name="form1" id="form1id" onsubmit="send(this.msg); return false;"  >
<table border = "1" align="center" style="#790: red;border-radius:7px;-moz-border-radius:7px;-webkit-border-radius:7px";>
<tr bgcolor="#6666FF" >
<td align="center" valign="middle"><b>Name</b> </td><td align="center" valign="middle"> <b> <?php echo $_SESSION['username']; ?></b></td>
</tr>

<tr bgcolor="#790">
<td align="center" valign="middle">
<b>Message</b> <br /></td>
<td>
<textarea  id="crazytext" name="msg"  style="width:555px; height:70px " onkeydown="keyCode(event)" ></textarea></td>

   

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
<div id="chatlogs" style="width:100%; text-align:left">
LOADING CHATLOGS PLEASE WAIT... <img src="1-0.gif" />
</div>
	
	
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
