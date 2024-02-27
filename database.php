<?php
$servername = "localhost";
$username = "root"; // Assuming default username for localhost
$password = ""; // Assuming no password for localhost
$dbname = "trainer_survey";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>