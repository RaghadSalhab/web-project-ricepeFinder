<!DOCTYPE html>
<html>
<head>
    <title>Update Password</title>
</head>
<body>
<form action="update_password.php" method="post">
    <label for="fname" style="font-family: Andalus;font-weight: bold;font-size: 30px">Enter The First Name :         </label>
    <input type="text" id="fname" name="fname" required><br><br><br><br>

    <label for="newpass" style="font-family: Andalus;font-weight: bold;font-size: 30px">Enter New Password :                    </label>
    <input type="password" id="newpass" name="newpass" required><br><br>
<br><br>
    <input type="submit" style="font-family: Andalus;font-weight: bold;font-size: 20px"value="Update Password" >
</form>
</body>
</html>
<?php
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $fname = $_POST['fname'];
    $newPass = $_POST['newpass'];

    // Database connection
    $servername = "localhost";  // or your server address
    $username = "root";         // your MySQL username
    $password = "";             // your MySQL password
    $dbname = "recipefinderdb";  // your database name

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // SQL query to update password
    $sql = "UPDATE person SET Pass = '$newPass' WHERE FName = '$fname'";

    if ($conn->query($sql) === TRUE) {
        echo "Password updated successfully for $fname";
    } else {
        echo "Error updating password: " . $conn->error;
    }

    // Close connection
    $conn->close();
}
?>
