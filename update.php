<?php
include 'connect.php';

$id = isset($_GET['updateid']) ? $_GET['updateid'] : null;

if ($id) {
    // Handle form submission
    if (isset($_POST['update'])) {
        // Sanitize input data
        $animalName = mysqli_real_escape_string($conn, $_POST['animalNamee']);
        $animalBreed = mysqli_real_escape_string($conn, $_POST['animalBreed']);
        $animalGender = mysqli_real_escape_string($conn, $_POST['animalGender']);
        $animalHeight = mysqli_real_escape_string($conn, $_POST['animalHeight']);
        $animalAge = mysqli_real_escape_string($conn, $_POST['animalAge']);
        $animalColour = mysqli_real_escape_string($conn, $_POST['animalColour']);
        $vaccinationStatus = mysqli_real_escape_string($conn, $_POST['vaccinationStatuss']);
        $catDog = mysqli_real_escape_string($conn, $_POST['catDog']);
        $Locationn = mysqli_real_escape_string($conn, $_POST['Locationn']);
        $status = mysqli_real_escape_string($conn, $_POST['statuss']);

        // Construct the update query
        $updateQuery = "UPDATE `pet_information` SET
            animalNamee='$animalName',
            animalBreed='$animalBreed',
            animalGender='$animalGender',
            animalHeight='$animalHeight',
            animalAge='$animalAge',
            animalColour='$animalColour',
            vaccinationStatuss='$vaccinationStatus',
            catDog='$catDog',
            Locationn='$Locationn',
            statuss='$status'
            WHERE petId='$id'";

        // Execute the update query
        $result = mysqli_query($conn, $updateQuery);

        if ($result) {
            echo "Updated Successfully";
            header('Location: read.php'); // Redirect to read.php after successful update
            exit;
        } else {
            echo "Update Failed: " . mysqli_error($conn);
        }
    }

   // Retrieve current pet information for display in the form
    $selectQuery = "SELECT * FROM `pet_information` WHERE petId='$id'";
    $selectResult = mysqli_query($conn, $selectQuery);

    if ($selectResult) {
        $row = mysqli_fetch_assoc($selectResult);

        // Assign retrieved values to variables for pre-filled form fields
        $animalName = $row['animalNamee'];
        $animalBreed = $row['animalBreed'];
        $animalGender = $row['animalGender'];
        $animalHeight = $row['animalHeight'];
        $animalAge = $row['animalAge'];
        $animalColour = $row['animalColour'];
        $vaccinationStatus = $row['vaccinationStatuss'];
        $catDog = $row['catDog'];
        $Locationn = $row['Locationn'];
        $status = $row['statuss'];
        
    } else {
        echo "Failed to fetch pet information: " . mysqli_error($conn);
    }
} else {
    echo "Invalid or missing 'updateid' parameter.";
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Update Pet Information</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container my-5">
        <form method="post">
            <!-- Display form fields with values from database -->
            <div class="form-group">
                <label>Pet Name</label>
                <input type="text" class="form-control" name="animalNamee" value="<?php echo htmlspecialchars($animalName); ?>">
            </div>
            <div class="form-group">
                <label>Pet Breed</label>
                <input type="text" class="form-control" name="animalBreed" value="<?php echo htmlspecialchars($animalBreed); ?>">
            </div>
            <div class="form-group">
                <label>Pet Gender</label>
                <input type="text" class="form-control" name="animalGender" value="<?php echo htmlspecialchars($animalGender); ?>">
            </div>
            <div class="form-group">
                <label>Pet Height</label>
                <input type="text" class="form-control" name="animalHeight" value="<?php echo htmlspecialchars($animalHeight); ?>">
            </div>
            <div class="form-group">
                <label>Pet Age</label>
                <input type="text" class="form-control" name="animalAge" value="<?php echo htmlspecialchars($animalAge); ?>">
            </div>
            <div class="form-group">
                <label>Pet Colour</label>
                <input type="text" class="form-control" name="animalColour" value="<?php echo htmlspecialchars($animalColour); ?>">
            </div>
            <div class="form-group">
                <label>Vaccination Status</label>
                <input type="text" class="form-control" name="vaccinationStatuss" value="<?php echo htmlspecialchars($vaccinationStatus); ?>">
            </div>
            <div class="form-group">
                <label>Cat/Dog</label>
                <input type="text" class="form-control" name="catDog" value="<?php echo htmlspecialchars($catDog); ?>">
            </div>
            <div class="form-group">
                <label>Location</label>
                <input type="text" class="form-control" name="Locationn" value="<?php echo htmlspecialchars($Locationn); ?>">
            </div>
            <div class="form-group">
                <label>Status</label>
                <input type="text" class="form-control" name="statuss" value="<?php echo htmlspecialchars($status); ?>">
            </div>
            <button type="submit" class="btn btn-dark btn-lg" name="update">Update</button>
        </form>
    </div>
</body>

</html>
