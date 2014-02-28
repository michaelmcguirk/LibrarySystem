<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Welcome to DIT Library Management System</title>
<link href="main.css" rel="stylesheet" type="text/css" />
</head>

<body>
<?php
include "header.html";

?>
<h1 align="center">Please Login or Register</h1>
<p align="center">&nbsp;</p>
<h2 align="center">Login</h2>

<form id="loginForm" name="LoginForm" method="post" action="login.php">
 	<div align="center">
 	  <table width="57%" border="0">
 	    <tr>
 	      <td width="11%">User Name:</td>
 	      <td width="26%"><input type="text" name="userName" ></td>
 	      <td width="13%"> Password:</td>
 	      <td width="34%"><input type="password" name="password"></td>
 	      <td width="16%"><input type="submit" value="Login"></td>
        </tr>
      </table>
 	</div>
</form>
<p align="center">&nbsp;</p>
<p align="center">&nbsp;</p>
<h2 align="center">Register</h2>

<form id="registerForm" name="RegisterForm" method="post" action="register.php">
 	<div align="center">
 	  <table width="30%" border="0">
 	    <tr>
 	      <td width="47%">User Name:*</td>
 	      <td width="53%"><input type="text" name="regUsername" ></td>
        </tr>
 	    <tr>
 	      <td> Password:*</td>
 	      <td><input type="password" name="regPassword"></td>
        </tr>
 	    <tr>
 	      <td>Confirm Password:*</td>
 	      <td><input type="password" name="confirmPassword"></td>
        </tr>
 	    <tr>
 	      <td></br>First Name:</td>
 	      <td><input type="text" name="firstName" ></td>
        </tr>
 	    <tr>
 	      <td>Last Name:</td>
 	      <td><input type="text" name="lastName" ></td>
        </tr>
 	    <tr>
 	      <td>Address 1:</td>
 	      <td><input type="text" name="add1" ></td>
        </tr>
 	    <tr>
 	      <td></br>Address 2:</td>
 	      <td><input type="text" name="add2" ></td>
        </tr>
 	    <tr>
 	      <td> Telephone:</td>
 	      <td><input type="text" name="telephone" ></td>
        </tr>
 	    <tr>
 	      <td>Mobile No:</td>
 	      <td><input type="text" name="mobilePhone" ></td>
        </tr>
 	    <tr>
 	      <td>&nbsp;</td>
 	      <td><input type="submit" value="Register"></td>
        </tr>
      </table>
 	</div>
</form>
<div align='center'>*Password must be 6 characters in length*</div>



</body>
</html>
