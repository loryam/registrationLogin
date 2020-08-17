<?php
require_once 'connect.php';

if(isset($_POST['submit-registration'])){
    $username = $_POST['username'];
    $country = $_POST['country'];
    $region = $_POST['region'];
    $email = $_POST['userMail'];
    $password = $_POST['password'];
    $passwordRepeat = $_POST['passwordRepeat'];


    if(empty($username)||empty($country)|| empty($region)||
      empty($email)|| empty($password)|| empty($passwordRepeat)){
    header("Location: ../signup.php?error=invalidfields&username");
      exit();

      }
	  
elseif (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/",$username)){

    header("Location: ../signup.php?error=invalidmail&usename".$username);
    exit();
}
elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)){
    header("Location: ../signup.php?error=invalidmail&email=".$email);
    exit();
}
elseif (!preg_match("/^[a-zA-Z0-9]*$/",$username)){
    header("Location: ../signup.php?error=invalidusernamed&username=".$username);
    exit();
}
elseif ($password !== $passwordRepeat){
    header ("Locaton: ../signup.php?error=passwordcheck&username=".$username."&userMail=".$email);
    exit();

} 

else {
    $sql = "SELECT user_name FROM transfers WHERE user_name=?";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)){
        header ("Locaton: ../signup.php?error=SQLerror=");
        exit();
    } 

     else{
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        $resultCheck = mysqli_stmt_num_rows($stmt);
        if($resultCheck > 0){
            header ("Locaton: ../signup.php?error=usernameTaken&email=".$email);
            exit();
        } 
		else{
        $sql = "INSERT INTO users(userName, userEmail, userPassword, userCountry, userRegion) VALUES (?, ? ,?, ?, ?)";
        $stmt = mysqli_stmt_init($conn);
        
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header ("Locaton: ../signup.php?error=sqlerror");
            exit();
        }
        else {
        $hashedpwd = password_hash($password, PASSWORD_DEFAULT);
        mysqli_stmt_bind_param($stmt, "sssss", $username, $email, $password, $country, $region);
        mysqli_stmt_execute($stmt);
        header ("locaton: ../signup.php?singup=success");
        exit();

              }
             }
            }
        }
	
		mysqli_stmt_close($stmt);
		mysqli_close($con);

	    }

?>
