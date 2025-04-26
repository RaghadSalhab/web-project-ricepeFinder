<?php
session_start(); // Start the session to access session variables

// Retrieve session variables
$email = isset($_SESSION['email']) ? $_SESSION['email'] : null;
$username = isset($_SESSION['username']) ? $_SESSION['username'] : null;
$gender = isset($_SESSION['gender']) ? $_SESSION['gender'] : null;

// Database connection details
$servername = "your_servername";
$db_username = "your_username";
$db_password = "your_password";
$dbname = "recipefinderdb";

// Get the recipe ID from the URL
$recipeId = isset($_GET['recipeId']) ? intval($_GET['recipeId']) : 0;
// Create a new database connection
$conn = new mysqli("localhost", "root", "", "recipefinderdb");

// Check if the connection was successful
if ($conn->connect_error) {
    die(json_encode(['success' => false, 'message' => 'Connection failed: ' . $conn->connect_error]));
}

// Prepare the SQL statement to insert the recipe ID into the favorite table
$sql = "INSERT INTO favorite (recipeID, email) VALUES (?, ?)";
$stmt = $conn->prepare($sql);
if ($stmt) {
    $stmt->bind_param("is", $recipeId, $email);

    // Execute the SQL statement and check if it was successful
    if ($stmt->execute()) {
        echo json_encode(['success' => true]);
    } else {

        echo json_encode(['success' => false, 'message' => 'Error: ' . $stmt->error]);
    }

    // Close the statement
    $stmt->close();
} else {
    echo json_encode(['success' => false, 'message' => 'Error preparing statement: ' . $conn->error]);
}

// Close the database connection
$conn->close();
?>
