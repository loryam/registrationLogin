<?php

        require_once 'connect.php';

          $firstname =  mysqli_real_escape_string($conn, $_POST['firstName']);
          $middleName = mysqli_real_escape_string($conn, $_POST['middleName']);
          $lastName =   mysqli_real_escape_string($conn, $_POST['lastName']);
          $country =    mysqli_real_escape_string($conn, $_POST['country']);
          $region =     mysqli_real_escape_string($conn, $_POST['region']);
          $address =    mysqli_real_escape_string($conn, $_POST['address']);
          $amount =     mysqli_real_escape_string($conn, $_POST['amount']);
          $currency =   mysqli_real_escape_string($conn, $_POST['currency']);
          $fullName =   mysqli_real_escape_string($conn, $_POST['fullName']);
          $knowPerson = mysqli_real_escape_string($conn, $_POST['knowPerson']);
          $uniqueCode = mysqli_real_escape_string($conn, $_POST['uniqueCode']);


          // CHECKING FOR EMPTY FORM FIELDS

          if(empty($firstname)||
              empty($middleName)|| 
              empty($lastName)||
              empty($address)|| 
              empty($country)|| 
              empty($region)|| 
              empty($amount)|| 
              empty($currency)||
              empty($fullName) ||
              empty($knowPerson)||
              empty($uniqueCode)){
              echo "Please make sure all the fields are filled";
             //header("Location: sendRequest.php");
              exit();
             }
            // INSERTING INTO DATABASE

              $stmt = $conn->prepare("INSERT INTO payments (firstName, middleName, lastName,country, rstate, rAddress,
              amount, currency, fullName, knowPerson, uniqueCode)
               VALUES (?, ? ,?, ?, ?, ?, ?, ?, ?, ?, ?)");

                $stmt->bind_param("ssssssdssss", $firstname, $middleName, $lastName, $country, $region, $address,
                                         $amount, $currency, $fullName, $knowPerson, $uniqueCode);
                

                if (!$stmt->execute()) {
                      echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
                  }
                  else{
                    echo "Data Inserted Successfuly";
                  }

                $stmt->close();
                $conn->close();
              

?>