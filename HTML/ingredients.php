<?php
session_start(); // Start the session

if (!isset($_SESSION['email'])) {
    header("Location:../HTML/Sign-and-log-In.html");
    exit();
}

$username = $_SESSION['username'];
$email = $_SESSION['email'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <script>
        function  showMore1(x){
            document.getElementById("showmoreContainer"+x).style="display: inline-block;"
            document.getElementById("showMore"+x).style="display:none;"
            document.getElementById("showLess"+x).style="display:block;"

        }
        function  showLess1(x){
            document.getElementById("showmoreContainer"+x).style="display:none;"
            document.getElementById("showLess"+x).style="display:none;"
            document.getElementById("showMore"+x).style="display:block;"

        }

    </script>
    <style>
        body{


        }
        .Warehouse_basics{
            border-radius:50px;

            border: #070e6a solid 5px;
            margin-top: 100px;
            margin-left: 60px;
            padding: 50px;
            width: 40%;
            background-color: #f1f1f1;

        }
        .Fruit{
            border-radius:50px;
            border: #070e6a solid 5px;
            margin-top: 100px;
            margin-left: 60px;
            padding: 50px;
            width: 40%;
            background-color: #f1f1f1;

        }
        .vegetable{
            border-radius:50px;
            border: #070e6a solid 5px;
            margin-top: 30px;
            margin-left: 60px;
            padding: 50px;
            width: 37%;
            background-color: #f1f1f1;

        }

        .meat{
            border-radius:50px;
            border: #070e6a solid 5px;
            margin-top: 30px;
            margin-left: 60px;

            padding: 50px;
            width: 37%;
            background-color: #f1f1f1;

        }






        #showMore1,#showLess1,#showMore2,#showLess2,#showMore3,#showLess3,#showMore4,#showLess4{
            display: block;
            cursor: pointer;
            margin-top: 10px;
            text-align: center;
            border-radius: 15px;
            color: #070e6a;
            font-size: 20px;
            font-weight: bold;


        }
        .mainNames{
            font-weight: bolder;
            font-size: 20px;
            position: relative;
            margin-left: 10px;
            top: -25px;
        }
        #showMore1:hover,#showMore2:hover,#showMore3:hover,#showMore4:hover{
            background-color: #070e6a;
            color: #eaeae8;
        }
        #showLess1:hover, #showLess2:hover, #showLess3:hover, #showLess4:hover{
            background-color: #070e6a;
            color: #eaeae8;
        }

        .card-container {
            display: flex;
            gap: 20px; /* Adds space between the cards */

        }

        .maincontainer {
            width: 75px;
            height: 75px;
            perspective: 1000px; /* Adds perspective for 3D effect */
        }

        .thecard {
            position: relative;
            width: 100%;
            height: 100%;
            border-radius: 10px;
            transform-style: preserve-3d;
            transition: transform 0.8s ease;
        }

        .maincontainer:hover .thecard {
            transform: rotateY(180deg);
        }

        .thefront, .theback {
            position: absolute;
            width: 100%;
            height: 100%;
            border-radius: 10px;
            backface-visibility: hidden;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
        }

        .thefront {
            background: #248f8f;
            color: #000;
        }
        .showmoreContainer{
            margin-top: 20px;
            display: none;

        }

        .theback {
            background: #fafafa;
            color: #333;
            transform: rotateY(180deg);
        }

        .thefront h1, .theback h1 {
            font-weight: bold;
            font-size: 18px;
            color:white;

        }
        /*
                .thefront p, .theback p {
                    font-family: Algerian;
                    font-weight: bolder;
                    font-size: 12px;
                }*/
        .search{
            position: relative;

            top: 55px;
        }
        .search_box{

            margin-left: 10px;
            width: 400px;
            height: 30px;
            border: #248f8f 3px solid;
            border-radius: 50px;
        }
        .allIng{
            display: flex;
        }
    </style>
</head>
<body>
<div>
    <button id=" close_button" style="float: right; background-color: transparent;border: none")><img src="../ingredientPhoto/close-button%20(1).png" width="50px" height="50px" ></button>
</div>
<div class="search">
    <center>
        <img src="../ingredientPhoto/search%20(2).png" width="30px" height="30px">
        <input type="text" width="max-content" placeholder="Search" class="search_box"></center>
