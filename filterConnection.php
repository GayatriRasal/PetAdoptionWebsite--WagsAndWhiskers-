<?php
include 'connect.php';

// Construct the SQL query based on selected filters
$select_query = "SELECT * FROM pet_information WHERE 1";

if (!empty($_GET['age'])) {
  $age = $_GET['age'];
  $select_query .= " AND animalAge = '$age'";
}

if (!empty($_GET['type'])) {
  $type = $_GET['type'];
  $select_query .= " AND catDog = '$type'";
}

if (!empty($_GET['breed'])) {
  $breed = $_GET['breed'];
  $select_query .= " AND animalBreed LIKE '$breed'";
}

if (!empty($_GET['gender'])) {
  $gender = $_GET['gender'];
  $select_query .= " AND animalGender = '$gender'";
}

// Execute the SQL query with filters
$result_query = mysqli_query($conn, $select_query);

// Display filtered results
while ($row = mysqli_fetch_assoc($result_query)) {
  // Output the pet information cards here (similar to your existing code)
  echo "<div class='col-md-4 mb-2'>
  <div class='card' style='width: 18rem;'>
    <img src='$imagePath' class='card-img-top' alt='Pet Image'>
    <div class='card-body'>
      <h5 class='card-title'>$animalName</h5>
      <p class='card-text'>
        Breed: $animalBreed <br>
        Gender: $animalGender <br>
        Height: $animalHeight <br>
        Age: $animalAge <br>
        Colour: $animalColour <br>
        Vaccination Status: $vaccinationStatus <br>
        Type: $catDog
      </p>
      <a href='#' class='btn btn-primary'>Details</a>
    </div>
  </div>
</div>";
  //  Display pet information from $row variable
  echo "";
}

// Close the database connection
mysqli_close($conn);
?>
