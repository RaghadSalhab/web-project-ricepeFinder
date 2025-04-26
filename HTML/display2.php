<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display Data from MySQL</title>
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
            padding: 20px;
            background-image: url("../images/cement-texture.jpg");
        }
        .top-left-button {
            top: 10px;
            left: 10px;
            width: 40px;
            height: 40px;
            font-size: 14px;
        }
        .container {
            width: 100%;
            max-width: 800px;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            margin-bottom: 20px;
            box-sizing: border-box;
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
        .top-left-button::before {
            transform: rotate(45deg);
        }
        .top-left-button::after {
            transform: rotate(-45deg);
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: left;
        }
        th {
            background-color: #f4f4f4;
        }
        button {
            padding: 10px 20px;
            font-size: 16px;
            background-color: black;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        button:hover {
            background-color: #248f8f;
        }
        .button-container {
            width: 67%;
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

    </style>
</head>
<body>
<button class="top-left-button" onclick="location.href='Admin.php'"></button>
<div class="container">
</body>
</html>
<?php

// Database connection parameters
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

// SQL query to fetch data from the table 'person'
$sql = "SELECT FName, LName, Pass, Email FROM person where Role= 'Admin'";
$result = $conn->query($sql);

// Check if there are results and output the data
if ($result->num_rows > 0) {
    echo '<table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Last Name</th>
                    <th>Password</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>';
    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        echo '<tr>
                <td>' . htmlspecialchars($row["FName"]) . '</td>
                <td>' . htmlspecialchars($row["LName"]) . '</td>
                <td>' . htmlspecialchars($row["Pass"]) . '</td>
                <td>' . htmlspecialchars($row["Email"]) . '</td>
              </tr>';
    }
    echo '</tbody></table>';
} else {
    echo "0 results";
}

// Close the connection
$conn->close();


?>
</div>
<br><br>
<div class="button-container">
    <button style="height: 60px;" onclick="location.href= ' AddingNewAdmin.html' ">Crate New Admin</button>
    <button  style="height: 60px;" onclick="location.href='Admin.php'">Done</button>
</div>
