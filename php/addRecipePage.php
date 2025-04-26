<?php
session_start(); // Start the session to access session variables

// Establish database connection
$db = new mysqli("localhost", "root", "", "recipefinderdb");

// Check connection
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if all required fields are set
    if (isset($_POST['RecipeName'], $_POST['Description'], $_POST['Cooking_time'], $_POST['gender']) && isset($_FILES['upload'])) {
        $recipeName = $_POST['RecipeName'];
        $description = $_POST['Description'];
        $cookingLevel = $_POST['gender'];
        $cookingTime = $_POST['Cooking_time'];
        $ownerEmail = $_SESSION['email']; // Assuming you have the username stored in the session

        // File upload handling
        if ($_FILES['upload']['error'] === UPLOAD_ERR_OK) {
            $uploadFileName = basename($_FILES['upload']['name']);
            $uploadTempName = $_FILES['upload']['tmp_name'];

            // Use absolute path for the upload directory
            $uploadDirectory = realpath(dirname(__FILE__)) . '/../uploads/';
            $uploadPath = $uploadDirectory . $uploadFileName;

            // Debugging statements
            echo "Temporary File: " . $uploadTempName . "<br>";
            echo "Upload Path: " . $uploadPath . "<br>";

            // Ensure the upload directory exists and is writable
            if (!is_dir($uploadDirectory)) {
                mkdir($uploadDirectory, 0755, true); // Create the directory if it doesn't exist
            }
            if (!is_writable($uploadDirectory)) {
                chmod($uploadDirectory, 0755); // Set correct permissions
            }

            if (move_uploaded_file($uploadTempName, $uploadPath)) {

                // Prepare SQL statement for insertion
                $stmt = $db->prepare("INSERT INTO `requests` (`name`, `level`, `time`, `Description`, `Url`, `Status`, `ownerEmail`) VALUES (?, ?, ?, ?, ?, 'Waiting', ?)");
                $stmt->bind_param("ssssss", $recipeName, $cookingLevel, $cookingTime, $description, $uploadPath, $ownerEmail);

                // Execute the statement
                if ($stmt->execute()) {
                    echo "New recipe added successfully.";
                } else {
                    echo "Error inserting recipe: " . $stmt->error;
                }

                // Close the statement
                $stmt->close();
                header('Location:../HTML/AddRecipe.html');

            } else {
                echo "Error moving uploaded file.";
            }
        } else {
            echo "File upload error: " . $_FILES['upload']['error'];
        }
    } else {
        echo "All fields are required.";
    }
}

// Close the database connection
$db->close();
?>
