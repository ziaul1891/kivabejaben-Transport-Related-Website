<?php

session_start();
$username = $_SESSION['username'];
$msg = $_REQUEST['msg'];

$con = mysql_connect('localhost','root','');
mysql_select_db('company',$con);

mysql_query("INSERT INTO logs (`username` , `msg`) VALUES ('$username','$msg')");

$result1 = mysql_query("SELECT * FROM logs ORDER by id DESC limit 10");

while($extract = mysql_fetch_array($result1)){
		echo "<span class='uname'><font color='#3399FF' size='4px'><b>" . $extract['username'] . "</b></font></span>: <span class='msg'><font size=4>" . $extract['msg'] . "</font></span><br>";
	}




?>