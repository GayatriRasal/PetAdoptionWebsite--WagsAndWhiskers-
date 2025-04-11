<?php
// Include database connection
include 'connect.php';

// Check if 'updateid' (adopterId) is provided in the URL
if (isset($_GET['updateid'])) {
    $adopterId = $_GET['updateid'];

    function generateUniqueID($conn) {
        $last_id_query = "SELECT MAX(CAST(SUBSTRING(Id, 1, 3) AS UNSIGNED)) AS max_id FROM petsbackup";
        $last_id_result = mysqli_query($conn, $last_id_query);
        $row = mysqli_fetch_assoc($last_id_result);
        $last_id = $row['max_id'];
        $next_id = $last_id + 1;
        $Id = sprintf('%03d', $next_id);
        return $Id;
      }
    
      $Id = generateUniqueID($conn);
  

    // Retrieve adopter details from adopter information table
    $selectAdopterQuery = "SELECT * FROM `adopter information` WHERE AdopterId = '$adopterId'";
    $adopterResult = mysqli_query($conn, $selectAdopterQuery);

    if ($adopterResult && mysqli_num_rows($adopterResult) > 0) {
        $adopterData = mysqli_fetch_assoc($adopterResult);
        $petId = $adopterData['petId'];

        // Fetch pet details associated with the adopter
        $selectPetQuery = "SELECT * FROM pet_information WHERE petId = '$petId'";
        $petResult = mysqli_query($conn, $selectPetQuery);

        if ($petResult && mysqli_num_rows($petResult) > 0) {
            $petData = mysqli_fetch_assoc($petResult);

            // Insert pet details into petsbackup table with status 'adopted'
            $insertPetBackupQuery = "INSERT INTO petsbackup (Id,petId, animalNamee, animalBreed, animalGender, animalHeight, animalAge, animalColour, vaccinationStatuss, catDog, Locationn, animalPhoto)
                                     VALUES ('$Id','$petId', '{$petData['animalNamee']}', '{$petData['animalBreed']}', '{$petData['animalGender']}', '{$petData['animalHeight']}', '{$petData['animalAge']}', '{$petData['animalColour']}', '{$petData['vaccinationStatuss']}', '{$petData['catDog']}', '{$petData['Locationn']}', '{$petData['animalPhoto']}')";

            $insertPetBackupResult = mysqli_query($conn, $insertPetBackupQuery);

            if ($insertPetBackupResult) {
                // Update the status of the pet in pet_information table to 'adopted'
                $updatePetStatusQuery = "UPDATE pet_information SET statuss = 'adopted' WHERE petId = '$petId'";
                $updatePetStatusResult = mysqli_query($conn, $updatePetStatusQuery);

                if ($updatePetStatusResult) {
                    // Update the status of the adopter in adopter information table to 'assigned'
                    $updateAdopterStatusQuery = "UPDATE `adopter information` SET statuss = 'assigned' WHERE AdopterId = '$adopterId'";
                    $updateAdopterStatusResult = mysqli_query($conn, $updateAdopterStatusQuery);

                    if ($updateAdopterStatusResult) {
                        echo "<script>alert('Adoption confirmed successfully!')</script>";
                        header('Location: Success.php');
                        exit();
                    } else {
                        echo "Error updating adopter status: " . mysqli_error($conn) . "<br>";
                    }
                } else {
                    echo "Error updating pet status: " . mysqli_error($conn) . "<br>";
                }
            } else {
                echo "Error inserting pet into backup: " . mysqli_error($conn) . "<br>";
            }
        } else {
            echo "Pet not found or invalid petId." . "<br>";
        }
    } else {
        echo "Adopter not found or invalid adopterId." . "<br>";
    }
} else {
    echo "<script>alert('Invalid request: Missing adopter ID')</script>";
    exit();
}

// Close the database connection
mysqli_close($conn);
?>
