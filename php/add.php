<?php
session_start(); // Start the session

if (!isset($_SESSION['email'])) {
    header("Location:../HTML/Sign-and-log-In.html");
    exit();
}

$username = $_SESSION['username'];
$email = $_SESSION['email'];

header('Content-Type: application/json'); // Set the content type to JSON

try {
    $db = new mysqli("localhost", "root", "", "recipefinderdb");

    // Check connection
    if ($db->connect_error) {
        die(json_encode(['error' => "Connection failed: " . $db->connect_error]));
    }

    // Check if x is set in the POST request
    if (!isset($_POST['x'])) {
        echo json_encode(['error' => 'No value provided']);
        exit();
    }

    // Fetch the maximum reqID
    $maxReqIDQuery = "SELECT MAX(reqID) AS max_reqID FROM `requests`";
    $maxReqIDResult = $db->query($maxReqIDQuery);

    if ($maxReqIDResult) {
       echo "alert('Ingredient added successfully with reqID: ' + response.reqID);";

        $row = $maxReqIDResult->fetch_assoc();
        $maxReqID = $row['max_reqID'];
    } else {
        echo json_encode(['error' => 'Failed to fetch max reqID: ' . $db->error]);
        exit();
    }

    $maxReqID ++;


    $x = $db->real_escape_string($_POST['x']);
    $qry = "INSERT INTO `req-ingredient` (`reqID`, `IngID`) VALUES ('$maxReqID', '$x')";
    $res = $db->query($qry);

    if ($res) {
        echo json_encode(['success' => 'Ingredient created']);

        $db->commit();
        echo json_encode(['result' => 'added Successful']);
    } else {
        echo json_encode(['error' => 'Insert failed: ' . $db->error]);
    }

    $db->close();

} catch (Exception $e) {
    echo json_encode(['error' => "Error: " . $e->getMessage()]);
}
?>
