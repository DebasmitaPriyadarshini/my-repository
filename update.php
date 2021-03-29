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
    $updatecityname = mysqli_real_escape_string($db, $_POST["updatecityname"]);
    //$id = mysqli_real_escape_string($db, $_POST["id"]);
    $query = "UPDATE mastercity set cityname = '$updatecityname' where id= '".$_POST["id"]."'";
    mysqli_query($db, $query);
}
?>