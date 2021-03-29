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
if (isset($_POST["id"])) {
    // receive all input values from the form
    $id = mysqli_real_escape_string($db, $_POST["id"]);
    $query = "DELETE from mastercity where id = '".$_POST["id"]."'";			  
    mysqli_query($db, $query);
}
?>