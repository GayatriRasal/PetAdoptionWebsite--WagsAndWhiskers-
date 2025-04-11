<?php
include 'connect.php';

if(isset($_POST['deleteData'])) {
    // Sanitize and validate input
    $animal_uniqueId = mysqli_real_escape_string($conn, $_POST['petId']);
    $animal_name = mysqli_real_escape_string($conn, $_POST['animalNamee']);

    // Check if any required field is empty
    if($animal_uniqueId == '' || $animal_name == '') {
        echo "<script>alert('Please fill all the given details')</script>";
        exit();
    }

    // Construct the DELETE query
    $deleteData = "DELETE FROM `pet_information` 
                   WHERE petId = '$animal_uniqueId' AND animalNamee = '$animal_name'";

    // Execute the DELETE query
    $result_query = mysqli_query($conn, $deleteData);

    if($result_query) {
        echo "<script>alert('Successfully deleted the pet')</script>";
        header('location:read.php');
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }

    mysqli_close($conn); // Close database connection
} else {
    echo "<script>alert('Invalid request')</script>";
}
?>
