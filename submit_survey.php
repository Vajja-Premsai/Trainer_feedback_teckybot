<?php
// Include your database connection file
include('database.php');

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $trainerName = $_POST['trainerName'];
    $effectiveness = $_POST['effectiveness'];
    $communication = $_POST['communication'];
    $interactive = isset($_POST['interactive']) ? $_POST['interactive'] : '';
    $organization = $_POST['organization'];
    $recommendation = isset($_POST['recommend']) ? $_POST['recommend'] : '';
    $rating = $_POST['rating'];
    $satisfaction = $_POST['satisfaction'];
    $feedback = $_POST['feedback'];

    // Prepare and execute SQL query
    $sql = "INSERT INTO trainers (trainer_name, content, communication, intereactive, presentation, recommendation, rating, overall, feedback)
            VALUES ('$trainerName', '$effectiveness', '$communication', '$interactive', '$organization', '$recommendation', '$rating', '$satisfaction', '$feedback')";

    if ($conn->query($sql) === TRUE) {
        echo "Record inserted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "Invalid request";
}

// Close database connection
$conn->close();
?>