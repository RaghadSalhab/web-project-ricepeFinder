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
    <!-- ===== Link Swiper's CSS ===== -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css"/>

    <!-- ===== Fontawesome CDN Link ===== -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"/>

    <!-- ===== CSS ===== -->

    <style>
        body{
            background-image: url("../HomePageImages/body-bg.jpg");
        }

    </style>
    <style>
        .search {
            position: relative;
            padding: 10px;
        }

        .search_box {
            margin-left: 10px;
            width: 500px;
            height: 50px;
            border: #248f8f 3px solid;
            border-radius: 50px;
            padding-left: 20px;
        }

        .seach_btn {
            position: relative;
            top: 20px;
            background-color: transparent;
            border: none;
            cursor: pointer;
        }

        .searchByIng {
            margin-left: 10px;
            height: 50px;
            border: #248f8f 3px solid;
            border-radius: 50px;
            background-color: #248f8f;
            color: white;
            cursor: pointer;
        }

        @media (max-width: 768px) {
            .search_box {
                width: 100%;
                margin: 10px 0;
            }

            .seach_btn {
                top: 0;
            }

            .searchByIng {
                width: 100%;
                margin: 10px 0;
            }

            .search {
                text-align: center;
            }
        }

        @media (max-width: 480px) {
            .search_box {
                width: calc(100% - 50px);
            }

            .seach_btn {
                top: 0;
            }

            .searchByIng {
                width: calc(100% - 50px);
            }

            .search {
                padding: 5px;
            }
        }


    </style>


    <link rel="stylesheet" href="../css/RecipeShowAccording.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Font Awesome CDN Link for Icons -->
    <script src="../js/RecipeShowAccording.js" defer></script>


    <style>

        section{
            position: relative;
            height: 450px;
            width: 1075px;
            display: flex;
            align-items: center;
        }

        .swiper{
            margin-left: 20%;
            width: 950px;
        }

        .card{
            position: relative;
            background: #fff;
            border-radius: 20px;
            margin: 2% 0;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
        }

        .card::before{
            content: "";
            position: absolute;
            height: 40%;
            width: 100%;
            background:#248f8f;
            border-radius: 20px 20px 0 0;
        }


        .card .card-content{
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 30px;
            position: relative;
            z-index: 100;
        }

        section .card .image{
            height: 140px;
            width: 140px;
            border-radius: 50%;
            padding: 3px;
            background:#248f8f;
        }

        section .card .image img{
            height: 100%;
            width: 100%;
            object-fit: cover;
            border-radius: 50%;
            border: 3px solid #fff;
        }

        .card .media-icons{
            position: absolute;
            top: 10px;
            right: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .card .media-icons i{
            color: #fff;
            opacity: 0.6;
            margin-top: 10px;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .card .media-icons i:hover{
            opacity: 1;
        }

        .card .name-profession{
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 10px;
        }

        .name-profession .name{
            font-size: 20px;
            font-weight: 600;
        }

        .name-profession .profession{
            font-size:15px;
            font-weight: 500;
        }

        .card .rating{
            display: flex;
            align-items: center;
            margin-top: 18px;
        }

        .card .rating i{
            font-size: 18px;
            margin: 0 2px;
            color: #248f8f;
        }

        .card .button{
            width: 100%;
            display: flex;
            justify-content: space-around;
            margin-top: 20px;
        }

        .card .button button{
            background:#248f8f;
        ;
            outline: none;
            border: none;
            color: #fff;
            padding: 8px 22px;
            border-radius: 20px;
            font-size: 14px;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .button button:hover{
            background: #248f8f;
        }

        .swiper-pagination{
            position: absolute;
        }

        .swiper-pagination-bullet{
            height: 7px;
            width: 26px;
            border-radius: 25px;
            background: #248f8f;
        }

        .swiper-button-next, .swiper-button-prev{
            opacity: 0.7;
            color: #248f8f;
            transition: all 0.3s ease;
        }
        .swiper-button-prev{
            margin-left: 1px;
        }
        .swiper-button-next{
            margin-right: -15%;

        }
        .swiper-button-next:hover, .swiper-button-prev:hover{
            opacity: 1;
            color: #248f8f;
        }
        section{
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        .searchByIng{
            border: #245A8F 2px solid; border-radius: 50px;height: 50px;font-size: 20px;padding: 0px 10px;color: #eaeae8;
            background-color: #245A8F;
        }
        .searchByIng:hover{
            font-size: 20px;
            background-color: #248f8f;
            border-color: #248f8f;
            cursor: pointer;
        }
        /*responsive for white tab*/
        wrapper{

        }
        @media (max-width: 768px) {
            section {
                width: 100%;
                height: auto;
                text-align: left; /* Align text to the left */
                display: flex;
                flex-direction: column;
                align-items: flex-start; /* Align items to the left horizontally */
                justify-content: flex-start; /* Align items to the top vertically */
                padding: 20px;
            }

            .wrapper {
                flex-direction: column;
                margin-left: 0;
            }

            .tabs-box {
                flex-wrap: wrap;
            }

            .tab {
                width: 100%;
                flex: 1 1 50%;
                text-align: left; /* Align text to the left */
                display: flex;
                flex-direction: column;
                align-items: flex-start; /* Align items to the left horizontally */
                justify-content: flex-start; /* Align items to the top vertically */
                margin-bottom: 10px;
            }

            .card {
                margin: 20px auto;
            }

            .card .card-content {
                padding: 20px;
            }

            .card .button button {
                padding: 8px 16px;
                font-size: 12px;
            }
        }

        @media (max-width: 480px) {
            .tabs-box {
                display: block;
                text-align: left; /* Align text to the left */
            }

            .tab {
                display: inline-block;
                text-align: left; /* Align text to the left */
                margin: 5px 2px;
            }

            .card {
                width: 100%;
            }

            .card .card-content {
                padding: 15px;
            }

            .card .button button {
                padding: 6px 14px;
                font-size: 12px;
            }

            .icon {
                display: none;
            }
            .fa-solid fa-angle-left{
                display: none;
            }
            .section{
                margin-left: 0px;
            }
        }
    </style>
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
    </style>
    <style>
        /* Media Queries for Responsive Design */
        @media (max-width: 480px) {
            .swiper-button-prev,.swiper-button-next{
                display: none;

            }
            section {
                width: 100%;
                height: auto;
            }

            .swiper {
                width: 100%;
            }

            .swiper-wrapper {
                display: flex;
                flex-direction: column;
                flex-wrap: wrap;
            }

            .swiper-slide {
                width: 100%;
            }

            .card {
                margin: 10px 0;
            }

            .card .card-content {
                padding: 15px;
            }

            section .card .image {
                height: 100px;
                width: 100px;
            }

            .name-profession .name {
                font-size: 16px;
            }

            .name-profession .profession {
                font-size: 14px;
            }

            .card .rating i {
                font-size: 14px;
            }

            .card .button button {
                padding: 5px 15px;
                font-size: 12px;
            }
        }
        @media (max-width: 768px) {
            .swiper-button-prev,.swiper-button-next{
                display: none;

            }
            section {
                width: 80%;
                height: auto;
                display: flex;
                flex-direction: column;

                margin-left: 0px;
                padding-left: 0px;
            }

            .swiper {
                width: 80%;
            }

            .swiper-wrapper {
                display: flex;
                flex-direction: column;
                justify-content: left; /* Centers items vertically */
                margin-left: 5%;
            }

            .swiper-slide {
                width: 100%;
            }

            .card {
                margin: 10px 0;

            }

            .card .card-content {
                padding: 15px;
            }

            section .card .image {
                height: 150px;
                width: 200px;
            }

            .name-profession .name {
                font-size: 16px;
            }

            .name-profession .profession {
                font-size: 14px;
            }

            .card .rating i {
                font-size: 14px;
            }

            .card .button button {
                padding: 5px 15px;
                font-size: 12px;

            }
            .section{
                margin-left: 0px;
            }
        }

    </style>
    <style>
        .section{
            margin-left:10%
        }
        @media (max-width: 768px) {

            .section{
                margin-left:0%
            }

        }
        @media (max-width: 480px) {

            .section{
                padding-left:0%
            }

        }
    </style>
</head>
<body>

<nav class="horizontal-menu">
    <ul class="menu">
        <li><a href="home.php"><img src="../MainMenuBarPhoto/home%20(2).png" style="width: 30px; height: 30px;margin-left: 3px;"><pre>Home</pre></a></li>
        <li><a href="User-P.php"><img src="../MainMenuBarPhoto/user.png" style="width: 30px; height: 30px;margin-left: 3px;"><pre>User</pre></a></li>
        <li><a href="Recipes.php"><img src="../MainMenuBarPhoto/recipe-book%20(2)%20(1).png" style="width: 30px; height: 30px;margin-left: 3px;"><pre>Recipes</pre></a></li>
        <li><a href="myRecipe.php."><img src="../MainMenuBarPhoto/meal%20(3)%20(1).png" style="width: 30px; height: 30px;margin-left: 3px;"><pre>My Recipe</pre></a></li>

        <li><a href="AddRecipe.php"><img src="../MainMenuBarPhoto/add%20(3).png" style="width: 30px; height: 30px;margin-left: 3px;"><pre>Add Recipe</pre></a></li>
        <li><a href="favorite.php"><img src="../MainMenuBarPhoto/heart.png" style="width: 30px; height: 30px;"><pre>Favorite</pre></a></li>
        <li class="chip">
            <img src="<?php echo $img1; ?>" alt="Person" class="chipImg">
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
    });
</script>
<br>

<div><
    <center>
        <div class="wrapper" style=" ">
            <div class="icon"><i id="left" class="fa-solid fa-angle-left"></i></div>
            <ul class="tabs-box">
                <li class="tab active">ALL</li>
                <li class="tab">Easy</li>
                <li class="tab">intermedaite</li>
                <li class="tab">Hard</li>
                <li class="tab">short time</li>
                <li class="tab">meal type</li>
                <li class="tab">History</li>
                <li class="tab">Programming</li>
                <li class="tab">Gadgets</li>
                <li class="tab">Algorithms</li>
                <li class="tab">Comedy</li>
                <li class="tab">Gaming</li>
                <li class="tab">Share Market</li>
                <li class="tab">Smartphones</li>
                <li class="tab">Data Structure</li>
            </ul>
            <div class="icon"><i id="right" class="fa-solid fa-angle-right"></i></div>
        </div>
    </center>


    <div class="search">
        <center>
            <button class="seach_btn">        <img src="../ingredientPhoto/search%20(2).png" width="40px" height="50px" >
            </button>
            <input type="text" width="max-content" placeholder="    Search By Recipe Name" class="search_box">
            <button class="searchByIng" >Search By ingredients</button>
        </center>
    </div>
</div>
<div>

</div>
<!-- Swiper JS -->
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

<!-- Initialize Swiper -->

<!--     -->

<section  class="section" style="">

    <div class="swiper mySwiper container">
        <div class="swiper-wrapper content">

            <div class="swiper-slide card">
                <div class="card-content">
                    <div class="image">
                        <img src="../HomePageImages/slider-img2.png" alt="">
                    </div>

                    <div class="media-icons">
                        <i class="fab fa-facebook"></i>
                        <i class="fab fa-twitter"></i>
                        <i class="fab fa-github"></i>
                    </div>

                    <div class="name-profession">
                        <span class="name">soap</span>
                        <span class="profession">1-2hour</span>
                    </div>

                    <div class="rating">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i>
                        <i class="far fa-star"></i>
                    </div>

                    <div class="button">
                        <button class="aboutMe">About Me</button>
                        <button class="hireMe">Hire Me</button>
                    </div>
                </div>
            </div>
            <div class="swiper-slide card">
                <div class="card-content">
                    <div class="image">
                        <img src="images/img2.jpg" alt="">
                    </div>

                    <div class="media-icons">
                        <i class="fab fa-facebook"></i>
                        <i class="fab fa-twitter"></i>
                        <i class="fab fa-github"></i>
                    </div>

                    <div class="name-profession">
                        <span class="name">Someone Name</span>
                        <span class="profession">Web Developer</span>
                    </div>

                    <div class="rating">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i>
                        <i class="far fa-star"></i>
                    </div>

                    <div class="button">
                        <button class="aboutMe">About Me</button>
                        <button class="hireMe">Hire Me</button>
                    </div>
                </div>
            </div>
            <div class="swiper-slide card">
                <div class="card-content">
                    <div class="image">
                        <img src="images/img3.jpg" alt="">
                    </div>

                    <div class="media-icons">
                        <i class="fab fa-facebook"></i>
                        <i class="fab fa-twitter"></i>
                        <i class="fab fa-github"></i>
                    </div>

                    <div class="name-profession">
                        <span class="name">Someone Name</span>
                        <span class="profession">Web Developer</span>
                    </div>

                    <div class="rating">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i>
                        <i class="far fa-star"></i>
                    </div>

                    <div class="button">
                        <button class="aboutMe">About Me</button>
                        <button class="hireMe">Hire Me</button>
                    </div>
                </div>
            </div>
            <div class="swiper-slide card">
                <div class="card-content">
                    <div class="image">
                        <img src="images/img4.jpg" alt="">
                    </div>

                    <div class="media-icons">
                        <i class="fab fa-facebook"></i>
                        <i class="fab fa-twitter"></i>
                        <i class="fab fa-github"></i>
                    </div>

                    <div class="name-profession">
                        <span class="name">Someone Name</span>
                        <span class="profession">Web Developer</span>
                    </div>

                    <div class="rating">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i>
                        <i class="far fa-star"></i>
                    </div>

                    <div class="button">
                        <button class="aboutMe">About Me</button>
                        <button class="hireMe">Hire Me</button>
                    </div>
                </div>
            </div>
            <div class="swiper-slide card">
                <div class="card-content">
                    <div class="image">
                        <img src="images/img5.jpg" alt="">
                    </div>

                    <div class="media-icons">
                        <i class="fab fa-facebook"></i>
                        <i class="fab fa-twitter"></i>
                        <i class="fab fa-github"></i>
                    </div>

                    <div class="name-profession">
                        <span class="name">Someone Name</span>
                        <span class="profession">Web Developer</span>
                    </div>

                    <div class="rating">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i>
                        <i class="far fa-star"></i>
                    </div>

                    <div class="button">
                        <button class="aboutMe">About Me</button>
                        <button class="hireMe">Hire Me</button>
                    </div>
                </div>
            </div>
            <div class="swiper-slide card">
                <div class="card-content"   onclick="alert('welconllllllllllme')">
                    <div class="image">
                        <img src="alarm2.jpg" alt=""  onclick="alert('welconme')">
                    </div>

                    <div class="media-icons">
                        <i class="fab fa-facebook"></i>
                        <i class="fab fa-twitter"></i>
                        <i class="fab fa-github"></i>
                    </div>

                    <div class="name-profession">
                        <span class="name">Someone Name</span>
                        <span class="profession">Web Developer</span>
                    </div>

                    <div class="rating">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i>
                        <i class="far fa-star"></i>
                    </div>

                    <div class="button">
                        <button class="aboutMe">About Me</button>
                        <button class="hireMe">Hire Me</button>
                    </div>
                </div>
            </div>
            <div class="swiper-slide card">
                <div class="card-content">
                    <div class="image">
                        <img src="images/img7.jpg" alt="">
                    </div>

                    <div class="media-icons">
                        <i class="fab fa-facebook"></i>
                        <i class="fab fa-twitter"></i>
                        <i class="fab fa-github"></i>
                    </div>

                    <div class="name-profession">
                        <span class="name">Someone Name</span>
                        <span class="profession">Web Developer</span>
                    </div>

                    <div class="rating">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i>
                        <i class="far fa-star"></i>
                    </div>

                    <div class="button">
                        <button class="aboutMe">About Me</button>
                        <button class="hireMe">Hire Me</button>
                    </div>
                </div>
            </div>
            <div class="swiper-slide card">
                <div class="card-content">
                    <div class="image">
                        <img src="images/img8.jpg" alt="">
                    </div>

                    <div class="media-icons">
                        <i class="fab fa-facebook"></i>
                        <i class="fab fa-twitter"></i>
                        <i class="fab fa-github"></i>
                    </div>

                    <div class="name-profession">
                        <span class="name">Someone Name</span>
                        <span class="profession">Web Developer</span>
                    </div>

                    <div class="rating">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i>
                        <i class="far fa-star"></i>
                    </div>

                    <div class="button">
                        <button class="aboutMe">About Me</button>
                        <button class="hireMe">Hire Me</button>
                    </div>
                </div>
            </div>

            <div class="swiper-slide card">
                <div class="card-content">
                    <div class="image">
                        <img src="images/img8.jpg" alt="">
                    </div>

                    <div class="media-icons">
                        <i class="fab fa-facebook"></i>
                        <i class="fab fa-twitter"></i>
                        <i class="fab fa-github"></i>
                    </div>

                    <div class="name-profession">
                        <span class="name">Someone Name</span>
                        <span class="profession">Web Developer</span>
                    </div>

                    <div class="rating">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i>
                        <i class="far fa-star"></i>
                    </div>

                    <div class="button">
                        <button class="aboutMe">About Me</button>
                        <button class="hireMe">Hire Me</button>
                    </div>
                </div>
            </div>

        </div>
    </div>

    </div>
    </div>

    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
    <div class="swiper-pagination"></div>
</section>


<!-- Swiper JS -->

<!-- Initialize Swiper -->
<script>
    var swiper = new Swiper(".mySwiper", {
        slidesPerView: 3,
        spaceBetween: 30,
        slidesPerGroup: 3,
        loop: true,
        loopFillGroupWithBlank: true,
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        breakpoints: {
            // when window width is >= 0px
            0: {
                slidesPerView: 1,
                slidesPerGroup: 1,
                spaceBetween: 10,
                centeredSlides: false,

            },
            // when window width is >= 640px
            640: {
                slidesPerView: 2,
                slidesPerGroup: 2,
                spaceBetween: 20,
                centeredSlides: false,

            },
            // when window width is >= 1024px
            1024: {
                slidesPerView: 3,
                slidesPerGroup: 3,
                spaceBetween: 30,
            }
        }
    });
</script>


</body>
</html>