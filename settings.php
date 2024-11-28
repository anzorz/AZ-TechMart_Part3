<?php
$host = "feenix-mariadb.swin.edu.au";
$user = "s102849043"; 
$password = "031201";  
$dbname = "s102849043_db"; 

// Create connection
$conn = mysqli_connect($host, $user, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