</div>
<div class="allIng">
    <div  class="Warehouse_basics">
        <img src="../ingredientPhoto/warehouse.png" width="80px" height="80px" ><span class="mainNames">Warehouse basics</span>
        <input type="checkbox" id="ch1" style="display: none">
        <div class="card-container">
            <div class="maincontainer">
                <div class="thecard">
                    <div class="thefront">
                        <h1>egg</h1>
                    </div>
                    <div class="theback">
                        <img src="../ingredientPhoto/egg.png" width="50px" height="50px">
                        <button onclick="">Submit</button>
                    </div>
                </div>
            </div>
            <div class="maincontainer">
                <div class="thecard">
                    <div class="thefront">
                        <h1>potato</h1>
                    </div>
                    <div class="theback">
                        <img src="../ingredientPhoto/potatoes.png" width="50px" height="50px">
                        <button>Submit</button>
                    </div>
                </div>
            </div>
            <div class="maincontainer">
                <div class="thecard">
                    <div class="thefront">
                        <h1>garlic</h1>
                    </div>
                    <div class="theback">
                        <img src="../ingredientPhoto/garlic.png" width="50px" height="50px">
                        <button>Submit</button>
                    </div>
                </div>
            </div>
            <div class="maincontainer">
                <div class="thecard">
                    <div class="thefront">
                        <h1>tomato</h1>
                    </div>
                    <div class="theback">
                        <img src="../ingredientPhoto/tomato.png" width="50px" height="50px">
                        <button>Submit</button>
                    </div>
                </div>
            </div>
            <div class="maincontainer">
                <div class="thecard">
                    <div class="thefront">
                        <h1>onion</h1>
                    </div>
                    <div class="theback">
                        <img src="../ingredientPhoto/onion.png" width="50px" height="50px">
                        <button>Submit</button>
                    </div>
                </div>
            </div>
            <div class="maincontainer">
                <div class="thecard">
                    <div class="thefront">
                            <h1>pasta</h1>
                    </div>
                    <div class="theback">
                        <img src="../ingredientPhoto/spaghetti.png" width="50px" height="50px">
                        <button>Submit</button>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="card-container">
            <div class="maincontainer">
                <div class="thecard">
                    <div class="thefront">
                        <h1>milk</h1>
                    </div>
                    <div class="theback">
                        <img src="../ingredientPhoto/milk.png" width="50px" height="50px">
                        <button>Submit</button>
                    </div>
                </div>
            </div>
            <div class="maincontainer">
                <div class="thecard">
                    <div class="thefront">
                        <h1>flour</h1>
                    </div>
                    <div class="theback">
                        <img src="../ingredientPhoto/flour.png" width="50px" height="50px">
                        <button>Submit</button>
                    </div>
                </div>
            </div>
            <div class="maincontainer">
                <div class="thecard">
                    <div class="thefront">
                        <h1>sugar</h1>
                    </div>
                    <div class="theback">
                        <img src="../ingredientPhoto/sugar.png" width="50px" height="50px">
                        <button>Submit</button>
                    </div>
                </div>
            </div>
            <div class="maincontainer">
                <div class="thecard">
                    <div class="thefront">
                        <h1>olive oil</h1>
                    </div>
                    <div class="theback">
                        <img src="../ingredientPhoto/olive-oil.png" width="50px" height="50px">
                        <button>Submit</button>
                    </div>
                </div>
            </div>
            <div class="maincontainer">
                <div class="thecard">
                    <div class="thefront">
                        <h1>butter</h1>
                    </div>
                    <div class="theback">
                        <img src="../ingredientPhoto/butter.png" width="50px" height="50px">

                        <button>Submit</button>
                    </div>
                </div>
            </div>
            <div class="maincontainer">
                <div class="thecard">
                    <div class="thefront">
                        <h1>hot pepper</h1>
                    </div>
                    <div class="theback">
                        <img src="../ingredientPhoto/chili-pepper.png" width="50px" height="50px">
                        <button>Submit</button>
                    </div>
                </div>
            </div>


        </div>
        <label for="ch1" id="showMore1"  onclick="showMore1(1)">show more</label>

        <div class="showmoreContainer" id="showmoreContainer1">
            <div class="card-container">
                <div class="maincontainer">
                    <div class="thecard">
                        <div class="thefront">
                            <h1>egg</h1>
                        </div>
                        <div class="theback">
                            <img src="../ingredientPhoto/egg.png" width="50px" height="50px">
                            <button>Submit</button>
                        </div>
                    </div>
                </div>
                <div class="maincontainer">
                    <div class="thecard">
                        <div class="thefront">
                            <h1>potato</h1>
                        </div>
                        <div class="theback">
                            <img src="../ingredientPhoto/potatoes.png" width="50px" height="50px">
                            <button>Submit</button>
                        </div>
                    </div>
                </div>
                <div class="maincontainer">
                    <div class="thecard">
                        <div class="thefront">
                            <h1>garlic</h1>
                        </div>
                        <div class="theback">
                            <img src="../ingredientPhoto/garlic.png" width="50px" height="50px">
                            <button>Submit</button>
                        </div>
                    </div>
                </div>
                <div class="maincontainer">
                    <div class="thecard">
                        <div class="thefront">
                            <h1>tomato</h1>
                        </div>
                        <div class="theback">
                            <img src="../ingredientPhoto/tomato.png" width="50px" height="50px">
                            <button>Submit</button>
                        </div>
                    </div>
                </div>
                <div class="maincontainer">
                    <div class="thecard">
                        <div class="thefront">
                            <h1>onion</h1>
                        </div>
                        <div class="theback">
                            <img src="../ingredientPhoto/onion.png" width="50px" height="50px">
                            <button>Submit</button>
                        </div>
                    </div>
                </div>
                <div class="maincontainer">
                    <div class="thecard">
                        <div class="thefront">
                            <h1>pasta</h1>
                        </div>
                        <div class="theback">
                            <img src="../ingredientPhoto/spaghetti.png" width="50px" height="50px">
                            <button>Submit</button>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="card-container">
                <div class="maincontainer">
                    <div class="thecard">
                        <div class="thefront">
                            <h1>milk</h1>
                        </div>
                        <div class="theback">
                            <img src="../ingredientPhoto/milk.png" width="50px" height="50px">
                            <button>Submit</button>
                        </div>
                    </div>
                </div>
                <div class="maincontainer">
                    <div class="thecard">
                        <div class="thefront">
                            <h1>flour</h1>
                        </div>
                        <div class="theback">
                            <img src="../ingredientPhoto/flour.png" width="50px" height="50px">
                            <button>Submit</button>
                        </div>
                    </div>
                </div>
                <div class="maincontainer">
                    <div class="thecard">
                        <div class="thefront">
                            <h1>sugar</h1>
                        </div>
                        <div class="theback">
                            <img src="../ingredientPhoto/sugar.png" width="50px" height="50px">
                            <button>Submit</button>
                        </div>
                    </div>
                </div>
                <div class="maincontainer">
                    <div class="thecard">
                        <div class="thefront">
                            <h1>olive oil</h1>
                        </div>
                        <div class="theback">
                            <img src="../ingredientPhoto/olive-oil.png" width="50px" height="50px">
                            <button>Submit</button>
                        </div>
                    </div>
                </div>
                <div class="maincontainer">
                    <div class="thecard">
                        <div class="thefront">
                            <h1>butter</h1>
                        </div>
                        <div class="theback">
                            <img src="../ingredientPhoto/butter.png" width="50px" height="50px">

                            <button>Submit</button>
                        </div>
                    </div>
                </div>
                <div class="maincontainer">
                    <div class="thecard">
                        <div class="thefront">
                            <h1>hot pepper</h1>
                        </div>
                        <div class="theback">
                            <img src="../ingredientPhoto/chili-pepper.png" width="50px" height="50px">
                            <button>Submit</button>
                        </div>
                    </div>
                </div>


            </div>
            <label for="ch1" id="showLess1"  onclick="showLess1(1)">show less</label>

        </div>










    </div>
    <!--end of warehouse-->
    <div  class="Fruit">
        <img src="../ingredientPhoto/fruit.png" width="80px" height="80px" ><span class="mainNames">Fruit</span>
        <input type="checkbox" id="ch2" style="display: none">
        <div class="card-container">
            <div class="maincontainer">
                <div class="thecard">
                    <div class="thefront">
                        <h1>egg</h1>
                    </div>
                    <div class="theback">
                        <img src="../ingredientPhoto/egg.png" width="50px" height="50px">
                        <button>Submit</button>
                    </div>
                </div>
            </div>
            <div class="maincontainer">
                <div class="thecard">
                    <div class="thefront">
                        <h1>potato</h1>
                    </div>
                    <div class="theback">
                        <img src="../ingredientPhoto/potatoes.png" width="50px" height="50px">
                        <button>Submit</button>
                    </div>
                </div>
            </div>
            <div class="maincontainer">
                <div class="thecard">
                    <div class="thefront">
                        <h1>garlic</h1>
                    </div>
                    <div class="theback">
                        <img src="../ingredientPhoto/garlic.png" width="50px" height="50px">
                        <button>Submit</button>
                    </div>
                </div>
            </div>
            <div class="maincontainer">
                <div class="thecard">
                    <div class="thefront">
                        <h1>tomato</h1>
                    </div>
                    <div class="theback">
                        <img src="../ingredientPhoto/tomato.png" width="50px" height="50px">
                        <button>Submit</button>
                    </div>
                </div>
            </div>
            <div class="maincontainer">
                <div class="thecard">
                    <div class="thefront">
                        <h1>onion</h1>
                    </div>
                    <div class="theback">
                        <img src="../ingredientPhoto/onion.png" width="50px" height="50px">
                        <button>Submit</button>
                    </div>
                </div>
            </div>
            <div class="maincontainer">
                <div class="thecard">
                    <div class="thefront">
                        <h1>pasta</h1>
                    </div>
                    <div class="theback">
                        <img src="../ingredientPhoto/spaghetti.png" width="50px" height="50px">
                        <button>Submit</button>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="card-container">
            <div class="maincontainer">
                <div class="thecard">
                    <div class="thefront">
                        <h1>milk</h1>
                    </div>
                    <div class="theback">
                        <img src="../ingredientPhoto/milk.png" width="50px" height="50px">
                        <button>Submit</button>
                    </div>
                </div>
            </div>
            <div class="maincontainer">
                <div class="thecard">
                    <div class="thefront">
                        <h1>flour</h1>
                    </div>
                    <div class="theback">
                        <img src="../ingredientPhoto/flour.png" width="50px" height="50px">
                        <button>Submit</button>
                    </div>
                </div>
            </div>
            <div class="maincontainer">
                <div class="thecard">
                    <div class="thefront">
                        <h1>sugar</h1>
                    </div>
                    <div class="theback">
                        <img src="../ingredientPhoto/sugar.png" width="50px" height="50px">
                        <button>Submit</button>
                    </div>
                </div>
            </div>
            <div class="maincontainer">
                <div class="thecard">
                    <div class="thefront">
                        <h1>olive oil</h1>
                    </div>
                    <div class="theback">
                        <img src="../ingredientPhoto/olive-oil.png" width="50px" height="50px">
                        <button>Submit</button>
                    </div>
                </div>
            </div>
            <div class="maincontainer">
                <div class="thecard">
                    <div class="thefront">
                        <h1>butter</h1>
                    </div>
                    <div class="theback">
                        <img src="../ingredientPhoto/butter.png" width="50px" height="50px">

                        <button>Submit</button>
                    </div>
                </div>
            </div>
            <div class="maincontainer">
                <div class="thecard">
                    <div class="thefront">
                        <h1>hot pepper</h1>
                    </div>
                    <div class="theback">
                        <img src="../ingredientPhoto/chili-pepper.png" width="50px" height="50px">
                        <button>Submit</button>
                    </div>
                </div>
            </div>


        </div>
        <label for="ch1" id="showMore2"  onclick="showMore1(2)">show more</label>

        <div class="showmoreContainer" id="showmoreContainer2">
            <div class="card-container">
                <div class="maincontainer">
                    <div class="thecard">
                        <div class="thefront">
                            <h1>egg</h1>
                        </div>
                        <div class="theback">
                            <img src="../ingredientPhoto/egg.png" width="50px" height="50px">
                            <button>Submit</button>
                        </div>
                    </div>
                </div>
                <div class="maincontainer">
                    <div class="thecard">
                        <div class="thefront">
                            <h1>potato</h1>
                        </div>
                        <div class="theback">
                            <img src="../ingredientPhoto/potatoes.png" width="50px" height="50px">
                            <button>Submit</button>
                        </div>
                    </div>
                </div>
                <div class="maincontainer">
                    <div class="thecard">
                        <div class="thefront">
                            <h1>garlic</h1>
                        </div>
                        <div class="theback">
                            <img src="../ingredientPhoto/garlic.png" width="50px" height="50px">
                            <button>Submit</button>
                        </div>
                    </div>
                </div>
                <div class="maincontainer">
                    <div class="thecard">
                        <div class="thefront">
                            <h1>tomato</h1>
                        </div>
                        <div class="theback">
                            <img src="../ingredientPhoto/tomato.png" width="50px" height="50px">
                            <button>Submit</button>
                        </div>
                    </div>
                </div>
                <div class="maincontainer">
                    <div class="thecard">
                        <div class="thefront">
                            <h1>onion</h1>
                        </div>
                        <div class="theback">
                            <img src="../ingredientPhoto/onion.png" width="50px" height="50px">
                            <button>Submit</button>
                        </div>
                    </div>
                </div>
                <div class="maincontainer">
                    <div class="thecard">
                        <div class="thefront">
                            <h1>pasta</h1>
                        </div>
                        <div class="theback">
                            <img src="../ingredientPhoto/spaghetti.png" width="50px" height="50px">
                            <button>Submit</button>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="card-container">
                <div class="maincontainer">
                    <div class="thecard">
                        <div class="thefront">
                            <h1>milk</h1>
                        </div>
                        <div class="theback">
                            <img src="../ingredientPhoto/milk.png" width="50px" height="50px">
                            <button>Submit</button>
                        </div>
                    </div>
                </div>
                <div class="maincontainer">
                    <div class="thecard">
                        <div class="thefront">
                            <h1>flour</h1>
                        </div>
                        <div class="theback">
                            <img src="../ingredientPhoto/flour.png" width="50px" height="50px">
                            <button>Submit</button>
                        </div>
                    </div>
                </div>
                <div class="maincontainer">
                    <div class="thecard">
                        <div class="thefront">
                            <h1>sugar</h1>
                        </div>
                        <div class="theback">
                            <img src="../ingredientPhoto/sugar.png" width="50px" height="50px">
                            <button>Submit</button>
                        </div>
                    </div>
                </div>
                <div class="maincontainer">
                    <div class="thecard">
                        <div class="thefront">
                            <h1>olive oil</h1>
                        </div>
                        <div class="theback">
                            <img src="../ingredientPhoto/olive-oil.png" width="50px" height="50px">
                            <button>Submit</button>
                        </div>
                    </div>
                </div>
                <div class="maincontainer">
                    <div class="thecard">
                        <div class="thefront">
                            <h1>butter</h1>
                        </div>
                        <div class="theback">
                            <img src="../ingredientPhoto/butter.png" width="50px" height="50px">

                            <button>Submit</button>
                        </div>
                    </div>
                </div>
                <div class="maincontainer">
                    <div class="thecard">
                        <div class="thefront">
                            <h1>hot pepper</h1>
                        </div>
                        <div class="theback">
                            <img src="../ingredientPhoto/chili-pepper.png" width="50px" height="50px">
                            <button>Submit</button>
                        </div>
                    </div>
                </div>


            </div>
            <label for="ch1" id="showLess2"  onclick="showLess1(2)">show less</label>

        </div>










    </div>
    <!--endOfFruit-->
