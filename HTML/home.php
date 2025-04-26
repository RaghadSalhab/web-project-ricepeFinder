
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

<!DOCTYPE html>
<html>

<head>
    <!-- Basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Site Metas -->
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome Icon Library -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>Delfood</title>


    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css" />

    <!-- fonts style -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,600,700&display=swap" rel="stylesheet">

    <!-- font awesome style -->
    <link href="../css/font-awesome.min.css" rel="stylesheet" />
    <!-- nice select -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/css/nice-select.min.css" integrity="sha256-mLBIhmBvigTFWPSCtvdu6a76T+3Xyt+K571hupeFLg4=" crossorigin="anonymous" />
    <!-- slidck slider -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css" integrity="sha256-UK1EiopXIL+KVhfbFa8xrmAWPeBjMVdvYMYkTAEv/HI=" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css.map" integrity="undefined" crossorigin="anonymous" />


    <!-- Custom styles for this template -->
    <link href="../css/Style2.css" rel="stylesheet" />
    <!-- responsive style -->
    <link href="../css/RecipeShowAccording.css" rel="stylesheet" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        .checked23 {
            color: orange;
        }
        .heading {
            font-family: Algerian;
            font-size: 25px;
            margin-right: 25px;
        }

        .fa {
            font-size: 25px;
        }

        .checked {
            color: orange;
        }

        /* Three column layout */
        .side {
            float: left;
            width: 15%;
            margin-top:10px;
        }

        .middle {
            margin-top:10px;
            float: left;
            width: 70%;
        }

        /* Place text to the right */
        .right {
            text-align: right;
        }

        /* Clear floats after the columns */
        .row:after {
            content: "";
            display: table;
            clear: both;
        }

        /* The bar container */
        .bar-container {
            width: 100%;
            background-color: #f1f1f1;
            text-align: center;
            color: white;
        }

        /* Individual bars */
        .bar-5 {width: 60%; height: 18px; background-color: #04AA6D;}
        .bar-4 {width: 30%; height: 18px; background-color: #2196F3;}
        .bar-3 {width: 10%; height: 18px; background-color: #00bcd4;}
        .bar-2 {width: 4%; height: 18px; background-color: #ff9800;}
        .bar-1 {width: 15%; height: 18px; background-color: #f44336;}

        /* Responsive layout - make the columns stack on top of each other instead of next to each other */
        @media (max-width: 400px) {
            .side, .middle {
                width: 100%;
            }
            .right {
                display: none;
            }
        }
        .containercc {
            position: relative;
            width: 100%;
        }

        .imagecc {
            display: block;
            width: 100%;
            height: auto;
        }

        .overlay {
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            height: 100%;
            width: 100%;
            opacity: 0;
            transition: .5s ease;
            background-color: #248f8f;
        }

        .containercc:hover .overlay {
            opacity: 1;
        }

        .textcc {
            color: white;
            font-size: 20px;
            position: absolute;
            top: 50%;
            left: 45%;
            -webkit-transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
            text-align: center;
        }
        .container2 {
            width: 100%;
            overflow: hidden; /* لضمان أن يحتوي الـ container على الـ divs العائمة */
        }
        .box2 {
            width: 30%;
            float: left;
            margin: 1.66%;

            padding: 20px;
            box-sizing: border-box;
            /* لضمان أن الحواف وال padding يكونوا داخل العرض المحدد */
        }

        .horizontal-menu {
            background-color: #248f8f;
            overflow: hidden;
        }

        .horizontal-menu ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
        }

        .horizontal-menu ul li {
            float: left;
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
            font-size:20px;
            font-weight: bold;


        }


        *{
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }


        .menu pre{
            font-size: 20px;
            font-family: 'Poppins', sans-serif;
        }
        #klkl
        {
            margin-left: 20px;
            margin-top: 5px;
            border: 4px double #248f8f;
            padding-right: 30px;
            width:1200px;
            padding-top: 13px;
        }
        .rating-container {
            display: flex;
        }

        .star {
            font-size: 2em;
            color: #d3d3d3;
            cursor: pointer;
            transition: color 0.3s;
        }

        .star:hover,
        .star:hover ~ .star {
            color: #ffd700;
        }

        .star.selected {
            color: #ffd700;
        }

        #rating-value {
            margin-top: 10px;
            font-size: 1.2em;
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
    <script>
        window.console = window.console || function(t) {};
    </script>



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
            <img src="<?php echo $img1; ?>" alt="Person" class="chipImg">
            <?php echo htmlspecialchars($username); ?>
        </li>
        <li class="chip2">
            <img onclick="        window.location.href = 'Sign-and-log-In.html';
" style="margin: 0px;padding: 0px;border: 2px #cccccc none;width: 100%;color: black;height: 50px;cursor: pointer" src="../MainMenuBarPhoto/logout%20(2).png"></img>
        </li>
    </ul>
</nav>
<script src="script.js">document.addEventListener("DOMContentLoaded", function() {
        var menuItems = document.querySelectorAll('.horizontal-menu ul li a');

        menuItems.forEach(function(item) {
            item.addEventListener('click', function() {
                menuItems.forEach(function(menuItem) {
                    menuItem.style.backgroundColor = ''; // Reset background color
                });
                item.style.backgroundColor = '#555'; // Set new background color
            });
        });
    });
</script>
<!--End of menu-->
<div class="hero_area">


    <!-- slider section -->
    <section class="slider_section ">
        <div class="container ">
            <div class="row">
                <div class="col-lg-10 mx-auto">
                    <div class="detail-box">
                        <h1 style="color:#000;">

                        </h1>
                        <pre id="klkl" style="color:#000; font-size: 20px;">
   <span style="font-size: 35px; font-family: Algerian">Welcome to our special word !</span>
  <br><span >
   We make sure that you will find any recipes you
want and  you will surly like it ...
             </span> </pre>

                    </div>
                    <div class="find_container ">
                        <div class="container">
                            <div class="row">
                                <div class="col">
                                    <form>
                                        <div class="form-row ">

                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="slider_container">
            <div class="item">
                <div class="img-box">
                    <img src="../HomePageImages/slider-img1.png" alt="" />
                </div>
            </div>
            <div class="item">
                <div class="img-box">
                    <img src="../HomePageImages/slider-img2.png" alt="" />
                </div>
            </div>
            <div class="item">
                <div class="img-box">
                    <img src="../HomePageImages/slider-img3.png" alt="" />
                </div>
            </div>
            <div class="item">
                <div class="img-box">
                    <img src="../HomePageImages/slider-img4.png" alt="" />
                </div>
            </div>
            <div class="item">
                <div class="img-box">
                    <img src="../HomePageImages/slider-img1.png" alt="" />
                </div>
            </div>
            <div class="item">
                <div class="img-box">
                    <img src="../HomePageImages/slider-img2.png" alt="" />
                </div>
            </div>
            <div class="item">
                <div class="img-box">
                    <img src="../HomePageImages/slider-img3.png" alt="" />
                </div>
            </div>
            <div class="item">
                <div class="img-box">
                    <img src="../HomePageImages/slider-img4.png" alt="" />
                </div>
            </div>
        </div>
    </section>
    <!-- end slider section -->
</div>
<br>
<br>
<div class="container2">
    <div class="box2" style="margin-left: 20px; height: 400px; border: 4px double #248f8f;">
  <pre style="font-family: Algerian ; font-size: 20px;">
    Why to choose us ??!</pre>
        <br>
        <pre style="font-family: Andalus">
    Choosing our recipe finder website means curb
    a world of culinary convenience and inspiration.
    Our platform offers a vast and diverse collection
    of recipes , meticulously curated from top chefs
    and home cooks alike,with user-friendly search
    options, personalized recommendations, and step
    by-step cooking guides ,we ensure  that both
    novice and experienced cooks can easily cooks
    can easily find and create delicious meals.
    create delicious meals , Our commitment to
    quality, variety, and community makes us the
    ultimate destination for  all your  culinary needs.
  </pre>
    </div>

    <div class="box2" style="margin-left: 20px; height: 400px; border: 4px double #248f8f;">
  <pre style="font-family: Algerian ; font-size: 20px;">
    Our - History ??!</pre>
        <br>
        <pre style="font-family: Andalus">
    Launched in 2024, our Recipe Finder app
    began as a simple database for sharing
    family recipes among friends , As interest grew,
    we expanded its features, Today, the app hosts
    hundreds of recipes from around the world,
    catering  to both novice cooks and professional
    chefs, and continues  to evolve with the latest
    culinary and technological trends.
  </pre>
    </div>
    <div class="box2" style="margin-left: 20px; height: 400px; border: 4px double #248f8f;">
  <pre style="font-family: Algerian ; font-size: 20px;">
    How we did our project ??!</pre>
        <br>
        <pre style="font-family: Andalus">
      Our project is based on preparing a web page
      based on HTML and JavaScript principles. We
      have prepared this project, which includes a
      number of HTML pages linked to each other and
      which have the ability to transfer data between
      them and store it from page to page so that the
      user can obtain it correctly and at the time
      he wants.
  </pre>
    </div>
</div>
<div class="container2">
    <div class="box2" style="margin-left: 20px; height: 400px; border: 4px double #248f8f;">
        <div class="containercc">
            <img src="../photo/tot.jpg" style="height: 350px;" alt="Avatar" class="imagecc">
            <div class="overlay">
                <div class="textcc">
          <pre>
  Fatina-Al-Taher

  Computer-Engineering
  Student

  Najah-National
  University

  Web-Developer
            </pre>
                </div>
            </div>
        </div>
    </div>
    <div class="box2" >
    <pre style="font-family: 'Arial Rounded MT Bold' ; font-size: 30px;">

           Our - Team's

           Information
    </pre>
        <br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;
        <img src="../photo/teamwork.png">
    </div>
    <div class="box2" style="margin-left: 20px; height: 400px; border: 4px double #248f8f;">
        <div class="containercc">
            <img src="../photo/y.jpg" style="height: 350px;" alt="Avatar" class="imagecc">
            <div class="overlay">
                <div class="textcc">
          <pre>
  Raghad-Salhab

  Computer-Engineering
  Student

  Najah-National
  University

  Web-Developer
            </pre>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<div class="container2">
    <div class="box2" style="width: 370px; height:400px;margin-left: 20px; ">
<pre class="heading" style="font-size: 23px">
  Because you got
  a part of our
  family, we will be
  happy if you rate
  our site after your
  experience ... .
</pre>
        <br>&nbsp;&nbsp;
        <div class="rating-container">
            <span class="star" data-value="1">&#9733;</span>
            <span class="star" data-value="2">&#9733;</span>
            <span class="star" data-value="3">&#9733;</span>
            <span class="star" data-value="4">&#9733;</span>
            <span class="star" data-value="5">&#9733;</span>
        </div>
        <div id="rating-value">Your Rating: <span id="rating">0</span></div>

        <script>
            document.addEventListener("DOMContentLoaded", function() {
                const stars = document.querySelectorAll(".star");
                const ratingValue = document.getElementById("rating");

                stars.forEach(star => {
                    star.addEventListener("click", () => {
                        const rating = star.getAttribute("data-value");
                        ratingValue.textContent = rating;

                        stars.forEach(s => {
                            s.classList.remove("selected");
                            if (s.getAttribute("data-value") <= rating) {
                                s.classList.add("selected");
                            }
                        });
                    });

                    star.addEventListener("mouseover", () => {
                        const rating = star.getAttribute("data-value");

                        stars.forEach(s => {
                            s.classList.remove("selected");
                            if (s.getAttribute("data-value") <= rating) {
                                s.classList.add("selected");
                            }
                        });
                    });

                    star.addEventListener("mouseout", () => {
                        const rating = ratingValue.textContent;

                        stars.forEach(s => {
                            s.classList.remove("selected");
                            if (s.getAttribute("data-value") <= rating) {
                                s.classList.add("selected");
                            }
                        });
                    });
                });
            });
        </script>
    </div>
    <div class="box2" style="width: 370px; height:400px;margin-left: 20px;">

    </div>
    <div class="box2" style="width: 400px; margin-left: 20px;"><!--for rating-->
        <span class="heading">User Rating</span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star"></span>
        <p style="font-family: Algerian">4.1 average based on 254 reviews.</p><br>
        <hr style="border:3px solid #f1f1f1">

        <div class="row">
            <div class="side">
                <div style="font-family: Algerian">5 star</div>
            </div>
            <div class="middle">
                <div class="bar-container">
                    <div class="bar-5"></div>
                </div>
            </div>
            <div class="side right">
                <div>150</div>
            </div>
            <div class="side">
                <div style="font-family: Algerian">4 star</div>
            </div>
            <div class="middle">
                <div class="bar-container">
                    <div class="bar-4"></div>
                </div>
            </div>
            <div class="side right">
                <div >63</div>
            </div>
            <div class="side">
                <div style="font-family: Algerian">3 star</div>
            </div>
            <div class="middle">
                <div class="bar-container">
                    <div class="bar-3"></div>
                </div>
            </div>
            <div class="side right">
                <div>15</div>
            </div>
            <div class="side">
                <div style="font-family: Algerian">2 star</div>
            </div>
            <div class="middle">
                <div class="bar-container">
                    <div class="bar-2"></div>
                </div>
            </div>
            <div class="side right">
                <div>6</div>
            </div>
            <div class="side">
                <div style="font-family: Algerian">1 star</div>
            </div>
            <div class="middle">
                <div class="bar-container">
                    <div class="bar-1"></div>
                </div>
            </div>
            <div class="side right">
                <div>20</div>
            </div>
        </div>
    </div>
</div>
<!-- footer section -->
<footer class="footer_section" style="background-color: #248f8f; margin-top: 20px;">
    <div class="container">
        <p>
            &copy; <span id="displayYear"></span> Web-Page about Recipes-Finder that simulates the
            <a href="https://www.supercook.com/#/desktop"><span style="font-weight: bold;font-family: Algerian;font-size: 15px;color: #0c0c0c">Recipe-Finder-Application.</span></a>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="https://www.facebook.com/fatina.altaher"> <span style="font-size: 15px;color: #0c0c0c;font-family: Algerian;font-weight: bold;">@Fatina-Al-Taher.</span></a><br>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="https://www.facebook.com/profile.php?id=100013369067899"> <span style="font-size: 15px;color: #0c0c0c;font-family: Algerian;font-weight: bold;">@Raghad-Salhab.</span></a>
            Distributed By: Fatina-Al-Taher-&&-Raghad-Salhab.
        </p>
    </div>
</footer>
<!-- footer section -->

<!-- jQery -->
<script src="../js/jquery-3.4.1.min.js"></script>
<!-- bootstrap js -->
<script src="../js/bootstrap.js"></script>
<!-- slick  slider -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.js"></script>
<!-- nice select -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/js/jquery.nice-select.min.js" integrity="sha256-Zr3vByTlMGQhvMfgkQ5BtWRSKBGa2QlspKYJnkjZTmo=" crossorigin="anonymous"></script>
<!-- custom js -->
<script src="../js/custom.js"></script>


</body>

</html>