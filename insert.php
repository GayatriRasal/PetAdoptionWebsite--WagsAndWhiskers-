

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Animal Registration</title>
    <style>
        body {
            font-family: sans-serif;
            margin: 0;
            background-color: #f0f0f0;
        }

        form {
            width: 400px;
            margin: 50px auto;
            padding: 20px;
            border-radius: 10px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        /* Increase input width and height */
        input[type="text"],
        input[type="number"],
        select {
            width: 100%;
            padding: 12px; /* Increased padding for larger boxes */
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 15px;
        }

        .radio-container {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
        }

        .radio-container input[type="radio"] {
            margin-right: 10px;
        }

        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
            margin-top: 10px;
        }

        button:hover {
            background-color: #3e8e41;
        }
    </style>
</head>
<body>
    <h1>Animal Registration Form</h1>
    
    <form action="insert_connection.php" method="post" enctype="multipart/form-data">
       
       
        <label for="animalNamee">Animal Name:</label>
        <input type="text" id="animalNamee" name="animalNamee" required><br><br>


        <label for="animalBreed">Animal Breed:</label>
        <input type="text" id="animalBreed" name="animalBreed" required><br><br>

        <label for="animalGender">Animal Gender:</label><br>
        <div class="radio-container">
            <input type="radio" id="genderMale" name="animalGender" value="Male" required> Male
            <input type="radio" id="genderFemale" name="animalGender" value="Female" required> Female
        </div><br>

        <label for="animalHeight">Height (cm):</label>
        <input type="number" id="animalHeight" name="animalHeight" required><br><br>

        <label for="animalAge">Age:</label>

        <div class="radio-container">
            <input type="radio" id="Puppy" name="animalAge" value="Puppy" required> Puppy
            <input type="radio" id="Adult" name="animalAge" value="Adult" required>Adult 
            <input type="radio" id="Senior" name="animalAge" value="Senior" required> Senior

        </div><br>

        <label for="animalColour">Colour:</label>
        <input type="text" id="animalColour" name="animalColour" required><br><br>

       

        <label for="vaccinationStatuss">Vaccination Status:</label>
        <select id="vaccinationStatuss" name="vaccinationStatuss" required>
            <option value="Vaccinated">Vaccinated</option>
            <option value="Not Vaccinated">Not Vaccinated</option>
        </select><br><br>

        
        <label for="catDog">cat or dog:</label>
        <select id="catDog" name="catDog" required>
            <option value="cat">Cat</option>
            <option value="dog">Dog</option>
        </select><br>

        <label for="Locationn">Location:</label>
        <select id="Locationn" name="Locationn" required>
            <option value="Pune">Pune</option>
            <option value="Mumbai">Mumbai</option>
            <option value="Nashik">Nashik</option>
            <option value="Nagpur">Nagpur</option>
            <option value="Nanded">Nanded</option>
            <option value="kolhapur">kolhapur</option>
            <option value="SambhajiNagar">SambhajiNagar</option>
            <option value="Chandrapur">Chandrapur</option>
            
    </select><br>

        <div class="form-outline mb-4 w-50 m-auto">
<label for="animalPhoto" class="form-label">Upload Photo:</label>
<input type="file" name="animalPhoto" id="animalPhoto"
class="form-control" required="required">
</div>


<label for="statuss">Status:</label>
        <select id="statuss" name="statuss" required>
            <option value="adopted">adopted</option>
            <option value="available">available</option>
            
            
    </select><br>


        <button type="submit" ref="read.php  "name="submitdata">Register Animal</button>
    </form>
</body>
</html>