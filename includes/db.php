<?php

	$server = "sql108.epizy.com";
	$username ="epiz_30363162";
	$password = "zg9Y0y7U7IPtKT";
	$dbname = "epiz_30363162_cinemacerce";

	$conn = mysql_connect($server, $username, $password, $dbname);

	if(!$conn){
		die("Connection Failed: ".mysqli_connect_error());
	}

?>
