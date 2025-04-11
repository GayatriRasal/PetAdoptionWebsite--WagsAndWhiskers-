<?php
// Include database connection
include 'connect.php';

// Check if 'updateid' (applicantId) is provided in the URL
if (isset($_GET['updateid'])) {
    $applicantId = $_GET['updateid'];

    // Construct DELETE query to remove applicant from applicantinformation table
    $deleteApplicantQuery = "DELETE FROM `adopter information` WHERE AdopterId = '$applicantId'";
    
    // Execute DELETE query
    $deleteApplicantResult = mysqli_query($conn, $deleteApplicantQuery);

    if ($deleteApplicantResult) {
        echo "<script>alert('Applicant rejected successfully!')</script>";
        // Redirect to a success page or back to the applicant list page
        header('Location: applicant_info.php'); // Redirect to appropriate page
        exit();
    } else {
        echo "Error deleting applicant: " . mysqli_error($conn);
    }
} else {
    echo "<script>alert('Invalid request: Missing applicant ID')</script>";
    exit();
}
?>
