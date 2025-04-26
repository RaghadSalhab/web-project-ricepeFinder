<?php


echo "<script>alert('Passwords do not match');</script>";

if(isset($_POST['email']) ){
    echo "<script>alert('uuuuuuuuu');</script>";

}

if (isset($_POST['username']) && isset($_POST['birthdate'])&& isset($_POST['email']) && isset($_POST['pass']) && isset($_POST['conPass']) && isset($_POST['gender'])) {
    echo "<script>alert('ommmm');</script>";

    if (isset($_POST['username'])) {
        $name = explode(' ', trim($_POST['username']));
        $first_name = $name[0];
        $last_name = isset($name[1]) ? $name[1] : ''; // Assign last name if it exists, otherwise an empty string
        echo $first_name;
    }

    $bd = $_POST['birthdate'];
    $email = $_POST['email'];
    $password = $_POST['pass'];
    $confirmPassword = $_POST['confirmPassword'];
    $gender = $_POST['gender'];


    if ($_POST['pass'] != $_POST['conPass']) {
        echo "<script>alert('Passwords do not match');</script>";
        header('Location:../HTML/Sign-and-log-In.html');
    }

    else {
        try {
            $db = new mysqli("localhost", "root", "", "recipefinderdb");

            // Check connection
            if ($db->connect_error) {
                die("Connection failed: " . $db->connect_error);
            }

            $qry = "INSERT INTO `person` (`FName`, `LName`, `Email`, `Pass`, `Birthdate`, `Gender`, `Role`) VALUES ('".$first_name."', '".$last_name."', '".$email."', '".$password."','".$bd."', '".$gender."', 'User')";
        $res = $db->query($qry);
        $db->commit();
        echo "<script>alert('Registration Successful');</script>";

        if ($res === false) {
            throw new Exception("this user is used");
        } else {

            $_SESSION['username'] = $res['FName'].'  '.$res['LName']; // Adjust the key based on your database structure
            $_SESSION['email'] =$res['Email'];
            $_SESSION['birthdate'] = $res['Birthdate'];
            $_SESSION['gender'] = $res['Gender'];
            $_SESSION['password'] = $res['Pass'];

            header('Location:../HTML/Sign-and-log-In.html');
        }




        $db->close();

    } catch (Exception $e) {
            echo "Error: " . $e->getMessage();

        }

    }
    }

?>