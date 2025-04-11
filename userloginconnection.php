<?php
include("connect.php");

if(isset($_POST['submitdata'])){
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $gmail = mysqli_real_escape_string($conn, $_POST['gmail']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // Prepare and execute the SQL query
    $submitdata = "SELECT * FROM userlogin WHERE username = '$username' AND gmail = '$gmail'";
    $result = mysqli_query($conn, $submitdata);

    if($result) {
        // Check if there is a matching row
        $row = mysqli_fetch_assoc($result);
        
        if ($row) {
            // Verify the password
            $hashedPassword = $row['password'];
            
            if (password_verify($password, $hashedPassword)) {
                // Passwords match, login successful
                echo "<script>alert('Login Successful')</script>";
                // Authentication successful, redirect to AllDogInfo.php
                header('Location: AllDogInfo.php');
                exit(); // Ensure script stops here after redirection
            } else {
                // Passwords do not match
                echo "<script>alert('Login failed: Invalid password')</script>";
                header('Location: login.php'); // Redirect back to login page
                exit();
            }
        } else {
            // No matching user found
            echo "<script>alert('Login failed: Invalid username or email')</script>";
            header('Location: login.php'); // Redirect back to login page
            exit();
        }
    } else {
        // Query execution failed
        echo "Error: " . mysqli_error($conn);
    }
}

// Close database connection
mysqli_close($conn);
?>
