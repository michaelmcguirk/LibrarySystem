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

if ( isset($_POST['delete']) && isset($_POST['id']) ) {
	$id = mysqli_real_escape_string($con, $_POST['id']);
	$sql = "DELETE FROM reservations WHERE ISBN = '$id'";	//delete from reservations table
	$sql2 = "UPDATE books SET Reserved='N' WHERE ISBN = '$id'";	//update Reserved column in books table

	mysqli_query($con, $sql);
	mysqli_query($con, $sql2);
	echo "Reservation Removed<br>";
	echo 'Success - <a href="userhome.php">Continue...</a>';
	return;
}

$id = mysqli_real_escape_string($con, $_GET['id']);
$result = mysqli_query($con, "SELECT reservations.ISBN, reservations.UserName, books.BookTitle FROM reservations NATURAL JOIN books WHERE ISBN ='$id'");
$row = mysqli_fetch_row($result);

echo "<p>Are you sure you want to delete the reservation for: $row[0] $row[2]</p>\n";
echo('<form method="post"><input type="hidden" ');
echo('name="id" value="'.htmlentities($row[0]).'">'."\n");
echo('<input type="submit" value="Delete" name="delete">');
echo('<a href="userhome.php">Cancel</a>');
echo("\n</form>\n");
?> 

</body>
</html>