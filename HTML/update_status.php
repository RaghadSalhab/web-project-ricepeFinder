<?php
// Database connection
$servername = "localhost";  // Typically 'localhost' if using XAMPP
$username = "root";         // Default XAMPP username
$password = "";             // Default XAMPP password
$dbname = "recipefinderdb"; // Replace with your actual database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get data from POST request
$requestId = $_POST['id'];
$newStatus = $_POST['status'];

// Update status in database
$sql = "update requests set Status='$newStatus' where ReqID='$requestId'";

if ($newStatus == 'Accepted') {
    // Get all request information
    $requestInfoSql = "SELECT * FROM requests WHERE ReqID='$requestId'";
    $requestInfoResult = $conn->query($requestInfoSql);

    if ($requestInfoResult->num_rows > 0) {
        // Insert new recipe
        $requestInfo = $requestInfoResult->fetch_assoc();
        $recipeName = $requestInfo['name'];
        $desc = $requestInfo['Description'];
        $level = $requestInfo['level'];
        $time = $requestInfo['time'];
        $url = $requestInfo['Url'];
        $owner = $requestInfo['ownerEmail'];
        $id = $requestInfo['ReqID'];


        $insertRecipeSql = "INSERT INTO `recipe` (`name`, `description`, `level`, `time`, `RecImgUrl`, `Onwer`, `id`) VALUES ('$recipeName', '$desc', '$level', '$time', '$url', '$owner', '$id')";



        if ($conn->query($insertRecipeSql) === TRUE) {
            // Change request status to Accepted
            $updateStatusSql = "UPDATE requests SET Status='Accepted' WHERE ReqID='$requestId'";
            if ($conn->query($updateStatusSql) === TRUE) {
                echo "Record updated successfully and new recipe inserted";
            } else {
                echo "Error updating request status: " . $conn->error;
            }
        } else {
            echo "Error inserting new recipe: " . $conn->error;
        }
    } else {
        echo "No request found with the given ID";
    }
} else if ($newStatus == 'Rejected' || $newStatus == 'Waiting') {
    // Check if there is a recipe with id=reqid
    $checkRecipeSql = "SELECT * FROM recipe WHERE id='$requestId'";
    $recipeResult = $conn->query($checkRecipeSql);

    if ($recipeResult->num_rows > 0) {
        // Delete the recipe
        $deleteRecipeSql = "DELETE FROM recipe WHERE id='$requestId'";
        if ($conn->query($deleteRecipeSql) === TRUE) {
            // Change request status
            $updateStatusSql = "UPDATE requests SET Status='$newStatus' WHERE ReqID='$requestId'";
            if ($conn->query($updateStatusSql) === TRUE) {
                echo "Record updated successfully and recipe deleted";
            } else {
                echo "Error updating request status: " . $conn->error;
            }
        } else {
            echo "Error deleting recipe: " . $conn->error;
        }
    }
        // Change request status


} else {
    echo "Invalid status";
}
$updateStatusSql = "UPDATE requests SET Status='$newStatus' WHERE ReqID='$requestId'";
if ($conn->query($updateStatusSql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating request status: " . $conn->error;
}
$conn->close();
?>
