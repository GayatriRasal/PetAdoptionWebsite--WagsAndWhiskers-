<?php
include 'connect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        /* CSS styles for green-colored button */
        .btn-green {
            color: #ffffff; /* Text color (white) */
            background-color: #28a745; /* Green background color */
            border-color: #28a745; /* Green border color */
        }

        .btn-green:hover {
            background-color: #218838; /* Darker green on hover */
            border-color: #1e7e34; /* Darker border color on hover */
        }
    </style>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Display data</title>
</head>
<body>
<div class="container">
    <h1>Applicant Information</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Adopter Id</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Aadhar Number</th>
                <th>Contact Number</th>
                <th>Date of Birth</th>
                <th>Age</th>
                <th>Address</th>
                <th>Pincode</th>
                <th>Pet ID</th>
                <th>Timestamp</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        <?php
        // Selecting all data excluding applicants with status 'assigned'
        $sql = "SELECT * FROM `adopter information` WHERE statuss != 'assigned'";
        $result = mysqli_query($conn, $sql);

        while ($row = mysqli_fetch_assoc($result)) {
            $applicant_id = $row['AdopterId'];
            $Fname = $row['FirstName'];
            $LName = $row['LastName'];
            $gmail = $row['gmail'];
            $aadhar = $row['AadharNumber'];
            $contact = $row['ContactNumber'];
            $dob = $row['DateOfBirth'];
            $age = $row['Age'];
            $address = $row['Addresss'];
            $pincode = $row['PinCode'];
            $petId = $row['petId'];
            $time = $row['TimeStampp'];

            echo '<tr>
                    <th scope="row">' . $applicant_id . '</th>
                    <td>' . $Fname . '</td>
                    <td>' . $LName . '</td>
                    <td>' . $gmail . '</td>
                    <td>' . $aadhar . '</td>
                    <td>' . $contact . '</td>
                    <td>' . $dob . '</td>
                    <td>' . $age . '</td>
                    <td>' . $address . '</td>
                    <td>' . $pincode . '</td>
                    <td>' . $petId . '</td>
                    <td>' . $time . '</td>
                    <td>
                        <a href="assignPet.php?updateid=' . $applicant_id . '" class="btn btn-green">Confirm Adoption</a>
                        <a href="rejectapplication.php?updateid=' . $applicant_id . '" class="btn btn-danger">Reject Application</a>
                    </td>
                </tr>';
        }
        ?>
        </tbody>
    </table>
</div>

</body>
</html>
