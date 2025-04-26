<?php
session_start(); // Start the session
/*
if (!isset($_SESSION['email'])) {
    die(json_encode(['error' => 'User session not found.']));
}
$username = $_SESSION['username'];
$email = $_SESSION['email'];

*/

if (!isset($_GET['recipeID'])) {
    die(json_encode(['error' => 'Recipe ID not provided.']));
}

$recipeID = $_GET['recipeID'];

try {
    $db = new mysqli("localhost", "root", "", "recipefinderdb");

    // Check connection
    if ($db->connect_error) {
        die(json_encode(['error' => "Connection failed: " . $db->connect_error]));
    }

    $ingredientQry = "SELECT ingredient.Name 
                     FROM ingredient 
                     INNER JOIN `req-ingredient` ON ingredient.IngID = `req-ingredient`.IngID 
                     WHERE `req-ingredient`.reqID = $recipeID";

    $ingredientResult = $db->query($ingredientQry);

    if ($ingredientResult === false) {
        die(json_encode(['error' => "Query failed: " . $db->error]));
    }

    // Prepare HTML content to send back
    $htmlContent = '<!DOCTYPE html>
                    <html lang="en">
                    <head>
                        <meta charset="UTF-8">
                        <meta name="viewport" content="width=device-width, initial-scale=1.0">
                        <title>Ingredients</title>
                        <style>
                            body {
                                font-family: Arial, sans-serif;
                                background-color: #f0f0f0;
                                padding: 20px;
                            }
                            .container {
                                max-width: 600px;
                                margin: 0 auto;
                                background-color: #fff;
                                border-radius: 8px;
                                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                                padding: 20px;
                            }
                            h2 {
                                text-align: center;
                                margin-bottom: 20px;
                            }
                            ul {
                                list-style-type: none;
                                padding: 0;
                                margin: 0;
                            }
                            li {
                                padding: 10px;
                                border-bottom: 1px solid #ccc;
                            }
                            li:last-child {
                                border-bottom: none;
                            }
                        </style>
                    </head>
                    <body>
                        <div class="container">
                            <h2>Ingredients</h2>';

    if ($ingredientResult->num_rows > 0) {
        $htmlContent .= '<ul>';
        while ($ingredientRow = $ingredientResult->fetch_assoc()) {
            $htmlContent .= '<li>' . htmlspecialchars($ingredientRow["Name"]) . '</li>';
        }
        $htmlContent .= '</ul>';
    } else {
        $htmlContent .= '<p>No ingredients found for this recipe.</p>';
    }

    $htmlContent .= '</div></body></html>';

    echo $htmlContent;

    $db->close();
} catch (Exception $e) {
    echo json_encode(['error' => "Error: " . $e->getMessage()]);
}
?>
