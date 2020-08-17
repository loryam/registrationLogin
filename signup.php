<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="style.css">
	<script type= "text/javascript" src = "include/countries.js"></script>
	<script type= "text/javascript" src = "include/register.js"></script>

	<title> SEND MONEY REQUEST</title>
</head>
<body>
	<main>
		<div id="first">
			<h1> Registration</h1>
		<form class= "Registration-form" action = "register.php" onsubmit=" return validateForm(this);" method="post"> 
		<input id="fname" type="text" name="username" placeholder="Enter your Username">
		<h6> You must be Reisident to register in this Country</h6>
		<h3>Select Country:</h3><select onchange="print_state('state',this.selectedIndex);" id="country" name ="country"></select>
		
		<h3>City/District/State:</h3> <select name ="region" id ="state"></select>
		<script language="javascript">print_country("country");</script>
		
		<input id="fname"type="email" name="userMail" placeholder="Your Email ">
		<input id="fname"type="email" name="emailRepeat" placeholder="Repeat Your Email ">
		<input id="fname"type="password" name="password" placeholder="Your password">
		<input id="fname"type="password" name="passwordRepeat" placeholder="Repeat Password">
		<input id="submit" type="submit" name="submit-registration" value="Submit"></input>

		</form>
	</div>
	</main>

</body>
</html> 