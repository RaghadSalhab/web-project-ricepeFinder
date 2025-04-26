<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "recipefinderdb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$response = [];
$sql = "SELECT * FROM recipe";
$params = [];
$conditions = [];

// Building SQL query based on GET parameters
if (isset($_GET['level'])) {
    $conditions[] = "level = ?";
    $params[] = $_GET['level'];
}

if (isset($_GET['time'])) {
    $conditions[] = "time = ?";
    $params[] = $_GET['time'];
}

if (isset($_GET['name'])) {
    $conditions[] = "name LIKE ?";
    $params[] = '%' . $_GET['name'] . '%';
}

// Append WHERE clause if there are conditions
if (count($conditions) > 0) {
    $sql .= " WHERE " . implode(" AND ", $conditions);
}

// Prepare SQL statement
$stmt = $conn->prepare($sql);

if ($stmt) {
    // Bind parameters if there are any
    if (count($params) > 0) {
        $types = str_repeat('s', count($params));
        $stmt->bind_param($types, ...$params);
    }

    // Execute query
    $stmt->execute();

    // Get result set
    $result = $stmt->get_result();

    // Fetch data and adjust image URLs
    while ($row = $result->fetch_assoc()) {
        // Adjusting the image URL path
        $row['RecImgUrl'] = 'uploads/' . basename($row['RecImgUrl']);
        $response[] = $row;
    }

    // Close statement
    $stmt->close();
}

// Close connection
$conn->close();

// Set response content type
header('Content-Type: application/json');

// Output JSON encoded response
echo json_encode($response);
?>
