<html>
<body>
<?php

require_once "db.php";
include "header.html";

$userName = mysqli_real_escape_string($con, $_POST["userName"]);
$loginPassword = mysqli_real_escape_string($con, $_POST["password"]);

//get count of rows with the username that the user has entered. if > 0, then user exists
$sql = "Select count(*) from users where(Username ='".$userName."' and Password ='".$loginPassword."')";

$query = mysqli_query($con, $sql);
$result = mysqli_fetch_array($query, MYSQLI_BOTH);

if($result[0]>0)
{
	echo "Successful Login</br>";
	echo "Welcome " . $userName . ".</br>";
	echo "You will now be redireced to your home page</br>";
	echo "If you are not automatically redirected, please click <a href='userhome.php'>Here</a>";
	$_SESSION['Username'] = $userName;
	header("refresh:5, url=userhome.php");	//redirect to userhome.php
}
else
{
	echo "Login Failed</br>";
	echo "<a href='index.php'>Try Again</a>";
}
mysqli_close($con);
?>

</body>
</html>