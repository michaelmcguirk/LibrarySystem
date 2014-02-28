<!DOCTYPE html>
<html>
<head>
<link href="main.css" rel="stylesheet" type="text/css" />
</head>
<body>
<?php

require_once "db.php";
include "header.html";

$userName = mysqli_real_escape_string($con, $_POST["regUsername"]);
$regPassword = mysqli_real_escape_string($con, $_POST["regPassword"]);
$confirmRegPassword = mysqli_real_escape_string($con, $_POST["confirmPassword"]);
$firstName = mysqli_real_escape_string ($con, $_POST["firstName"]);
$lastName = mysqli_real_escape_string($con, $_POST["lastName"]);
$address1 = mysqli_real_escape_string($con, $_POST["add1"]);
$address2 = mysqli_real_escape_string($con, $_POST["add2"]);
$telephone = mysqli_real_escape_string($con, $_POST["telephone"]);
$mobileNo = mysqli_real_escape_string($con, $_POST["mobilePhone"]);
	

if(($regPassword == $confirmRegPassword) & (strlen($regPassword) == 6) & (is_numeric($mobileNo)) & (strlen($mobileNo) == 10) )
{
	//get count of users with desired username. if > 0, then username is taken.
	$sql = 'SELECT * FROM users where Username = "'.$userName.'"';
	$res = mysqli_query($con,$sql);
	if($res && mysqli_num_rows($res)>0)
	{
		echo "Username is already taken. <a href='index.php'>Please try again</a>";
	}
	else
	{
		//if username is not taken, add user details to database.
		$sql="INSERT INTO users (Username, Password, FirstName, Surname, AddressLine1, AddressLine2, Telephone, Mobile)
		VALUES
		('" . $userName . "','" . $confirmRegPassword . "','" . $firstName . "','" . $lastName . "','" . $address1. "','" . $address2 . "','" . $telephone . "','" . $mobileNo . "')";

		if (!mysqli_query($con,$sql))
		  {
		  die('Error: ' . mysqli_error($con));
		  }
		echo "You have been added as a new user.</br>";
		echo "Thank you for Registering, "  . $firstName . ". ";
		echo "Please click <a href='index.php'>here</a> to Login";
	}
}
else
{
	//messages returned to user if they have not registered details correctly
	if(strlen($regPassword) != 6)
	{
		echo "* Password must be 6 Characters</br>";
	}
	if($regPassword !== $confirmRegPassword)
	{
		echo "* Passwords did not match</br>";
	}
	if((!is_numeric($mobileNo)) or (strlen($mobileNo) !== 10))
	{
		echo "* Please enter a vaild mobile Number</br>";
	}
	echo "Please <a href='index.php'>Try Again</a>";
}

mysqli_close($con);

?>
</body>
</html>