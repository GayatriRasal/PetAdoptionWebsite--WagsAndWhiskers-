<?php
include 'connect.php';

// Check if updateid is provided via GET request
if (isset($_GET['updateid'])) {
    $id = $_GET['updateid'];

    // Fetch existing pet information from database based on petId
    $selectQuery = "SELECT * FROM `pet_information` WHERE petId=$id";
    $result = mysqli_query($conn, $selectQuery);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        // Extract pet details from database record
        $animalName = $row['animalNamee'];
        $animalBreed = $row['animalBreed'];
        $animalGender = $row['animalGender'];
        $animalHeight = $row['animalHeight'];
        $animalAge = $row['animalAge'];
        $animalColour = $row['animalColour'];
        $vaccinationStatus = $row['vaccinationStatuss'];
        $catDog = $row['catDog'];
        $Location = $row['Location'];
        $status = $row['status'];
     

        // Handle form submission to update pet information
        if (isset($_POST['update'])) {
            // Retrieve updated form data
            $animalName = mysqli_real_escape_string($conn, $_POST['animalNamee']);
            $animalBreed = mysqli_real_escape_string($conn, $_POST['animalBreed']);
            $animalGender = mysqli_real_escape_string($conn, $_POST['animalGender']);
            $animalHeight = mysqli_real_escape_string($conn, $_POST['animalHeight']);
            $animalAge = mysqli_real_escape_string($conn, $_POST['animalAge']);
            $animalColour = mysqli_real_escape_string($conn, $_POST['animalColour']);
            $vaccinationStatus = mysqli_real_escape_string($conn, $_POST['vaccinationStatuss']);
            $catDog = mysqli_real_escape_string($conn, $_POST['catDog']);
            $Location = mysqli_real_escape_string($conn, $_POST['Location']);
            $status = mysqli_real_escape_string($conn, $_POST['status']);

          
            // Update query to modify pet information in the database
            $updateQuery = "UPDATE `pet_information` SET 
                animalNamee='$animalName',
                animalBreed='$animalBreed',
                animalGender='$animalGender',
                animalHeight='$animalHeight',
                animalAge='$animalAge',
                animalColour='$animalColour',
                vaccinationStatuss='$vaccinationStatus',
                catDog='$catDog',
                Location='$Location',
                status='$status',
                WHERE petId=$id";

            $updateResult = mysqli_query($conn, $updateQuery);

            if ($updateResult) {
                echo "Updated Successfully";
                header('Location: read.php'); // Redirect to read.php after successful update
                exit;
            } else {
                echo "Update Failed: " . mysqli_error($conn);
            }
        }
    } else {
        echo "No record found with ID: $id";
    }
} else {
    echo "Update ID not provided";
}
?>