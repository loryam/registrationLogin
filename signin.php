<?php
        
        session_start();

      require_once 'connect.php';

       $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password =  mysqli_real_escape_string($conn, $_POST['pwd']);

    // Now we check if the data was submitted, isset will check if the data exists.
if ( !isset($_POST['username'], $_POST['pwd']) ) {
    // Could not get the data that should have been sent.
    die ('Username and/or password does not exist!');
}
// Prepare our SQL 
if ($stmt = $conn->prepare('SELECT userName, userPassword FROM users WHERE username = ?')) {
    // Bind parameters (s = string, i = int, b = blob, etc), hash the password using the PHP password_hash function.
    $stmt->bind_param('s', $_POST['username']);
    $stmt->execute(); 
    $stmt->store_result(); 
    
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($username, $password);
        $stmt->fetch();      
        // Account exists, now we verify the password.
        if (password_verify($_POST['pwd'], $password)) {
            // Verification success! User has loggedin!
            $_SESSION['loggedin'] = TRUE;
            $_SESSION['name'] = $_POST['username'];
            $_SESSION['id'] = $username;
            echo 'Welcome ' . $_SESSION['name'] . '!';
            header("Location: welcome.php");
        } else {
            echo 'Incorrect username and/or password!';
        }
    } else {
        echo 'Incorrect username and/or password!';
    }
    $stmt->close();
} else {
    echo 'Could not prepare statement!';
}
?>