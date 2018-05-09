<?php

$servername = "localhost:3306";
$dbname = "akshaymo_seo";
// Create connection
$conn = new mysqli($servername,'akshaymo_root','Akshay1506', $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>