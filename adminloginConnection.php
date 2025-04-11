<?php
include("connect.php");
if(isset($_POST['submitdata'])){
$username = $_POST['username'];
$password= $_POST['password'];


$submitdata = "select * from adminlogin where username = '$username' and password = '$password'";
$result = mysqli_query($conn, $submitdata);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
$count = mysqli_num_rows($result);

if ($count>=1){
    $_SESSION['login_message'] = 'Successfully logged in.';
    echo "<script>alert('Successfully login')</script>";
    header('location:adminhomepage.php');

}
else{
    $_SESSION['login_message'] = 'Invalid password or username';
    echo "<script>alert('Login failed:Invalid username or password')</script>";
    header('location:adminlogin.php');

}
}


?>
