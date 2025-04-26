<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Table with Buttons</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            background-color: #f0f0f0;
            position: relative;
            padding: 20px;
            box-sizing: border-box;
            background-image: url("../images/cement-texture.jpg");
        }
        .top-left-button {
            position: absolute;
            top: 20px;
            left: 20px;
            background-color: black;
            color: white;
            border: none;
            border-radius: 50%;
            cursor: pointer;
            font-size: 16px;
            width: 50px;
            height: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: background-color 0.3s;
        }
        .top-left-button:hover {
            background-color: #248f8f;
        }
        .top-left-button::before, .top-left-button::after {
            content: '';
            position: absolute;
            width: 20px;
            height: 2px;
            background-color: white;
        }
        .top-left-button::before {
            transform: rotate(45deg);
        }
        .top-left-button::after {
            transform: rotate(-45deg);
        }
        .table-container {
            width: 100%;
            max-width: 600px;
            overflow-x: auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            margin-bottom: 20px;
            box-sizing: border-box;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: left;
        }
        th {
            background-color: #f4f4f4;
        }
        .button-container {
            width: 100%;
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }
        .button-container button {
            flex: 1;
            max-width: 120px;
            height: 40px;
            background-color: black;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            margin: 0 10px;
            box-sizing: border-box;
            transition: background-color 0.3s;
        }
        .button-container button:hover {
            background-color: #248f8f;
        }
        @media (max-width: 600px) {
            .button-container {
                flex-direction: column;
                align-items: center;
            }
            .button-container button {
                width: 100%;
                max-width: none;
                margin: 5px 0;
            }
            .top-left-button {
                top: 10px;
                left: 10px;
                width: 40px;
                height: 40px;
                font-size: 14px;
            }
            .top-left-button::before, .top-left-button::after {
                width: 16px;
            }
        }
    </style>
</head>
<body>
<button class="top-left-button" onclick="location.href='Admin.php'"></button>
<div class="table-container">
<?php
// Database connection
$servername = "localhost";  // Typically 'localhost' if using XAMPP
$username = "root";         // Default XAMPP username
$password = "";             // Default XAMPP password
$dbname = "recipefinderdb";  // Replace with your actual database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to fetch data
$sql = "SELECT FName, Pass FROM person WHERE Role = 'User' ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table><tr><th>Name</th><th>Password</th></tr>";
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["FName"] . "</td><td>" . $row["Pass"] . "</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

// Close connection
$conn->close();
?>
</div>
<div class="button-container">
    <button onclick="location.href= ' UpdatingOperation.html' ">Update</button>
    <button onclick="location.href='Admin.html'">Done</button>
</div>
</body>
</html>
