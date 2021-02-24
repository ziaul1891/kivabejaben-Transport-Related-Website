<html>
<h1 align="center">Online Users</h1>
		<marquee scrollamount="7" onmouseover="this.scrollAmount='0'" onmouseout="this.scrollAmount='6'" direction="up" loop="true" height="225" width="200" align="middle" >
			
			
			<?php
			
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
			
			?>
	   
		</marquee>
		</html>