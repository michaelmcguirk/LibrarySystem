<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Welcome to DIT Library Management System</title>
<link href="main.css" rel="stylesheet" type="text/css" />
</head>

<body>

<?php
include "header.html";
require_once "db.php";

?>

<h1 align="center">Search</h1>



<form id="searchForm" name="searchForm" method="post" action="search.php">
 	<div align="center">
 	  <table width="30%" border="0">
 	    <tr>
 	      <td width="47%">Book Title:</td>
 	      <td width="53%"><input type="text" name="bookTitle" ></td>
        </tr>
 	    <tr>
 	      <td> Author:</td>
 	      <td><input type="text" name="bookAuthor"></td>
        </tr>
 	    <tr>
 	      <td>Category:</td>
 	      <td><input type="text" name="category"></td>
        </tr>

 	    <tr>
 	      <td>&nbsp;</td>
 	      <td><input type="submit" value="Search"></td>
        </tr>
      </table>
 	</div>
</form>
</br>
<div align='center'><a href='browse.php'>Browse Entire Collection</a></div>

<h1 align="center">Your Reservations</h1>

<?php


$username = $_SESSION['Username'];
//query to return all books reserved by the user.
$query = "SELECT books.ISBN, books.BookTitle, reservations.ReservedDate, reservations.UserName FROM reservations NATURAL JOIN books WHERE reservations.UserName ='".$username."'";

$result=mysqli_query($con, $query);

if($result && mysqli_num_rows($result)>0)
{

	echo '<table border="1" align="center">'."\n";
	echo "<tr><th>ISBN</th><th>Title</th><th>Date</th><th>UserName</th><th></th><tr>";
	echo '<align="center">';

	while($row = mysqli_fetch_array($result, MYSQLI_BOTH)){
		echo "<tr><td>";
		echo(htmlentities($row[0]));
		echo("</td><td>");
		echo(htmlentities($row[1]));
		echo("</td><td>");
		echo(htmlentities($row[2]));
		echo("</td><td>\n");
		echo(htmlentities($row[3]));
		echo("</td><td>\n");
		echo('<a href="deletereservation.php?id='.htmlentities($row[0]).'">Remove</a>');
		echo("</td></tr>\n");
	}
	}
else
{
	echo "<div align='center'> You have no Reservations at present</div>";
}
?>

</body>
</html>