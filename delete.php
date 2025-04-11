<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Animal Deletion Form</title>
    <style>
        body {
            font-family: Garamond, serif;
            margin: 0;
            background-color: #f0f0f0;
        }

        form {
            width: 450px;
            margin: 50px auto;
            padding: 20px;
            border-radius: 10px;
            background-color: #ffffff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 1px;
            font-weight: bold;
        }

        /* Increase input width and height */
        input[type="text"],
        input[type="number"],
        select {
            width: 100%;
            padding: 8px; /* Increased padding for larger boxes */
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 1px;
        }

        .radio-container {
            display: flex;
            align-items: center;
            margin-bottom: 1px;
        }

        .radio-container input[type="radio"] {
            margin-right: 10px;
        }

        button {
            background-color: #15e9fd;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
            margin-top: 1px;
        }

        button:hover {
            background-color: #073d56;
        }
    </style>
</head>
<body>
    <h1>Animal Deletion Form</h1>
    <form action="deleteconnection.php" method="post">
       
        <label for="petId">Animal-Unique ID:</label>
        <input type="number" id="petId" name="petId" required><br><br>

        <label for="animalNamee"style="font-size: 18px;">Animal Name:</label>
        <input type="text" id="animalNamee" name="animalNamee" required><br><br>

        </select><br><br>
        <button type="submit" ref="read.php" name=deleteData>Delete Animal</button>
    </form>
</body>
</html>