<?php
// Database credentials
$servername = "localhost"; // Usually 'localhost' in XAMPP
$username = "root"; // Default username in XAMPP
$password = ""; // Default password in XAMPP is empty
$dbname = "recipefinderdb"; // Replace with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// Get values from POST request
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];
$pass = $_POST['password'];
$gender = $_POST['gender'];

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO person (FName, LName, Pass, Email, Role, Gender) VALUES (?, ?, ?, ?, 'Admin', ?)");
$stmt->bind_param("sssss", $fname, $lname, $pass, $email, $gender);


// Execute the prepared statement
if ($stmt->execute()) {
    echo "New record created successfully";
} else {
    echo "Error: " . $stmt->error;
}

// Close connections
$stmt->close();
$conn->close();
?>
