<?php

session_start();

	
	
	if(isset($_SESSION['loggedin'])){
		
	//	header( "location: sendRequest.php");
	}


?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="style.css">
	<script src="include/login.js" type="text/javascript"></script>

	<title> LOG IN</title>
</head>

<div id="first">
			<p class= loginText>Log In Here </p>
<form name = "login" class= "signin-form" action = "signin.php" onsubmit="return validateForm(this);" method="post"> 
<input id="fname" type="text" name="username" placeholder="Email/Username">
<input id="fname" type="password" name="pwd" placeholder="Password">
<input id="submit" type="submit" name="login-submit" value="Submit"></input>

	</form>

	</div>

	