<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Data Management</title>
  <style>
    body {
      font-family: Optima;
      display: flex;
      flex-direction: column; /* Stack elements vertically */
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      margin: 0;
      background-image: url("https://wallpapers.com/images/featured/dog-wj7msvc5kj9v6cyy.jpg"); /* Replace with your image path */
      background-size: 1750px 1000px; /* Adjust background size as needed */
      background-repeat: no-repeat; /* Prevent background image from repeating */
    }

    .heading {
      text-align: center;
      font-size: 90px; /* Adjust font size as needed */
      margin-bottom: 100px; /* Add space between heading and buttons */
      color: whitesmoke; /* Adjust text color for better visibility on background */
    }

    .button-container {
      display: flex;
      flex-direction: column; /* Stack buttons vertically */
      gap: 20px;
    }
 /* Style buttons and anchor tags within them */
 button {
      padding: 15px 30px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      text-align: center;
    }

    button a {
      /* Target anchor tags within buttons */
      font-family: Arial, sans-serif; /* Customize button text font */
      font-size: 16px; /* Customize button text size */
      color: #ae5f5f; /* Customize button text color (default) */
      text-decoration: none; /* Remove underline from anchor tags */
    }

    .insert-button a {
      color: #130101; /* Override default color for insert button */
    }

    .delete-button a {
      color: #0c0101; /* Override default color for delete button */
    }

    .update-button a {
      color: #100101; /* Override default color for update button */
    }

    .insert-button:hover {
      background-color: #3e8e41;
    }

    .delete-button:hover {
      background-color: #da291c;
    }

    .update-button:hover {
      background-color: #23408f;
    }
  </style>
</head>
<body>
  <h1 class="heading">DATA MANAGEMENT</h1>
  <div class="button-container">
    <button class="insert-button">
      <a href="insert.php">INSERT DATA</a>
    </button>
    <!-- <button class="delete-button">
      <a href="delete.php">DELETE DATA</a>
    </button> -->
    <button class="update-button">
      <a href="read.php">UPDATE DATA</a>
    </button>

    <button class="update-button">
      <a href="applicant_info.php">Applicant Details</a>
    </button>

    <button class="update-button">
      <a href="adoptionDetails.php">All Adopter Details</a>
    </button>
  </div>
</body>

</html>