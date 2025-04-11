<?php
include 'connect.php';

// Function to generate a unique applicant ID
function generateUniqueID($conn) {
    $last_id_query = "SELECT MAX(CAST(SUBSTRING(AdopterId, 1, 3) AS UNSIGNED)) AS max_id FROM `adopter information`";
    $last_id_result = mysqli_query($conn, $last_id_query);
    $row = mysqli_fetch_assoc($last_id_result);
    $last_id = $row['max_id'];
    $next_id = $last_id + 1;
    $applicantId = sprintf('%03d', $next_id);
    return $applicantId;
}

//Check if 'petId' is provided in the URL
if (isset($_GET['petId'])) {
    $petId = $_GET['petId']; // Retrieve the pet ID
} else {
    // Redirect or display error message if 'petId' is missing
    echo "<script>alert('Invalid request: Missing pet ID')</script>";
    exit(); // Terminate script execution
}

// Process form submission when the form is submitted
if (isset($_POST['submitdata'])) {
    // Retrieve and sanitize form data
    $fname = mysqli_real_escape_string($conn, $_POST['FirstName']);
    $lname = mysqli_real_escape_string($conn, $_POST['LastName']);
    $email = mysqli_real_escape_string($conn, $_POST['gmail']);
    $aadhar = mysqli_real_escape_string($conn, $_POST['AadharNumber']);
    $contact = mysqli_real_escape_string($conn, $_POST['ContactNumber']);
    $birth_date = mysqli_real_escape_string($conn, $_POST['DateOfBirth']);
    $age = mysqli_real_escape_string($conn, $_POST['Age']);
    $address = mysqli_real_escape_string($conn, $_POST['Addresss']);
    $pincode = mysqli_real_escape_string($conn, $_POST['PinCode']);

    // Check if the provided email exists in userlogin table
    $check_email_query = "SELECT * FROM userlogin WHERE gmail = '$email'";
    $check_result = mysqli_query($conn, $check_email_query);

    if (mysqli_num_rows($check_result) > 0) {
        // Email exists in userlogin table, proceed with inserting applicant information
        $applicantId = generateUniqueID($conn); // Generate unique applicant ID

        // Prepare SQL statement to insert data into applicantinformation table
        $submitdata = "INSERT INTO `adopter information` (AdopterId, FirstName, LastName, gmail, AadharNumber, ContactNumber, DateOfBirth, Age, Addresss, PinCode, TimeStampp, petId)
                       VALUES ('$applicantId', '$fname', '$lname', '$email', '$aadhar', '$contact', '$birth_date', '$age', '$address', '$pincode', NOW(), '$petId')";

        // Execute SQL statement
        $result_query = mysqli_query($conn, $submitdata);

        if ($result_query) {
            echo "<script>alert('Application submitted successfully!')</script>";
            header('location: Success_application.php'); // Redirect to AllDogInfo.php after successful submission
            exit(); // Terminate script execution after redirection
        } else {
            echo "Error: " . mysqli_error($conn); // Display detailed error message for debugging
        }
    } else {
        echo "<script>alert('Email not found in userlogin table. Please use a registered email.')</script>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet Adopter Information</title>
    <link rel="stylesheet" href="adopterinfoCss.css">
</head>
<body>
<div class="container">
    <h1>Pet Adopter Information</h1>
    <form id="adopter-form" method="post">
    
        <div class="form-group">
            <label for="FirstName">First Name:</label>
            <input type="text" id="FirstName" name="FirstName" required>
        </div>
        <div class="form-group">
            <label for="LastName">Last Name:</label>
            <input type="text" id="LastName" name="LastName" required>
        </div>
        <div class="form-group">
            <label for="gmail">Email ID:</label>
            <input type="email" id="gmail" name="gmail" required>
        </div>
        <div class="form-group">
            <label for="AadharNumber">Aadhar Number:</label>
            <input type="text" id="AadharNumber" name="AadharNumber" pattern="[0-9]{12}" title="Please enter a valid 12-digit Aadhar number" required>
        </div>
        <div class="form-group">
            <label for="ContactNumber">Contact Number:</label>
            <input type="tel" id="ContactNumber" name="ContactNumber" pattern="[0-9]{10}" title="Please enter a valid 10-digit phone number" required>
        </div>
        <div class="form-group">
            <label for="DateOfBirth">Date of Birth:</label>
            <input type="date" id="DateOfBirth" name="DateOfBirth" required>
        </div>
        <div class="form-group">
            <label for="Age">Age:</label>
            <input type="number" id="Age" name="Age" min="18" required>
        </div>
        <div class="form-group">
            <label for="Addresss">Address:</label>
            <textarea id="Addresss" name="Addresss" required></textarea>
        </div>
        <div class="form-group">
            <label for="PinCode">Pincode:</label>
            <input type="text" id="PinCode" name="PinCode" pattern="[0-9]{6}" title="Please enter a valid 6-digit pincode" required>
        </div>
        <fieldset class="housing-info">
            <legend>Housing Information</legend>
            <div class="radio-group">
                <input type="radio" id="rented" name="housing" value="rented">
                <label for="rented">Renting a place</label>
                <br/>
                <input type="radio" id="owned" name="housing" value="owned">
                <label for="owned">Owning a place</label>
            </div>
            <p>Do your residence allow pets?</p>
            <select name="pets_allowed" id="pets-allowed">
                <option value="">Select</option>
                <option value="yes">Yes</option>
                <option value="no">No</option>
            </select>
        </fieldset>
        <button type="submit" name="submitdata">Submit Application</button>
    </form>
</div>
</body>
</html>