</div>
<div class="allIng">
    <div  class="vegetable">
        <img src="../ingredientPhoto/vegetable.png" width="80px" height="80px" ><span class="mainNames">vegetable</span>
        <input type="checkbox" id="ch3" style="display: none">
        <div class="card-container">
            <div class="maincontainer">
                <div class="thecard">
                    <div class="thefront">
                        <h1>egg</h1>
                    </div>
                    <div class="theback">
                        <img src="../ingredientPhoto/egg.png" width="50px" height="50px">
                        <button>Submit</button>
                    </div>
                </div>
            </div>
            <div class="maincontainer">
                <div class="thecard">
                    <div class="thefront">
                        <h1>potato</h1>
                    </div>
                    <div class="theback">
                        <img src="../ingredientPhoto/potatoes.png" width="50px" height="50px">
                        <button>Submit</button>
                    </div>
                </div>
            </div>
            <div class="maincontainer">
                <div class="thecard">
                    <div class="thefront">
                        <h1>garlic</h1>
                    </div>
                    <div class="theback">
                        <img src="../ingredientPhoto/garlic.png" width="50px" height="50px">
                        <button>Submit</button>
                    </div>
                </div>
            </div>
            <div class="maincontainer">
                <div class="thecard">
                    <div class="thefront">
                        <h1>tomato</h1>
                    </div>
                    <div class="theback">
                        <img src="../ingredientPhoto/tomato.png" width="50px" height="50px">
                        <button>Submit</button>
                    </div>
                </div>
            </div>
            <div class="maincontainer">
                <div class="thecard">
                    <div class="thefront">
                        <h1>onion</h1>
                    </div>
                    <div class="theback">
                        <img src="../ingredientPhoto/onion.png" width="50px" height="50px">
                        <button>Submit</button>
                    </div>
                </div>
            </div>
            <div class="maincontainer">
                <div class="thecard">
                    <div class="thefront">
                        <h1>pasta</h1>
                    </div>
                    <div class="theback">
                        <img src="../ingredientPhoto/spaghetti.png" width="50px" height="50px">
                        <button>Submit</button>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="card-container">
            <div class="maincontainer">
                <div class="thecard">
                    <div class="thefront">
                        <h1>milk</h1>
                    </div>
                    <div class="theback">
                        <img src="../ingredientPhoto/milk.png" width="50px" height="50px">
                        <button>Submit</button>
                    </div>
                </div>
            </div>
            <div class="maincontainer">
                <div class="thecard">
                    <div class="thefront">
                        <h1>flour</h1>
                    </div>
                    <div class="theback">
                        <img src="../ingredientPhoto/flour.png" width="50px" height="50px">
                        <button>Submit</button>
                    </div>
                </div>
            </div>
            <div class="maincontainer">
                <div class="thecard">
                    <div class="thefront">
                        <h1>sugar</h1>
                    </div>
                    <div class="theback">
                        <img src="../ingredientPhoto/sugar.png" width="50px" height="50px">
                        <button>Submit</button>
                    </div>
                </div>
            </div>
            <div class="maincontainer">
                <div class="thecard">
                    <div class="thefront">
                        <h1>olive oil</h1>
                    </div>
                    <div class="theback">
                        <img src="../ingredientPhoto/olive-oil.png" width="50px" height="50px">
                        <button>Submit</button>
                    </div>
                </div>
            </div>
            <div class="maincontainer">
                <div class="thecard">
                    <div class="thefront">
                        <h1>butter</h1>
                    </div>
                    <div class="theback">
                        <img src="../ingredientPhoto/butter.png" width="50px" height="50px">

                        <button>Submit</button>
                    </div>
                </div>
            </div>
            <div class="maincontainer">
                <div class="thecard">
                    <div class="thefront">
                        <h1>hot pepper</h1>
                    </div>
                    <div class="theback">
                        <img src="../ingredientPhoto/chili-pepper.png" width="50px" height="50px">
                        <button>Submit</button>
                    </div>
                </div>
            </div>


        </div>
        <label for="ch1" id="showMore3"  onclick="showMore1(3)">show more</label>

        <div class="showmoreContainer" id="showmoreContainer3">
            <div class="card-container">
                <div class="maincontainer">
                    <div class="thecard">
                        <div class="thefront">
                            <h1>egg</h1>
                        </div>
                        <div class="theback">
                            <img src="../ingredientPhoto/egg.png" width="50px" height="50px">
                            <button>Submit</button>
                        </div>
                    </div>
                </div>
                <div class="maincontainer">
                    <div class="thecard">
                        <div class="thefront">
                            <h1>potato</h1>
                        </div>
                        <div class="theback">
                            <img src="../ingredientPhoto/potatoes.png" width="50px" height="50px">
                            <button>Submit</button>
                        </div>
                    </div>
                </div>
                <div class="maincontainer">
                    <div class="thecard">
                        <div class="thefront">
                            <h1>garlic</h1>
                        </div>
                        <div class="theback">
                            <img src="../ingredientPhoto/garlic.png" width="50px" height="50px">
                            <button>Submit</button>
                        </div>
                    </div>
                </div>
                <div class="maincontainer">
                    <div class="thecard">
                        <div class="thefront">
                            <h1>tomato</h1>
                        </div>
                        <div class="theback">
                            <img src="../ingredientPhoto/tomato.png" width="50px" height="50px">
                            <button>Submit</button>
                        </div>
                    </div>
                </div>
                <div class="maincontainer">
                    <div class="thecard">
                        <div class="thefront">
                            <h1>onion</h1>
                        </div>
                        <div class="theback">
                            <img src="../ingredientPhoto/onion.png" width="50px" height="50px">
                            <button>Submit</button>
                        </div>
                    </div>
                </div>
                <div class="maincontainer">
                    <div class="thecard">
                        <div class="thefront">
                            <h1>pasta</h1>
                        </div>
                        <div class="theback">
                            <img src="../ingredientPhoto/spaghetti.png" width="50px" height="50px">
                            <button>Submit</button>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="card-container">
                <div class="maincontainer">
                    <div class="thecard">
                        <div class="thefront">
                            <h1>milk</h1>
                        </div>
                        <div class="theback">
                            <img src="../ingredientPhoto/milk.png" width="50px" height="50px">
                            <button>Submit</button>
                        </div>
                    </div>
                </div>
                <div class="maincontainer">
                    <div class="thecard">
                        <div class="thefront">
                            <h1>flour</h1>
                        </div>
                        <div class="theback">
                            <img src="../ingredientPhoto/flour.png" width="50px" height="50px">
                            <button>Submit</button>
                        </div>
                    </div>
                </div>
                <div class="maincontainer">
                    <div class="thecard">
                        <div class="thefront">
                            <h1>sugar</h1>
                        </div>
                        <div class="theback">
                            <img src="../ingredientPhoto/sugar.png" width="50px" height="50px">
                            <button>Submit</button>
                        </div>
                    </div>
                </div>
                <div class="maincontainer">
                    <div class="thecard">
                        <div class="thefront">
                            <h1>olive oil</h1>
                        </div>
                        <div class="theback">
                            <img src="../ingredientPhoto/olive-oil.png" width="50px" height="50px">
                            <button>Submit</button>
                        </div>
                    </div>
                </div>
                <div class="maincontainer">
                    <div class="thecard">
                        <div class="thefront">
                            <h1>butter</h1>
                        </div>
                        <div class="theback">
                            <img src="../ingredientPhoto/butter.png" width="50px" height="50px">

                            <button>Submit</button>
                        </div>
                    </div>
                </div>
                <div class="maincontainer">
                    <div class="thecard">
                        <div class="thefront">
                            <h1>hot pepper</h1>
                        </div>
                        <div class="theback">
                            <img src="../ingredientPhoto/chili-pepper.png" width="50px" height="50px">
                            <button>Submit</button>
                        </div>
                    </div>
                </div>


            </div>
            <label for="ch1" id="showLess3"  onclick="showLess1(3)">show less</label>

        </div>










    </div>
    <!--end of vegetable-->
    <div  class="meat">
        <img src="../ingredientPhoto/meat.png" width="80px" height="80px" ><span class="mainNames">Meat</span>
        <input type="checkbox" id="ch4" style="display: none">
        <div class="card-container">
            <div class="maincontainer">
                <div class="thecard">
                    <div class="thefront">
                        <h1>egg</h1>
                    </div>
                    <div class="theback">
                        <img src="../ingredientPhoto/egg.png" width="50px" height="50px">
                        <button>Submit</button>
                    </div>
                </div>
            </div>
            <div class="maincontainer">
                <div class="thecard">
                    <div class="thefront">
                        <h1>potato</h1>
                    </div>
                    <div class="theback">
                        <img src="../ingredientPhoto/potatoes.png" width="50px" height="50px">
                        <button>Submit</button>
                    </div>
                </div>
            </div>
            <div class="maincontainer">
                <div class="thecard">
                    <div class="thefront">
                        <h1>garlic</h1>
                    </div>
                    <div class="theback">
                        <img src="../ingredientPhoto/garlic.png" width="50px" height="50px">
                        <button>Submit</button>
                    </div>
                </div>
            </div>
            <div class="maincontainer">
                <div class="thecard">
                    <div class="thefront">
                        <h1>tomato</h1>
                    </div>
                    <div class="theback">
                        <img src="../ingredientPhoto/tomato.png" width="50px" height="50px">
                        <button>Submit</button>
                    </div>
                </div>
            </div>
            <div class="maincontainer">
                <div class="thecard">
                    <div class="thefront">
                        <h1>onion</h1>
                    </div>
                    <div class="theback">
                        <img src="../ingredientPhoto/onion.png" width="50px" height="50px">
                        <button>Submit</button>
                    </div>
                </div>
            </div>
            <div class="maincontainer">
                <div class="thecard">
                    <div class="thefront">
                        <h1>pasta</h1>
                    </div>
                    <div class="theback">
                        <img src="../ingredientPhoto/spaghetti.png" width="50px" height="50px">
                        <button>Submit</button>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="card-container">
            <div class="maincontainer">
                <div class="thecard">
                    <div class="thefront">
                        <h1>milk</h1>
                    </div>
                    <div class="theback">
                        <img src="../ingredientPhoto/milk.png" width="50px" height="50px">
                        <button>Submit</button>
                    </div>
                </div>
            </div>
            <div class="maincontainer">
                <div class="thecard">
                    <div class="thefront">
                        <h1>flour</h1>
                    </div>
                    <div class="theback">
                        <img src="../ingredientPhoto/flour.png" width="50px" height="50px">
                        <button>Submit</button>
                    </div>
                </div>
            </div>
            <div class="maincontainer">
                <div class="thecard">
                    <div class="thefront">
                        <h1>sugar</h1>
                    </div>
                    <div class="theback">
                        <img src="../ingredientPhoto/sugar.png" width="50px" height="50px">
                        <button>Submit</button>
                    </div>
                </div>
            </div>
            <div class="maincontainer">
                <div class="thecard">
                    <div class="thefront">
                        <h1>olive oil</h1>
                    </div>
                    <div class="theback">
                        <img src="../ingredientPhoto/olive-oil.png" width="50px" height="50px">
                        <button>Submit</button>
                    </div>
                </div>
            </div>
            <div class="maincontainer">
                <div class="thecard">
                    <div class="thefront">
                        <h1>butter</h1>
                    </div>
                    <div class="theback">
                        <img src="../ingredientPhoto/butter.png" width="50px" height="50px">

                        <button>Submit</button>
                    </div>
                </div>
            </div>
            <div class="maincontainer">
                <div class="thecard">
                    <div class="thefront">
                        <h1>hot pepper</h1>
                    </div>
                    <div class="theback">
                        <img src="../ingredientPhoto/chili-pepper.png" width="50px" height="50px">
                        <button>Submit</button>
                    </div>
                </div>
            </div>


        </div>
        <label for="ch1" id="showMore4"  onclick="showMore1(4)">show more</label>

        <div class="showmoreContainer" id="showmoreContainer4">
            <div class="card-container">
                <div class="maincontainer">
                    <div class="thecard">
                        <div class="thefront">
                            <h1>egg</h1>
                        </div>
                        <div class="theback">
                            <img src="../ingredientPhoto/egg.png" width="50px" height="50px">
                            <button>Submit</button>
                        </div>
                    </div>
                </div>
                <div class="maincontainer">
                    <div class="thecard">
                        <div class="thefront">
                            <h1>potato</h1>
                        </div>
                        <div class="theback">
                            <img src="../ingredientPhoto/potatoes.png" width="50px" height="50px">
                            <button>Submit</button>
                        </div>
                    </div>
                </div>
                <div class="maincontainer">
                    <div class="thecard">
                        <div class="thefront">
                            <h1>garlic</h1>
                        </div>
                        <div class="theback">
                            <img src="../ingredientPhoto/garlic.png" width="50px" height="50px">
                            <button>Submit</button>
                        </div>
                    </div>
                </div>
                <div class="maincontainer">
                    <div class="thecard">
                        <div class="thefront">
                            <h1>tomato</h1>
                        </div>
                        <div class="theback">
                            <img src="../ingredientPhoto/tomato.png" width="50px" height="50px">
                            <button>Submit</button>
                        </div>
                    </div>
                </div>
                <div class="maincontainer">
                    <div class="thecard">
                        <div class="thefront">
                            <h1>onion</h1>
                        </div>
                        <div class="theback">
                            <img src="../ingredientPhoto/onion.png" width="50px" height="50px">
                            <button>Submit</button>
                        </div>
                    </div>
                </div>
                <div class="maincontainer">
                    <div class="thecard">
                        <div class="thefront">
                            <h1>pasta</h1>
                        </div>
                        <div class="theback">
                            <img src="../ingredientPhoto/spaghetti.png" width="50px" height="50px">
                            <button>Submit</button>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="card-container">
                <div class="maincontainer">
                    <div class="thecard">
                        <div class="thefront">
                            <h1>milk</h1>
                        </div>
                        <div class="theback">
                            <img src="../ingredientPhoto/milk.png" width="50px" height="50px">
                            <button>Submit</button>
                        </div>
                    </div>
                </div>
                <div class="maincontainer">
                    <div class="thecard">
                        <div class="thefront">
                            <h1>flour</h1>
                        </div>
                        <div class="theback">
                            <img src="../ingredientPhoto/flour.png" width="50px" height="50px">
                            <button>Submit</button>
                        </div>
                    </div>
                </div>
                <div class="maincontainer">
                    <div class="thecard">
                        <div class="thefront">
                            <h1>sugar</h1>
                        </div>
                        <div class="theback">
                            <img src="../ingredientPhoto/sugar.png" width="50px" height="50px">
                            <button>Submit</button>
                        </div>
                    </div>
                </div>
                <div class="maincontainer">
                    <div class="thecard">
                        <div class="thefront">
                            <h1>olive oil</h1>
                        </div>
                        <div class="theback">
                            <img src="../ingredientPhoto/olive-oil.png" width="50px" height="50px">
                            <button>Submit</button>
                        </div>
                    </div>
                </div>
                <div class="maincontainer">
                    <div class="thecard">
                        <div class="thefront">
                            <h1>butter</h1>
                        </div>
                        <div class="theback">
                            <img src="../ingredientPhoto/butter.png" width="50px" height="50px">

                            <button>Submit</button>
                        </div>
                    </div>
                </div>
                <div class="maincontainer">
                    <div class="thecard">
                        <div class="thefront">
                            <h1>hot pepper</h1>
                        </div>
                        <div class="theback">
                            <img src="../ingredientPhoto/chili-pepper.png" width="50px" height="50px">
                            <button>Submit</button>
                        </div>
                    </div>
                </div>


            </div>
            <label for="ch1" id="showLess4"  onclick="showLess1(4)">show less</label>

        </div>










    </div>
    <!--endOfMeat-->
</div>
</form>
</body>
</html>