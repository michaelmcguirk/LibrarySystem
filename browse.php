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

	$sql = "SELECT COUNT(*) FROM books NATURAL JOIN categories";	//get a count of all books in books table
	$query = mysqli_query($con, $sql);
	$row = mysqli_fetch_row($query);
	$rows = $row[0];
	$page_rows = 5;		//max number of results per page
	$last = ceil($rows/$page_rows);	
	
	if($last < 1){
	$last = 1;
}
	$pagenum = 1;
	if(isset($_GET['pn']))
	{
		$pagenum = preg_replace('#[^0-9]#', '', $_GET['pn']);
	}
	
	if ($pagenum < 1) 
	{ 
		$pagenum = 1;
	} 
	else if ($pagenum > $last) 
	{ 
		$pagenum = $last; 
    }
	
	$limit = 'LIMIT ' .($pagenum - 1) * $page_rows .',' .$page_rows;
	
	
	
	
	
	echo "<a href='userhome.php'>New Search</a>";
	$query = "Select * From books NATURAL JOIN categories $limit";	//query with a limit of 5 results
	$result=mysqli_query($con, $query) or die(mysqli_error());
	
	$textline1 = "All Books (<b>$rows</b>)";
	$textline2 = "Page <b>$pagenum</b> of <b>$last</b>";
	
	$paginationCtrls = '';
	
	if($last != 1){
	if ($pagenum > 1) {
        $previous = $pagenum - 1;
		$paginationCtrls .= '<a href="'.$_SERVER['PHP_SELF'].'?pn='.$previous.'">Previous</a> &nbsp; &nbsp; ';
		
		for($i = $pagenum-4; $i < $pagenum; $i++){
			if($i > 0){
		        $paginationCtrls .= '<a href="'.$_SERVER['PHP_SELF'].'?pn='.$i.'">'.$i.'</a> &nbsp; ';
			}
	    }
    }
	
	$paginationCtrls .= ''.$pagenum.' &nbsp; ';
		for($i = $pagenum+1; $i <= $last; $i++){
		$paginationCtrls .= '<a href="'.$_SERVER['PHP_SELF'].'?pn='.$i.'">'.$i.'</a> &nbsp; ';
		if($i >= $pagenum+4){
			break;
		}
	}
	
	    if ($pagenum != $last) {
        $next = $pagenum + 1;
        $paginationCtrls .= ' &nbsp; &nbsp; <a href="'.$_SERVER['PHP_SELF'].'?pn='.$next.'">Next</a> ';
    }
	}
	$list = '';
	
	echo '<table border="1" width="95%" align="center">'."\n";
	echo "<tr><th>ISBN</th><th>Title</th><th>Author</th><th>Edition</th><th>Year</th><th>Category</th><th>Reserved</th><th>Reserve?</th><tr>";
	//display results in a table
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
?>
<div>
  <h2><?php echo $textline1; ?> Paged</h2>
  <p><?php echo $textline2; ?></p>
  <p><?php echo $list; ?></p>
  <div id="pagination_controls"><?php echo $paginationCtrls; ?></div>
</div>

<?php
mysqli_close($con);

?>