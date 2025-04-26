<?php

session_start(); // Start the session to access session variables

// Establish database connection
$db = new mysqli("localhost", "root", "", "recipefinderdb");

// Check connection
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

// Fetch recipes from the database
$query = "SELECT * FROM requests WHERE ownerEmail = '$_SESSION[email]'";

$result = $db->query($query);

$username = $_SESSION['username'];
$email = $_SESSION['email'];
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Multiple Hover Effects</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            padding: 20px;
            flex-direction: column;
            align-items: center;
            background-color: #f0f0f0;
            gap: 20px;
        }
        .all{
            margin-top: 1%;
            display: flex;
            flex-direction: row;
            justify-content: space-evenly;
            flex-wrap: wrap;
        }

        .outdiv {
            background-color: #c2d6d6;
            width: 300px;
            height: 400px;
            position: relative;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: box-shadow 0.3s ease;
            margin: 10px;
        }

        .outdiv:hover {
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        .front {
            padding: 10px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .front .img {
            width: 100%;
            max-height: 200px;
            overflow: hidden;
        }

        .front .img img {
            width: 100%;
            height: auto;
        }

        .detail, .rating {
            width: 100%;
            padding: 10px;
            text-align: center;
            background-color: #f9f9f9;
            margin-top: 5px;
        }

        .way {
            display: none;
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(255, 255, 255, 0.9);
            padding: 20px;
            box-sizing: border-box;
            text-align: center;
        }

        .outdiv:hover .way {
            display: block;
        }

        .horizontal-menu {
            background-color: #248f8f;
            overflow: hidden;
        }

        .horizontal-menu ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: nowrap;
        }

        .horizontal-menu ul li {
            display: flex;
            align-items: center;
        }

        .horizontal-menu ul li a {
            display: block;
            color: white;
            text-align: center;
            padding: 14px 20px;
            text-decoration: none;
        }

        .horizontal-menu ul li a:hover {
            background-color: #248f8f;
            font-size: 20px;
            font-weight: bold;
        }

        .menu {
            display: flex;
            flex-grow: 1;
        }

        .menu li {
            flex: none;
        }

        .menu pre {
            font-size: 20px;
            font-family: 'Poppins', sans-serif;
        }

        .chip {
            padding: 0 25px;
            height: 50px;
            font-size: 16px;
            line-height: 50px;
            border-radius: 25px;
            background-color: #f1f1f1;
            color: #0c0c0c;
            display: flex;
            align-items:center;
            margin-left: auto;
        }

        .chip img {
            height: 50px;
            width: 50px;
            border-radius: 50%;
            margin-left: 10px;
        }

        @media (max-width: 768px) {
            .all {
                margin-top: 1%;
                display: flex;
                flex-direction: column;
                align-items: center; /* Centers items horizontally */
                justify-content: center; /* Centers items vertically */
            }
            .outdiv{
                margin-top: 10%;
            }
            .horizontal-menu ul {
                flex-wrap: wrap;
                justify-content: center;
            }

            .horizontal-menu ul li {
                flex: 1 1 auto;
            }

            .chip {
                order: 1;
                width: 100%;
                justify-content: center;
                margin: 10px 0;
            }

            .chip img {
                height: 40px;
                width: 40px;
            }

            .menu pre {
                font-size: 16px;
            }
        }

        @media (max-width: 480px) {
            .all {
                margin-top: 1%;
                display: flex;
                flex-direction: column;
                align-items: center; /* Centers items horizontally */
                justify-content: center; /* Centers items vertically */
            }
            .outdiv{
                margin-top: 10%;
                margin-left: 1%;
            }

            .horizontal-menu ul li a {
                padding: 20px;
                font-size: 14px;
            }

            .menu pre {
                font-size: 14px;
            }

            .chip {
                padding: 0 15px;
            }
        }
    </style>

    <script>
        function showIngredients(recipeID, button) {
            var popupWidth = 300; // Set the initial width of the popup
            var popupHeight = 300; // Set the initial height of the popup

            // Calculate position for the popup window to appear above the button
            var buttonRect = button.getBoundingClientRect(); // Get button's position relative to the viewport
            var leftOffset = window.screenX + buttonRect.left - (popupWidth / 2) + (button.offsetWidth / 2);
            var topOffset = window.screenY + buttonRect.top - popupHeight - 40;

            // Open the popup window
            var popup = window.open("show.php", "popup", "width=" + popupWidth + ",height=" + popupHeight + ",left=" + leftOffset + ",top=" + topOffset);

            var xhr = new XMLHttpRequest();
            xhr.open("GET", "show.php?recipeID=" + recipeID, true);
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    var content = xhr.responseText;
                    popup.document.write("<html><head><title>Ingredients</title></head><body>");
                    popup.document.write(content);
                    popup.document.write("</body></html>");

                    // Wait for the content to be fully loaded
                    popup.addEventListener('load', function() {
                        // Adjust popup size based on content size
                        var contentHeight = popup.document.documentElement.scrollHeight;
                        var contentWidth = popup.document.documentElement.scrollWidth;

                        // Add some padding to the height and width
                        popupWidth = Math.min(contentWidth + 40, screen.availWidth);
                        popupHeight = Math.min(contentHeight , screen.availHeight);

                        popup.resizeTo(popupWidth, popupHeight);
                    });
                }
            };
            xhr.send();
        }
    </script>


</head>
<body>
<form>

</form>
<div class="all">
    <?php
    if ($result->num_rows > 0) {
        $index=0;

        while($row = $result->fetch_assoc()) {
            $imageParts = explode('..', $row["Url"]);
            $imagePath = '..' . end($imageParts);
            $index++;

            echo '<div class="outdiv">
            <div class="front">
                <div class="img">
                    <img src="'.htmlspecialchars($imagePath).'" alt="Recipe Image">
                </div>
                <div class="detail">
                    <p>Recipe '.$index.':' . htmlspecialchars($row["name"]) .'</p>
                </div>
                
                <div class="rating">
                            
                    <p>Level :' . htmlspecialchars($row["level"]) . '</p>

                
                </div>
                     <div class="rating">
                            
                    <p>Time :' . htmlspecialchars($row["time"]) . '</p>

                
                </div>
                  <div class="rating">
                            
                    <p>Status :' . htmlspecialchars($row["Status"]) . '</p>

                
                </div>
            </div>
            <div class="way">
                <p>' . htmlspecialchars($row["Description"]) . '</p>
                <p>
    <button onclick="showIngredients('. $row["ReqID"] . ', this)" style="font-size:16px;background-color: #248f8f; color: white; border: none; padding: 10px 20px; border-radius: 5px; cursor: pointer; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
    View Ingredients
    </button>
    </p>


</div>
        </div>';
        }
    }
    else {
        echo "No recipes found.";
    }
    // Fetch the ingredients for the current recipe




    $db->close();
    ?>
</div>
</body>
</html>
