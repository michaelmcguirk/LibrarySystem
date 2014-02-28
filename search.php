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

//if-statements to check if a search field is empty.
if(!empty($_POST["bookTitle"]))
{
	$bookTitle = mysqli_real_escape_string($con, $_POST["bookTitle"]);
}
else
{
	$bookTitle = "~";
	echo $bookTitle;
}

if(!empty($_POST["bookAuthor"]))
{
	$bookAuthor = mysqli_real_escape_string($con, $_POST["bookAuthor"]);
}
else
{
	$bookAuthor = "~";
	echo $bookAuthor;
}

if(!empty($_POST["category"]))
{
	$category = mysqli_real_escape_string($con, $_POST["category"]);
}
else
{
	$category= "~";
}

	echo "Didn't find what you were looking for? <a href='userhome.php'>New Search</a>";
	//category using SQL Natural Join to return category name in search results instead of category number
	$query = "Select * From books NATURAL JOIN categories where categories.CategoryDesc LIKE '%" .$category ."%' OR books.BookTitle LIKE '%" .$bookTitle ."%' OR books.Author LIKE '%" .$bookAuthor."%'";
	$result=mysqli_query($con, $query) or die(mysqli_error());
	
	echo '<table border="1" width="95%" align="center">'."\n";
	echo "<tr><th>ISBN</th><th>Title</th><th>Author</th><th>Edition</th><th>Year</th><th>Category</th><th>Reserved</th><th>Reserve?</th><tr>";
	
	while($row = mysqli_fetch_array($result, MYSQLI_BOTH)){
	echo "<tr><td>";
	echo(htmlentities($row[1]));
	echo("</td><td>");
	echo(htmlentities($row[2]));
	echo("</td><td>");
	echo(htmlentities($row[3]));
	echo("</td><td>\n");
	echo(htmlentities($row[4]));
	echo("</td><td>\n");
	echo(htmlentities($row[5]));
	echo("</td><td>\n");
	echo(htmlentities($row[7]));
	echo("</td><td>\n");
	echo(htmlentities($row[6]));
	If($row[6]!= 'Y')
	{
		echo("</td><td>\n");
		echo('<a href="reserve.php?id='.htmlentities($row[1]).'">Reserve</a>');
	}
	else
	{
		echo("</td><td>\n");
		echo("Not Available");
	}
	echo("</td></tr>\n");
}
echo "</br>";
echo "</br>";
mysqli_close($con);

?>

</body>
</html>