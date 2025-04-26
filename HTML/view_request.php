

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
<style>body {
        padding: 20px;
        display: flex; /* Changed from flex-direction to display flex */
        flex-direction: column;
        align-items: center;
        background-color: #f0f0f0;
        gap: 20px;
    }

    .container {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        width: 100%;
        max-width: 1200px;
        background-color: white;
        padding: 20px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
    }

    .details-section {
        flex: 1;
        margin-right: 20px;
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

// Get request ID from URL parameter
$requestId = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Fetch request details from database
$sql = "SELECT * FROM requests WHERE ReqID = $requestId";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $imageParts = explode('..', $row["Url"]);
    $imagePath = '..' . end($imageParts);
    echo '<div class="container">'; // Add container div

    // Details section
    echo '<div class="details-section">';
    echo "<h2>Request Details</h2>";
    echo '<img style="width:100px; height:100px;" src="'.htmlspecialchars($imagePath).'" alt="Recipe Image">';
    echo "<p><strong>ID:</strong> " . $row["ReqID"] . "</p>";
    echo "<p><strong>Name:</strong> " . $row["name"] . "</p>";
    echo "<p><strong>User Email:</strong> " . $row["ownerEmail"] . "</p>";
    echo "<p><strong>Status:</strong> " . $row["Status"] . "</p>";
    echo "<p><strong>Level:</strong> " . $row["level"] . "</p>";
    echo "<p><strong>Time:</strong> " . $row["time"] . "</p>";
    echo "<p><strong>Description:</strong>" . $row["Description"] . "</p>";
    echo '</div>';

    // Outdiv section
    echo '<div class="outdiv">';
    echo '<div class="front">';
    echo '<div class="img"><img src="'.htmlspecialchars($imagePath).'" alt="Recipe Image"></div>';
    echo '<div class="detail"><p>Recipe '.htmlspecialchars($row["ReqID"]).':' . htmlspecialchars($row["name"]) .'</p></div>';
    echo '<div class="rating"><p>Level :' . htmlspecialchars($row["level"]) . '</p></div>';
    echo '<div class="rating"><p>Time :' . htmlspecialchars($row["time"]) . '</p></div>';
    echo '<div class="rating"><p>Status :' . htmlspecialchars($row["Status"]) . '</p></div>';
    echo '</div>';
    echo '<div class="way"><p>' . htmlspecialchars($row["Description"]) . '</p>';
    echo '<p><button onclick="showIngredients('. $row["ReqID"] . ', this)" style="font-size:16px;background-color: #248f8f; color: white; border: none; padding: 10px 20px; border-radius: 5px; cursor: pointer; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">View Ingredients</button></p>';
    echo '</div>';
    echo '</div>';

    echo '</div>'; // Close container div
} else {
    echo "No details found.";
}

$conn->close();
?>

