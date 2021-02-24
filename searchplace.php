<?php
error_reporting(E_ALL^E_NOTICE);

error_reporting(0);

session_start();
$userid = $_SESSION['userid'];
$username = $_SESSION['username'];

?>






<html>

<head>
  <title>KivabeJaben-Search</title>
  <meta name="description" content="website description" />
  <meta name="keywords" content="website keywords, website keywords" />
  <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
  <link rel="stylesheet" type="text/css" href="css/styleregistrationfull.css" />
   <link rel="stylesheet" type="text/css" href="css/styleregistrationform.css" />
 
  <!-- modernizr enables HTML5 elements and feature detects -->
  <script type="text/javascript" src="js/modernizr-1.5.min.js"></script>
  
<script>

	
function findmatch(){

	if(window.XMLHttpRequest){
	xmlhttp=new XMLHttpRequest();	

	}else{
	xmlhttp=new ActiveXObject('Microsoft.XMLHTTP');
	}
	
	xmlhttp.onreadystatechange=function(){
		if(xmlhttp.readyState==4 && xmlhttp.status==200){
		
		document.getElementById('results').innerHTML = xmlhttp.responseText;
		}
	}
	
	xmlhttp.open('GET','search.inc.php?search_text='+document.search.search_text.value,true);
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
	#searchoption h1 {
    color:lightblue;
    font-family:verdana;
    font-size:250%;
	font-weight:bold;
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
     
	
	
	
	
	
<div id="searchoption" align="center">	

<h1>Search</h1>
<?php
$con=mysqli_connect("localhost","root","","company");
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
if ($con=mysql_connect('localhost','root','')){
	if($con=mysql_select_db('company')){
	
		
		
		
		
		
		//$query = "SELECT ID,FirstName,LastName FROM Persons WHERE FirstName  
		//LIKE '%".mysql_real_escape_string($search_text)."%' ORDER BY FirstName";
		
		
		//$query = "SELECT ID, id * RAND(rand()) AS random_no, FirstName FROM Persons2 ORDER BY random_no asc limit 3";
		
		$query = "SELECT * from (
   SELECT Bus_id,Source1,Destination1  FROM bts 
  
   ORDER BY Source1 asc LIMIT 50
) T ORDER BY RAND() 
LIMIT 15";
		
		
		$query_run = mysql_query($query);
		
		
		
		
		while($query_row = mysql_fetch_array($query_run)){
			
			
			$id = $query_row['Bus_id'];
			$name = $query_row['Source1'];
			$name1 = $query_row['Destination1'];
			
			


			//echo "<a href='anotherpage.php?id=$id'>$name</a><br />";
			echo "<font size=3>" . "<a href='quickresultfromsearch.php?id=$id'>$name - $name1 <br /></a>" . "</font>";
			
			
	
		}
		
		
		
		
	}
}



//echo "<a href='./actionall.php'>(more...)</a>";
?>



	
<form id="search" name="search"> <br/>
	Type a name to search: <br/><br/>
	<input type="text" size="30"  name="search_text"  placeholder="Search..." onkeyup="findmatch();">
	<br/><br/><br/>		
	<div id="results"></div>
	
	</form>	
	 
</div>	 
	 <br/>

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
