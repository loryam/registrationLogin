<?php

        require_once 'connect.php';
        

    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $country =  mysqli_real_escape_string($conn, $_POST['country']);
    $region =   mysqli_real_escape_string($conn, $_POST['region']);
    $email =    mysqli_real_escape_string($conn, $_POST['userMail']);
    $emailRepeat =    mysqli_real_escape_string($conn, $_POST['emailRepeat']);
    $password = mysqli_real_escape_string($conn,$_POST['password']);
    $passwordRepeat = mysqli_real_escape_string($conn, $_POST['passwordRepeat']);

                // form Validation
                if(empty($username)||
                empty($country)|| 
                empty($region)||
                empty($email)||
                empty($emailRepeat)||
                empty($password)|| 
                empty($passwordRepeat)){
            header("Location: signup.php?error=invalidfields&username");
            exit();

            }


            //checking for Exact Email Address

            if ($email !== $emailRepeat){
                echo "Please make sure your two Email Addresses are the same";
                exit();
            }

            // checking for exact password
            if ($password !== $passwordRepeat){
                echo "Please make sure your two passwords are the same";
                exit();
            }

            // Checking if User name already exists
            
            $stmt = $conn->prepare("SELECT * FROM users WHERE userName = ?");
            $stmt->bind_param("s", $username);
            $stmt->execute();
            $result = $stmt->store_result();

            if( $stmt->num_rows > 0){
                    echo "Username already taken, please choose another user name";
                }
           

            // INSERTING INTO THE DATABASE
         else if ($stmt = $conn->prepare("INSERT INTO users (userName, userEmail, userPassword, userCountry, userRegion)
                                    VALUES (?,?,?,?,?)")){
                     //Hashing the password
            $hashedpwd = password_hash($password, PASSWORD_DEFAULT);
            $stmt->bind_param("sssss", $username, $email, $hashedpwd, $country, $region);


           if (!$stmt->execute()) {
                 echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
                }
                
            $stmt->close();
            $conn->close();
            }
           
        // Feedback to Use goes here
?>
 