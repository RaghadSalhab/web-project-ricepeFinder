

<?php
$servername = "localhost";
$username = "root";  // Replace with your MySQL username
$password = "";      // Replace with your MySQL password
$dbname = "recipefinderdb";  // Replace with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['ingredient'])) {
    $ingredientName = $_GET['ingredient'];

    // Prepare and bind for the first query to get IngID
    $stmt = $conn->prepare("SELECT IngID FROM ingredient WHERE Name = ?");
    if ($stmt) {
        $stmt->bind_param("s", $ingredientName);  // Bind ingredientName as string
        $stmt->execute();
        $stmt->bind_result($IngID);
        $stmt->fetch();
        $stmt->close();

        if (isset($IngID)) {
            // Prepare and bind for the second query to get reqIDs
            $stmt = $conn->prepare("SELECT reqID FROM `req-ingredient` WHERE IngID = ?");
            if ($stmt) {
                $stmt->bind_param("i", $IngID);  // Bind IngID as integer
                $stmt->execute();
                $result = $stmt->get_result();
                $reqIDs = [];

                while ($row = $result->fetch_assoc()) {
                    $reqIDs[] = $row['reqID'];
                }

                $stmt->close();

                if (!empty($reqIDs)) {
                    // Prepare the third query to get Url, name, description, time, and level from requests table
                    $placeholders = implode(',', array_fill(0, count($reqIDs), '?'));
                    $stmt = $conn->prepare("SELECT RecImgUrl, name, description, time, level FROM recipe WHERE id IN ($placeholders)");

                    if ($stmt) {
                        $types = str_repeat('i', count($reqIDs));
                        $stmt->bind_param($types, ...$reqIDs);
                        $stmt->execute();
                        $result = $stmt->get_result();
                        $data = [];

                        while ($row = $result->fetch_assoc()) {
                            $data[] = $row;
                        }

                        $stmt->close();

                        if (!empty($data)) {
                            // Return the data as JSON
                            echo json_encode($data);
                        } else {
                            echo json_encode(["error" => "No recipes found for these reqIDs."]);
                        }
                    } else {
                        echo json_encode(["error" => "Error preparing the third statement: " . $conn->error]);
                    }
                } else {
                    echo json_encode(["error" => "No reqIDs found for this ingredient."]);
                }
            } else {
                echo json_encode(["error" => "Error preparing the second statement: " . $conn->error]);
            }
        } else {
            echo json_encode(["error" => "No ingredient found with that name."]);
        }
    } else {
        echo json_encode(["error" => "Error preparing the first statement: " . $conn->error]);
    }
} else {
    echo json_encode(["error" => "Ingredient name is not set."]);
}

$conn->close();
?>
