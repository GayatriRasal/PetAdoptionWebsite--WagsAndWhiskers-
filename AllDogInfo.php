<head>
    <meta charset="utf-8">
    <title>Animal Adoption</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600&family=Playfair+Display:wght@400;500;600&display=swap" rel="stylesheet"> 

    <!-- Icon Font Stylesheet -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">


    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <link href="AllDogInfo.css" rel="stylesheet">
    
</head>

 <!-- Navbar & Hero Start -->
 <div class="container-fluid position-relative p-0">
    <nav class="navbar navbar-expand-lg navbar-light bg-white px-4 px-lg-5 py-3 py-lg-0">
        <a href="index.html" class="navbar-brand p-0">
            <h1 class="text-primary m-0"><i class="fas fa-star-of-life me-3"></i>Wags & Whiskers</h1>
            <!-- <img src="img/logo.png" alt="Logo"> -->
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="fa fa-bars"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto py-0">
                <a href="index.php" class="nav-item nav-link active">Home</a>
               
                <a href="signin.php" class="nav-item nav-link">Signin</a>
                <a href="login.php" class="nav-item nav-link">Login</a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                    <div class="dropdown-menu m-0">
                       
                        <a href="blog.html" class="dropdown-item">Our Blog</a>
                        <a href="team.html" class="dropdown-item">Our Team</a>
                      
                    </div>
                </div>
                
            </div>
            <a href="AllDogInfo.php" class="btn btn-primary rounded-pill text-white py-2 px-4 flex-wrap flex-sm-shrink-0">Adopt</a>
        </div>
    </nav>
 </div>
<br/>
<br/>
<br/>
<br/>
<div class="container">
    <form  method="GET" class="mb-4">
        <div class="row">
            <div class="col-md-3 mb-3">
                <label for="age">Age:</label>
                <select class="form-select" name="animalAge" id="age">
                    <option value="" name="Any">Any</option>
                    <option  value="Puppy" name="Puppy ">Puppy</option>
                    <option  value="Adult" name="Adult ">Adult</option>
                    <option  value="Senior" name="Senior ">Senior</option>
                </select>
            </div>
            <div class="col-md-3 mb-3">
                <label for="type">Type:</label>
                <select class="form-select" name="catDog" id="type">
                    <option value=""  name="Any" >Any</option>
                    <option value="cat" name="cat">Cat</option>
                    <option value="dog" name="dog">Dog</option>
                </select>
            </div>
            <div class="col-md-3 mb-3">
                <label for="breed">Breed:</label>
                <select class="form-select" name="animalBreed" id="type">
                    <option value="" name="Any">Any</option>
                    <option value="Pug" name="Pug">Pug</option>
                    <option value="Siamese" name="Siamese">Siamese</option>
                    <option  value="Maine Coon" name="Maine Coon ">Maine Coon</option>
                    <option  value="Golden Retriever" name="Golden Retriever ">Golden Retriever</option>
                    <option  value="Bengal" name="Bengal">Bengal</option>
                    <option  value="Scottish Fold" name="Scottish Fold ">Scottish Fold</option>
                    <option  value="Beagle" name="Beagle">Beagle</option>
                    <option  value="Indian" name="Indian">Indian</option>

                </select>          
              </div>
             
            <div class="col-md-3 mb-3">
                <label for="gender">Gender:</label>
                <select class="form-select" name="animalGender" id="gender">
                    <option value="" name="Any">Any</option>
                    <option value="male" name="male">Male</option>
                    <option value="female" name="female">Female</option>
                </select>
            </div>
            
            <div class="col-md-3 mb-3">
                <label for="Locationn">Location:</label>
                <select class="form-select" name="Locationn" id="Locationn">
                <option value="" name="Any">Any</option>
            <option value="Pune">Pune</option>
            <option value="Mumbai">Mumbai</option>
            <option value="Nashik">Nashik</option>
            <option value="Nagpur">Nagpur</option>
            <option value="Nanded">Nanded</option>
            <option value="kolhapur">kolhapur</option>
            <option value="SambhajiNagar">SambhajiNagar</option>
            <option value="Chandrapur">Chandrapur</option>
                </select>          
              </div>
            <!-- Add more filtering options as needed (e.g., location) -->
            <div class="col-md-3">
                <button type="submit" name='submitdata' class="btn btn-primary">Apply Filters</button>
            </div>
        </div>
    </form>
    
</div>


<br/>
<br/>
<br/>

    <!-- fourth child > -->
<div class="row">
<div class="col-md-10">
<!-- products -->
 <div class="row">

 <?php
include 'connect.php';

// Retrieve filter parameters from $_GET
$search1 = isset($_GET['animalAge']) ? $_GET['animalAge'] : '';
$search2 = isset($_GET['catDog']) ? $_GET['catDog'] : '';
$search3 = isset($_GET['animalBreed']) ? $_GET['animalBreed'] : '';
$search4 = isset($_GET['animalGender']) ? $_GET['animalGender'] : '';
$search5 = isset($_GET['Locationn']) ? $_GET['Locationn'] : '';

// Initialize the base SQL query
$select_query = "SELECT * FROM pet_information WHERE statuss = 'available'";

// Add conditions based on provided search parameters
if (!empty($search1) && $search1 !== 'Any') {
    $select_query .= " AND animalAge = '$search1'";
}

if (!empty($search2)) {
    $select_query .= " AND catDog = '$search2'";
}

if (!empty($search3)) {
    // Use LIKE operator for partial match on breed
    $select_query .= " AND animalBreed = '$search3'";
}

if (!empty($search4)) {
    $select_query .= " AND animalGender = '$search4'";
}
if (!empty($search5)) {
    $select_query .= " AND Locationn = '$search5'";
}

$result_query = mysqli_query($conn, $select_query);

if (mysqli_num_rows($result_query) > 0) {
    // Output the results
    while ($row = mysqli_fetch_assoc($result_query)) {
        $petId = $row['petId'];
        $animalName = $row['animalNamee'];
        $animalBreed = $row['animalBreed'];
        $animalGender = $row['animalGender'];
        $animalHeight = $row['animalHeight'];
        $animalAge = $row['animalAge'];
        $animalColour = $row['animalColour'];
        $vaccinationStatus = $row['vaccinationStatuss'];
        $catDog = $row['catDog'];
        $animalPhoto = $row['animalPhoto']; // Assuming 'animalPhoto' stores filename only
        $Location = $row['Locationn'];
    
        // Construct the image URL based on the 'animalimage' folder path and filename
        $imagePath = 'animalimage/' . $animalPhoto; // Relative path to the image
    
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
                      Type: $catDog <br>
                      Location: $Location
                    </p>
                    <a href='applicantinfoForm.php?petId=$petId' class='btn btn-primary'>Adopt Now</a>
                  </div>
                </div>
              </div>";
    } 
} else {
    echo "No pets found matching the search criteria.";
}

// Close the database connection
mysqli_close($conn);
?>



    
    
 </div>
</div>
 
  
</div>
