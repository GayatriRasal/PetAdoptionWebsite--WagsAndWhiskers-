<?php
include 'connect.php';

if (isset($_POST['submitdata'])) {

  function generateUniqueID($conn) {
    $last_id_query = "SELECT MAX(CAST(SUBSTRING(petId, 1, 3) AS UNSIGNED)) AS max_id FROM pet_information";
    $last_id_result = mysqli_query($conn, $last_id_query);
    $row = mysqli_fetch_assoc($last_id_result);
    $last_id = $row['max_id'];
    $next_id = $last_id + 1;
    $petId = sprintf('%03d', $next_id);
    return $petId;
  }

  $petId = generateUniqueID($conn);

  $animal_name = mysqli_real_escape_string($conn, $_POST['animalNamee']);
  $animal_breed = mysqli_real_escape_string($conn, $_POST['animalBreed']);
  $animal_gender = mysqli_real_escape_string($conn, $_POST['animalGender']);
  $animal_height = mysqli_real_escape_string($conn, $_POST['animalHeight']);
  $animal_age = mysqli_real_escape_string($conn, $_POST['animalAge']);
  $animal_colour = mysqli_real_escape_string($conn, $_POST['animalColour']);
  $animal_vaccination = mysqli_real_escape_string($conn, $_POST['vaccinationStatuss']);
  $animal_type = mysqli_real_escape_string($conn, $_POST['catDog']);
  $animal_Location = mysqli_real_escape_string($conn, $_POST['Locationn']);
  $animal_photo1 = $_FILES['animalPhoto']['name'];
  $animal_photo2 = $_FILES['animalPhoto']['tmp_name'];
  $animal_status = mysqli_real_escape_string($conn, $_POST['statuss']); // Corrected assignment for statuss

  // Check if any required field is empty
  if (empty($animal_status) || empty($animal_name) || empty($animal_type) || empty($animal_Location) || empty($animal_breed) || empty($animal_gender) || empty($animal_height) || empty($animal_age) || empty($animal_colour) || empty($animal_photo1) || empty($animal_vaccination)) {
    echo "<script>alert('Please fill all the given details')</script>";
    exit();
  } else {
    move_uploaded_file($animal_photo2, "./animalimage/$animal_photo1");

    // Ensure all columns from the table are included in the INSERT statement
    $submitdata = "INSERT INTO `pet_information` (petId, animalNamee, animalBreed, animalGender, animalHeight, animalAge, animalColour, vaccinationStatuss, catDog, Locationn, animalPhoto, statuss)
                   VALUES ('$petId', '$animal_name', '$animal_breed', '$animal_gender', '$animal_height', '$animal_age', '$animal_colour', '$animal_vaccination', '$animal_type', '$animal_Location', '$animal_photo1', '$animal_status')";

    $result_query = mysqli_query($conn, $submitdata);
    if ($result_query) {
      echo "<script>alert('Successfully inserted data')</script>";
      header('location: read.php');
      exit(); // Ensure to exit after redirection
    } else {
      echo "Error: " . mysqli_error($conn); // Provide more specific error message for debugging
    }
    mysqli_close($conn);
  }
}
?>
