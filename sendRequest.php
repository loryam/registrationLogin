<?php


	require_once 'connect.php';

	session_start();

	
	
	if(!isset($_SESSION['loggedin'])){
		$_SESSION[ 'msg'] = "You must be logged in to access this page";
		//header( "location: login.php");
	}

	/*if (isset($_GET['logout'])){
		
		session_destroy();
		unset($_SESSION[ 'username']);
		header("location: login.php");
	}  */
	








?>
<!DOCTYPE html>
<html> 
<head>
	<title>SEND MONEY</title>
	<link rel="stylesheet" type="text/css" href="style.css">
		<script type= "text/javascript" src = "include/countries.js"></script>
		<script type="text/javascript" src="include/main.js"></script>
</head>
<body>
	<main>
		<div id="first">
		<form class= "Transaction Form" action = "send.php" onsubmit="return validateForm(this);"  method="post"> 
			<input id="fname" type="text" name="firstName" placeholder="First Name">
			<input id="fname" type="text" name="middleName" placeholder="Middle Name">
			<input id="fname" type="text" name="lastName" placeholder="last Name">
			<h3>Select Country:</h3><select onchange="print_state('state',this.selectedIndex);" id="country" name ="country" ></select>
		
			<h3>City/Region/State:</h3> <select name ="region" id ="state"></select>
			<script language="javascript">print_country("country");</script>
			<input id="fname" type="text" name="address" placeholder="Address">
			<input id="fname" type="number" name="amount" placeholder="Amount to Send">

           	<input type="radio" name="currency" value="USD"> USD
            <input type="radio" name="currency" value="EURO"> ERUO
            <input type="radio" name="currency" value="POUNDS"> POUNDS
           	<br>
           	<br>
            <label for="signature">Sign here with your full name</label>
            <input id="fname" type="text" name="fullName" placeholder="Your Full Name">

            <label for="know-person">Do you Know know the person you are sending the money to?</label>
            <br>
            <br>
            YES
            <input id="fname" type="radio" name="knowPerson" value="YES" >
            <br>
            NO
            <br>
			<input id="fname" type="radio" name="knowPerson" value="NO">
			<br>
			


			<p class = "genCode">
			<?php
				// FUNCTION TO GENERATE CODE FOR AUTHENTICATION
						function rand_code($len)
						{

						$min_lenght= 0;
						$max_lenght = 100;
						$bigL = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
						$number = "0123456789";
						$bigB = str_shuffle($bigL);
						$numberS = str_shuffle($number);
						$subA = substr($bigB,0,5);
						$subB = substr($bigB,6,5);
						$subC = substr($bigB,10,5);
						$subG = substr($numberS,0,5);
						$subH = substr($numberS,6,5);
						$subI = substr($numberS,10,5);
						$RandCode1 = str_shuffle($subA.$subB.$subC.$subG.$subH.$subI);
						$RandCode2 = str_shuffle($RandCode1);
						$RandCode = $RandCode1.$RandCode2;
						if ($len>$min_lenght && $len<$max_lenght)
						{
						$CodeEX = substr($RandCode,0,$len);
						}
						else
						{
						$CodeEX = $RandCode;
						}
						return $CodeEX;
						
						}

						$code = rand_code(6);
						echo $code;
				?>


<script type="text/javascript"> 

                        var code = "<?php echo $code ; ?>";

                        if(form.uniqueCode.value !=  "<?php echo $code ; ?>"){
	       				 alert("Error: Please Enter the Correct code")
					     form.uniqueCode.focus();
					     return false;
    }

                        </script>

 				</p>
			<input id="fname" type="text" name="uniqueCode" placeholder="Enter Generated Transaction Code">
			
            <h6 class="note"> NOTE: Funds received by customer is not subjected for refunds if you don't know who you are sending the money too</h6>
			<input id="submit" type="submit" value="SEND NOW">
		
		</form>
		
	</div>
	</main>
</body> 
</html>
