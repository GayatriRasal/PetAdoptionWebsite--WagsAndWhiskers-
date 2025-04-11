<?php
// Check if form is submitted
if (isset($_POST['submitdata'])) {
    include "connect.php"; // Include database connection file

    // Retrieve form data using $_POST
    $username = $_POST['username'];
    $email = $_POST['gmail']; // Fix typo in 'email' variable name
    $password = $_POST['password'];
    $cpassword = $_POST['cpass']; // Fix variable name for confirm password

    // Validate if username already exists
    $queryUsername = "SELECT * FROM userlogin WHERE username='$username'";
    $resultUsername = mysqli_query($conn, $queryUsername);
    $countUser = mysqli_num_rows($resultUsername);

    // Validate if email already exists
    $queryEmail = "SELECT * FROM userlogin WHERE gmail='$email'";
    $resultEmail = mysqli_query($conn, $queryEmail);
    $countEmail = mysqli_num_rows($resultEmail);

    // Check if username or email already exists
    if ($countUser > 0 || $countEmail > 0) {
        echo "<script>alert('Username or Email already exists!');</script>";
        header('Location: signin.php');
        exit;
    }

    // Check if passwords match
    if ($password !== $cpassword) {
        echo "<script>alert('Passwords do not match!');</script>";
        header('Location: signin.php');
        exit;
    }

    // Hash the password for security
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Insert new user into 'userlogin' table
    $insertUserQuery = "INSERT INTO userlogin (username, gmail, password) VALUES ('$username', '$email', '$hashedPassword')";
    
    if (mysqli_query($conn, $insertUserQuery)) {
        echo "<script>alert('User registered successfully!');</script>";
        header('Location: AllDogInfo.php');
        exit;
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    // Close database connection
    mysqli_close($conn);
} else {
    // Redirect if form is not submitted
    header('Location: signin.php');
    exit;
}
?>
