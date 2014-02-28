<?php
header("refresh:3, url=userhome.php");
?>
<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Welcome to DIT Library Management System</title>
<link href="main.css" rel="stylesheet" type="text/css" />
</head>
<body>

<?php
require_once "db.php";
include "header.html";

$id = mysqli_real_escape_string($con, $_GET['id']);
$username = $_SESSION['Username'];
$date = date("Y/m/d");
$query2 = "Insert INTO reservations VALUES ('$id', '$username', '$date')";
$query1 = "UPDATE books SET Reserved='Y' WHERE ISBN = '$id'";
//$result=mysqli_query($con, $query) or die(mysqli_error());

mysqli_query($con, $query1);
mysqli_query($con, $query2);

mysqli_close($con);

Echo "$id Reserved</br>";
Echo "You will be redirected shortly</br>";
Echo "If you are not automatically redirected, please click <a href='userhome.php'>Here</a>";

?>
</body>
</html>