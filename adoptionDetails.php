<!doctype html>
<html lang="en">
  <head>
  <title>Display data</title>
  <h1>Adopters Information Table</h1>
        
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Custom CSS for table */
        body {
            padding: 20px;
        }

        table {
            width: 100%;
            margin-bottom: 1rem;
            color: #212529;
            border-collapse: collapse;
        }

        th, td {
            padding: 0.75rem;
            vertical-align: top;
            border: 1px solid #dee2e6;
        }

        th {
            background-color: #007bff;
            color: #fff;
            text-align: left;
        }

        tr:nth-child(even) {
            background-color: #f8f9fa;
        }

        /* Responsive table */
        @media (max-width: 767px) {
            table {
                display: block;
                width: 100%;
                overflow-x: auto;
            }
        }
    </style>
   
  </head>
  <body>
<table border="1">
<tr>
<th>First Name</th>
<th>Last Name</th>
<th>Gmail</th>
<th>Contact Number</th>
<th>Animal Name</th>
<th>Animal Breed</th>
<th>Cat/Dog</th>
</tr>
<?php
include 'connect.php'; 

// Query to fetch data using INNER JOIN between adopter information and petsbackup tables
$query = "SELECT str.FirstName, str.LastName, str.gmail, str.ContactNumber, sr.animalNamee, sr.animalBreed, sr.catDog 
          FROM `adopter information` AS str
          INNER JOIN `petsbackup` AS sr
          ON str.petId = sr.petId";

$result = mysqli_query($conn, $query); 
if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}

while ($row = mysqli_fetch_assoc($result)) {
    ?>
    <tr>
    <td><?php echo htmlspecialchars($row['FirstName']); ?></td>
    <td><?php echo htmlspecialchars($row['LastName']); ?></td>
    <td><?php echo htmlspecialchars($row['gmail']); ?></td>
    <td><?php echo htmlspecialchars($row['ContactNumber']); ?></td>
    <td><?php echo htmlspecialchars($row['animalNamee']); ?></td>
    <td><?php echo htmlspecialchars($row['animalBreed']); ?></td>
    <td><?php echo htmlspecialchars($row['catDog']); ?></td>
    </tr>
    <?php
}
?>
</table>
  </body>

</html>
