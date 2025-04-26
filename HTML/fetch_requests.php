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

// Get the status from the URL parameter
$status = isset($_GET['status']) ? $_GET['status'] : 'all';

// Build SQL query based on status
if ($status == 'all') {
    $sql = "SELECT * FROM requests";
} else {
    $sql = "SELECT * FROM requests WHERE status = '$status'";
}

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table>";
    echo "<tr><th>ID</th><th>Name</th><th>UserEmail</th><th>Status</th><th>Action</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["ReqID"] . "</td>";
        echo "<td>" . $row["name"] . "</td>";
        echo "<td>" . $row["ownerEmail"] . "</td>";
        echo "<td>";
        echo "<select class='status-select status-" . strtolower($row["Status"]) . "' onchange='handleStatusChange(event, " . $row["ReqID"] . ")'>";
        echo "<option value='Waiting'" . ($row["Status"] == "Waiting" ? " selected" : "") . ">Waiting</option>";
        echo "<option value='Accepted'" . ($row["Status"] == "Accepted" ? " selected" : "") . ">Accepted</option>";
        echo "<option value='Rejected'" . ($row["Status"] == "Rejected" ? " selected" : "") . ">Rejected</option>";
        echo "</select>";
        echo "</td>";
        echo "<td><button style='font-size:16px;background-color: #248f8f; color: white; border: none; padding: 10px 20px; border-radius: 5px; cursor: pointer; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); transition: background-color 0.3s ease;' onclick='viewDetails(" . $row["ReqID"] . ")'>View Details</button></td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No results found.";
}

$conn->close();
?>
