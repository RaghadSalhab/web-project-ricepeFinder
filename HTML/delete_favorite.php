<?php
session_start();

// Establish database connection
$db = new mysqli("localhost", "root", "", "recipefinderdb");

// Check connection
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

// Get the recipeID from the POST request
if (isset($_POST['recipeID'])) {
    $recipeID =$_SESSION['recipeID'];
    $email = $_SESSION['email'];


    // Delete the recipe from the favorites
    $deleteQry = "DELETE FROM favorite WHERE recipeID = '$recipeID' AND email = '$email'";

    if ($db->query($deleteQry) === TRUE) {
        echo "Recipe removed from favorites.";
    } else {
        echo "Error: " . $db->error;
    }
} else {
    echo "Invalid request.";
}

$db->close();
?>
