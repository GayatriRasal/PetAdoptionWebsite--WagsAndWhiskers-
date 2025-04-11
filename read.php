<?php
include 'connect.php';
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Display data</title>
  </head>
  <body>
  <div class="container my-5">
  <table class="table">
  <thead>
    <tr>
      <th scope="col">Pet id</th>
      <th scope="col">Animal Name</th>
      <th scope="col">Breed</th>
      <th scope="col">Gender</th>
      <th scope="col">Height</th>
      <th scope="col">Age</th>
      <th scope="col">Colour</th>
      <th scope="col">Vaccination Status</th>
      <th scope="col">Cat/Dog</th>
      <th scope="col">Location</th>
      <th scope="col">Status</th>
      <th scope="col">Operations</th>
      

    </tr>
  </thead>
  <tbody>

  <?php
  //selecting all data
  $sql="Select * from `pet_information`";
  $result=mysqli_query($conn,$sql);
  while($row=mysqli_fetch_assoc($result)){
    $petId=$row['petId'];
    $animalName= $row['animalNamee'];
    $animalBreed= $row['animalBreed'];
    $animalGender= $row['animalGender'];
    $animalHeight= $row['animalHeight'];
    $animalAge= $row['animalAge'];
    $animalColour= $row['animalColour'];
     $vaccinationStatus= $row['vaccinationStatuss'];
     $catDog= $row['catDog'];
     $Location= $row['Locationn'];
     $status= $row['statuss'];
    
    echo '<tr>
    <th scope="row">'.$petId.'</th>
    <td>'.$animalName.'</td>
    <td>'.$animalBreed.'</td>
    <td>'.$animalGender.'</td>
    <td>'.$animalHeight.'</td>
    <td>'.$animalAge.'</td>
    <td>'.$animalColour.'</td>
    <td>'.$vaccinationStatus.'</td>
    <td>'.$catDog.'</td>
    <td>'.$Location.'</td>
      <td>'.$status.'</td>

    <td>
    <a href="update.php?updateid='.$petId.' " class="btn btn-dark">Update</a>
    <a href="delete.php"class="btn btn-danger">Delete</a>
      </td>
   
    </tr>';
    }

  
 
  
  ?>
 
  </tbody>
</table>
</div>

  </body>
</html>