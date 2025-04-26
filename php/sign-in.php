<?php
session_start(); // Start the session


echo "<script>alert('Passwords do not match');</script>";

if(isset($_POST['email']) ){
    echo "<script>alert('uuuuuuuuu');</script>";

}

if (isset($_POST['emailIN']) && isset($_POST['passIn'])) {



    $email = $_POST['emailIN'];
    $password = $_POST['passIn'];





        try {
            $db = new mysqli("localhost", "root", "", "recipefinderdb");

            // Check connection
            if ($db->connect_error) {
                die("Connection failed: " . $db->connect_error);
            }
            echo "<script>alert('Incjjjjjjjjjjjjjjjjjjorrect Email or Password');</script>";


            $qry="select *from person where Email='$email' and Pass='$password'";
            $result=$db->query($qry);
            $db->commit();

            if($result->num_rows > 0){
                $row = $result->fetch_assoc();
                $_SESSION['username'] = $row['FName'].'  '.$row['LName']; // Adjust the key based on your database structure
                $_SESSION['email'] =$row['Email'];
                $_SESSION['birthdate'] = $row['Birthdate'];
                $_SESSION['gender'] = $row['Gender'];
                $_SESSION['password'] = $row['Pass'];


                if($row['Role'] == 'Admin'){

                    header("Location:../HTML/Admin.php");

                }
                else{
                    header("Location:../HTML/home.php");

                }


            }
            else{
                echo "<script>alert('Incorrect Email or Password');</script>";
                header("Location:../HTML/Sign-and-log-In.html");
            }
            /*
            echo $row['name'] . '           ' . $row['pass'] . '<br>';
            $row = $res->fetch_assoc();
            echo $row['name'] . '           ' . $row['pass'] . '<br>';   $row = $res->fetch_assoc();
            echo $row['name'] . '           ' . $row['pass'] . '<br>';
    */












            $db->close();

        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();

        }

    }


?>