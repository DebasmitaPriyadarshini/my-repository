<?php
// Database configuration
$dbHost     = "localhost:3308";
$dbUsername = "root";
$dbPassword = "";
$dbName     = "useraccounts";

// Create database connection
$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

// Check connection
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}
if (isset($_POST['Submit'])) {
    // receive all input values from the form
    $city = mysqli_real_escape_string($db, $_POST['city']);
$query = "INSERT INTO mastercity (cityname)
					  VALUES('$city')";
mysqli_query($db, $query);
}
?>