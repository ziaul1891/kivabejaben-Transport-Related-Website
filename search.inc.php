<?php



if(isset($_GET['search_text'])){

$search_text = $_GET['search_text'];

}


if(!empty($search_text)){

if ($con=mysql_connect('localhost','root','')){
	if($con=mysql_select_db('company')){
	
		
		
		
		
		
		//$query = "SELECT ID,FirstName,LastName FROM Persons WHERE FirstName  
		//LIKE '%".mysql_real_escape_string($search_text)."%' ORDER BY FirstName";
		
		//$query = "SELECT Id,Name FROM Romantic WHERE Name  
		//LIKE '".mysql_real_escape_string($search_text)."%'";
		
		
		$query = "SELECT Bus_id,Source1,Destination1,Source2,Destination2 FROM bts WHERE (Source1  
		LIKE '".($search_text)."%' OR Destination1 LIKE '".($search_text)."%' 
		
		OR CONCAT(Source1,' ',Destination1) LIKE '".($search_text)."%' OR CONCAT(Source1,Destination1) LIKE '".($search_text)."%')
		
		ORDER by Destination1 asc
		
		"
		;
		
		
		$query_run = mysql_query($query) ;
		
		
		
		while($query_row = mysql_fetch_array($query_run)){
			
			
			$id = $query_row['Bus_id'];
			$name = $query_row['Source1'];
			$name1 = $query_row['Destination1'];
			$name2 = $query_row['Source2'];
			$name3 = $query_row['Destination2'];
			

			//echo "<font size='6'><a href='resultromantic.php?id=$id'>$name</a><br /></font>";
			echo "<font size='4'><a href='quickresultfromsearch.php?id=$id'>$name and $name1<br /></a>"."</font>";
			
			
			
	
		}
		
		
		
		
	}
}

}




?>