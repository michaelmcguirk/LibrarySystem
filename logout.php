<?php
session_start();
session_destroy();
header("refresh:5, url=index.php");
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>LogOut</title>
<link href="main.css" rel="stylesheet" type="text/css" />
</head>
<body>

<?php
include "header.html";

echo "You have been Logged out</br>";
echo "Your browser will redirect you shortly</br>";
echo "If you are not automatically redirected, please click <a href='userhome.php'>Here</a>";

?>

</body>
</html>