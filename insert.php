<?php
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
if (isset($_POST["cityname"])) {
    // receive all input values from the form
    $cityname = mysqli_real_escape_string($db, $_POST["cityname"]);
    $query = "INSERT INTO mastercity (cityname)
					  VALUES('$cityname')";
    mysqli_query($db, $query);
}
?>