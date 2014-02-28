<?php

$db_host = "localhost";
$db_username = "root";
$db_name = "book";
$db_password = "";

$con=@mysqli_connect($db_host, $db_username, $db_password, $db_name);

if(mysqli_connect_errno())
	{
	echo "Failed MySQL connect" . mysqli_connect_error();	
	}

	
?>