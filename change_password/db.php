<?php

	$host="localhost";
	$user="root";
	$password="";
	$db_name="ams";
	$connection=mysqli_connect($host,$user,$password,$db_name);
	
	
	if(!$connection)
	{
		die("Connection Failed".mysqli_connect_error());
	}
	



?>

