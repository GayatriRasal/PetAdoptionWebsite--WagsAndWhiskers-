<?php 
    $servername = "localhost";
    $username = "root";
    $password = "1234567";
    $db_name = "database1";  
    $conn =  mysqli_connect($servername, $username, $password, $db_name,3308);
    if(!$conn){
        die("Connection failed".mysqli_connect_error());
    }
   
    
    ?>