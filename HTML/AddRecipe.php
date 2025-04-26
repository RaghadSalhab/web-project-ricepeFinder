<?php
session_start(); // Start the session

if (!isset($_SESSION['email'])) {
    header("Location:../HTML/Sign-and-log-In.html");
    exit();
}

$username = $_SESSION['username'];
$email = $_SESSION['email'];
$gender=$_SESSION['gender'];

if ($gender == 'Male') {
    $img1 = "../MainMenuBarPhoto/profile.png"; // Path to male image
} else {
    $img1 = "../MainMenuBarPhoto/businesswoman.png"; // Path to other image
}
?>
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Horizontal Menu</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
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

        body {
            background-image: url("../HomePageImages/body-bg.jpg");
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 700px;
            width: 100%;
            background-color: #fff;
            padding: 25px 30px;
            border-radius: 25px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.15);
            margin: 50px auto;
            border: #455a81 solid 2px;
        }

        .title {
            font-size: 25px;
            font-weight: 500;
            position: relative;
        }

        .title::before {
            content: "";
            position: absolute;
            left: 0;
            bottom: 0;
            height: 3px;
            width: 100%;
            border-radius: 5px;
            background: linear-gradient(135deg, #71b7e6, #9b59b6);
        }

        .content form .gender-details {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            margin: 20px 0 12px 0;
        }

        form .user-details .input-box {
            margin-bottom: 15px;
            width: calc(100% / 2 - 20px);
        }

        form .input-box span.details {
            display: block;
            font-weight: 500;
            margin-bottom: 5px;
        }

        .user-details .input-box input, .user-details .input-box textarea {
            height: 45px;
            width: 100%;
            outline: none;
            font-size: 16px;
            border-radius: 5px;
            padding-left: 15px;
            border: 1px solid #ccc;
            border-bottom-width: 2px;
            transition: all 0.3s ease;
        }

        .user-details .input-box textarea {
            height: 200px;
            padding-top: 10px;
            resize: none;
        }

        .user-details .input-box input:focus,
        .user-details .input-box input:valid,
        .user-details .input-box textarea:focus,
        .user-details .input-box textarea:valid {
            border-color: #248f8f;
        }

        .gender-details .gender-title,
        .cooking-style .cooking-title {
            font-size: 20px;
            font-weight: 500;
        }

        .category {
            display: flex;
            width: 100%;
            margin: 14px 0;
            justify-content: space-between;
        }

        .category label {
            display: flex;
            align-items: center;
            cursor: pointer;
        }

        .category label .dot {
            height: 18px;
            width: 18px;
            border-radius: 50%;
            margin-right: 10px;
            background: #d9d9d9;
            border: 5px solid transparent;
            transition: all 0.3s ease;
        }

        #hard:checked ~ .category label .one,
        #intermediateT:checked ~ .category label .two,
        #easy:checked ~ .category label .three,
        #short:checked ~ .category label .one,
        #intermediate:checked ~ .category label .two,
        #long:checked ~ .category label .three {
            background: #248f8f;
            border-color: #d9d9d9;
        }

        form input[type="radio"] {
            display: none;
        }

        form .button ,#addIng {
            height: 45px;
            margin: 35px 0;
        }
        input-box.a {
            height: 45px;
            margin: 35px 0;
        }
        form .button input,#addIng {
            height: 100%;
            width: 100%;
            border-radius: 5px;
            border: none;
            color: #fff;
            font-size: 18px;
            font-weight: 500;
            letter-spacing: 1px;
            cursor: pointer;
            transition: all 0.3s ease;
            background: linear-gradient(135deg, #248f8f, #455a81);
        }
        input-box.a input {
            height: 100%;
            width: 100%;
            border-radius: 5px;
            border: none;
            color: #fff;
            font-size: 18px;
            font-weight: 500;
            letter-spacing: 1px;
            cursor: pointer;
            transition: all 0.3s ease;
            background: linear-gradient(135deg, #248f8f, #455a81);
            text-decoration: none;
            border: #248f8f;
        }



        form .button input:hover {
            background: linear-gradient(135deg, #455a81, #248f8f);
        }

        input-box.a input:hover {
            background: linear-gradient(135deg, #455a81, #248f8f);
        }
        #addIng:hover {
            background: linear-gradient(135deg, #455a81, #248f8f);
        }

        @media(max-width: 584px) {
            .container {
                max-width: 100%;
            }

            form .user-details .input-box {
                margin-bottom: 15px;
                width: 100%;
            }

            .content form .user-details {
                max-height: 300px;
                overflow-y: scroll;
            }

            .user-details::-webkit-scrollbar {
                width: 5px;
            }
        }

        @media(max-width: 459px) {
            .container .content .category {
                flex-direction: column;
            }

            .user-details .input-box textarea {
                width: 100%;
            }
        }
    </style>
    <style>@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');</style>
</head>
<body>


<nav class="horizontal-menu">
    <ul class="menu">
        <li><a href="home.php"><img src="../MainMenuBarPhoto/home%20(2).png" style="width: 30px; height: 30px;margin-left: 3px;"><pre>Home</pre></a></li>
        <li><a href="User-P.php"><img src="../MainMenuBarPhoto/user.png" style="width: 30px; height: 30px;margin-left: 3px;"><pre>User</pre></a></li>
        <li><a href="mallet2.php"><img src="../MainMenuBarPhoto/recipe-book%20(2)%20(1).png" style="width: 30px; height: 30px;margin-left: 3px;"><pre>Recipes</pre></a></li>
        <li><a href="myRecipe.php."><img src="../MainMenuBarPhoto/meal%20(3)%20(1).png" style="width: 30px; height: 30px;margin-left: 3px;"><pre>My Recipe</pre></a></li>

        <li><a href="AddRecipe.php"><img src="../MainMenuBarPhoto/add%20(3).png" style="width: 30px; height: 30px;margin-left: 3px;"><pre>Add Recipe</pre></a></li>
        <li><a href="favorite.php"><img src="../MainMenuBarPhoto/heart.png" style="width: 30px; height: 30px;"><pre>Favorite</pre></a></li>
        <li class="chip">
            <img src="<?php echo $img1; ?>"" alt="Person" class="chipImg">
            <?php echo htmlspecialchars($username); ?>
        </li>
        <li class="chip2">
            <img onclick="        window.location.href = 'Sign-and-log-In.html';
" style="margin: 0px;padding: 0px;border: 2px #cccccc none;width: 100%;color: black;height: 50px;cursor: pointer" src="../MainMenuBarPhoto/logout%20(2).png"></img>
        </li>
    </ul>
</nav>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var menuItems = document.querySelectorAll('.horizontal-menu ul li a');

        menuItems.forEach(function(item) {
            item.addEventListener('click', function() {
                menuItems.forEach(function(menuItem) {
                    menuItem.style.backgroundColor = ''; // Reset background color
                });
            });
        });
    });</script>


<!DOCTYPE html>
<!-- Created By CodingLab - www.codinglabweb.com -->
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <title> Responsive Registration Form | CodingLab </title>
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>

<center>
    <div class="container">
        <div class="title" >New Recipe</div>
        <div class="content">
            <form action="../php/addRecipePage.php" method="post" enctype="multipart/form-data">
                <div class="user-details">
                    <div class="input-box" style="margin: 10px">
                        <span class="details">Recipe Name</span>
                        <input type="text" placeholder="Enter Recipe name" required name="RecipeName">
                    </div>

                    <div class="input-box" >
                        <span class="details">Upload Recipe Picture</span>
                        <input  type="file" accept="image/jpeg,image/png" name="upload" id="upload" required style="width: 94%;height: auto;padding-left: 0px">
                    </div>

                    <div class="input-box">
                        <span class="details">Recipe Description</span>
                        <textarea placeholder="Enter Recipe Description" required name="Description"></textarea>
                    </div>
                    <div class="input-box">
                        <span class="details" style="height: 30px;">Add ingredients</span>

                        <button id="addIng" onclick=" window.location.href = 'ingredients.html'" type="button">Add ingredient</button>
                    </div>


                </div>
                <div class="gender-details">
                    <input type="radio" name="gender" id="hard" value="hard">
                    <input type="radio" name="gender" id="intermediateT" value="intermediate">
                    <input type="radio" name="gender" id="easy" value="easy">
                    <span class="gender-title">cooking Level:</span>
                    <div class="category">
                        <label for="hard">
                            <span class="dot one"></span>
                            <span class="gender">hard</span>
                        </label>
                        <label for="intermediateT">
                            <span class="dot two"></span>
                            <span class="gender">intermediate</span>
                        </label>
                        <label for="easy">
                            <span class="dot three"></span>
                            <span class="gender">easy</span>
                        </label>
                    </div>
                </div>





                <div class="gender-details">
                    <input type="radio" name="Cooking_time" id="short" value="short">
                    <input type="radio" name="Cooking_time" id="intermediate" value="intermediate">
                    <input type="radio" name="Cooking_time" id="long" value="long">
                    <span class="gender-title">Cooking time:</span>
                    <div class="category">
                        <label for="short">
                            <span class="dot one"></span>
                            <span class="gender">short</span>
                        </label>
                        <label for="intermediate">
                            <span class="dot two"></span>
                            <span class="gender">intermediate</span>
                        </label>
                        <label for="long">
                            <span class="dot three"></span>
                            <span class="gender">long</span>
                        </label>
                    </div>
                </div>



                <div class="button">
                    <input type="submit" value="ADD" onclick="" name="submit" >
                </div>
            </form>
        </div>
    </div>
</center>


</body>
</html>


