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
   SELECT employee_id,Source1,Destination1  FROM employee 
  
   ORDER BY Source1 asc LIMIT 50
) T ORDER BY RAND() 
LIMIT 15";
		
		
		$query_run = mysql_query($query);
		
		
		
		
		while($query_row = mysql_fetch_array($query_run)){
			
			
			$id = $query_row['employee_id'];
			$name = $query_row['Source1'];
			$name1 = $query_row['Destination1'];
			
			


			//echo "<a href='anotherpage.php?id=$id'>$name</a><br />";
			echo "<font size=3>" . "<a href='searchquick.php?id=$id'>$name - $name1 <br /></a>" . "</font>";
			
			
	
		}
		
		
		
		
	}
}



//echo "<a href='./actionall.php'>(more...)</a>";
?>

<html>
<head>
	
<script type="text/javascript">

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
</script>
</head>
<body>

<form id="search" name="search">
	Type a name to search: <br/><br/>
	<input type="text" size="30"  name="search_text"  placeholder="Search..." onkeyup="findmatch();">
	<br/><br/><br/>		
	<div id="results"></div>
	
	</form>	
	
	
</body>
</html>