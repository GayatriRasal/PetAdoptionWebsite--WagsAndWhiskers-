<?php
include 'connect.php';



// Process form submission
if (isset($_POST['submitdata'])) {
    // Retrieve form data
    $fname =mysqli_real_escape_string($conn, $_POST['FirstName']);
    $lname =mysqli_real_escape_string($conn, $_POST['LastName']);
    $email = mysqli_real_escape_string($conn,$_POST['gmail']);
    $aadhar =mysqli_real_escape_string($conn, $_POST['AadharNumber']);
    $contact = mysqli_real_escape_string($conn,$_POST['ContactNumber']);
    $birth_date =mysqli_real_escape_string($conn, $_POST['DateOfBirth']);
    $age = mysqli_real_escape_string($conn,$_POST['Age']);
    $address = mysqli_real_escape_string($conn,$_POST['Addresss']);
    $pincode = mysqli_real_escape_string($conn,$_POST['PinCode']);
    $id = $_GET['updateid'];
    
  
   
    // Prepare SQL statement to insert data into database
    $submitdata = "INSERT INTO `adopter_information` (FirstName,LastName, gmail, AadharNumber, ContactNumber, DateOfBirth, Age, Addresss, PinCode, TimeOfApplSubmission,updateid)
            VALUES ('$name','$lname', '$email', '$aadhar', '$contact', '$birth_date', '$age', '$address', '$pincode',  NOW(),'$id')";



  $result_query = mysqli_query($conn, $submitdata);
    if ($result_query) {
      echo "<script>alert('Successfully inserted data')</script>";
      header('location:read.php');
    } else {
      echo "Error: " . mysqli_error($conn); // Provide more specific error message
    }

    mysqli_close($conn);
} else {
    echo "<script>alert('Invalid request')</script>";
}
?>
