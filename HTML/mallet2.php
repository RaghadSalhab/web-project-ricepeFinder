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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recipe Selector</title>
    <style>
        /* Add the styles you already have here */
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }
        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin: 20px;
        }
        .slider, .search-container {
            display: flex;
            justify-content: center;
            margin: 10px;
        }
        .slider button, .search-container button {
            margin: 0 10px;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            background-color: #248f8f;
            color: white;
            border: none;
            border-radius: 5px;
        }
        .search-container input {
            padding: 10px;
            font-size: 16px;
            width: 300px;
            margin-right: 10px;
        }
        .recipes {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
            padding: 20px;
        }
        .recipe {
            width: 300px;
            height: 450px; /* Increased height to accommodate buttons */
            background-color: white;
            border-radius: 10px;
            text-align: center;
            padding: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            position: relative;
            transition: transform 0.3s;
        }
        .recipe:hover {
            transform: scale(1.05);
        }
        .recipe img {
            width: 100%;
            height: auto;
            border-radius: 50%;
            margin-top: 10px;
        }
        .recipe .description {
            display: none;
            position: absolute;
            top: 10px;
            left: 10px;
            right: 10px;
            background: rgba(0, 0, 0, 0.8);
            color: white;
            padding: 10px;
            border-radius: 10px;
            transition: opacity 0.3s;
        }
        .recipe:hover .description {
            display: block;
            opacity: 1;
        }
        .stars {
            display: flex;
            justify-content: center;
            margin-top: 10px;
        }
        .stars span {
            font-size: 20px;
            color: #ccc;
        }
        .stars .filled {
            color: gold;
        }
        .info {
            text-align: center;
            margin-top: 10px;
            font-size: 14px;
        }
        .rating-slider {
            width: 100%;
            margin-top: 10px;
        }
        .rating-slider input[type="range"] {
            width: calc(100% - 20px);
            margin: 0 10px;
        }
        .rating-slider input[type="range"]::-webkit-slider-thumb {
            -webkit-appearance: none;
            appearance: none;
            width: 20px;
            height: 20px;
            background: #248f8f;
            cursor: pointer;
            border-radius: 50%;
        }
        .rating-slider input[type="range"]::-moz-range-thumb {
            width: 20px;
            height: 20px;
            background: #248f8f;
            cursor: pointer;
            border-radius: 50%;
        }
        .buttons {
            margin-top: 10px;
            display: flex;
            justify-content: center;
            gap: 10px;
        }
        .buttons button {
            padding: 8px 15px;
            font-size: 14px;
            cursor: pointer;
            background-color: #248f8f;
            color: white;
            border: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        .buttons button:hover {
            background-color: #248f8f;
        }
    </style>
    <script>
        function showIngredients(recipeID, button) {
            var popupWidth = 300; // Set the initial width of the popup
            var popupHeight = 300; // Set the initial height of the popup

            // Calculate position for the popup window to appear above the button
            var buttonRect = button.getBoundingClientRect(); // Get button's position relative to the viewport
            var leftOffset = window.screenX + buttonRect.left - (popupWidth / 2) + (button.offsetWidth / 2);
            var topOffset = window.screenY + buttonRect.top - popupHeight - 40;

            // Open the popup window
            var popup = window.open("show.php", "popup", "width=" + popupWidth + ",height=" + popupHeight + ",left=" + leftOffset + ",top=" + topOffset);

            var xhr = new XMLHttpRequest();
            xhr.open("GET", "show.php?recipeID=" + recipeID, true);
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    var content = xhr.responseText;
                    popup.document.write("<html><head><title>Ingredients</title></head><body>");
                    popup.document.write(content);
                    popup.document.write("</body></html>");

                    // Wait for the content to be fully loaded
                    popup.addEventListener('load', function() {
                        // Adjust popup size based on content size
                        var contentHeight = popup.document.documentElement.scrollHeight;
                        var contentWidth = popup.document.documentElement.scrollWidth;

                        // Add some padding to the height and width
                        popupWidth = Math.min(contentWidth + 40, screen.availWidth);
                        popupHeight = Math.min(contentHeight , screen.availHeight);

                        popup.resizeTo(popupWidth, popupHeight);
                    });
                }
            };
            xhr.send();
        }
    </script>

    <script>
        function filterRecipes(filterType, filterValue) {
            fetch(`fetch_recipes33.php?${filterType}=${filterValue}`)
                .then(response => response.json())
                .then(data => {
                    const recipesContainer = document.querySelector('.recipes');
                    recipesContainer.innerHTML = '';

                    data.forEach(recipe => {
                        const recipeElement = document.createElement('div');
                        recipeElement.className = 'recipe';

                        // Create and append image element
                        const img = document.createElement('img');
                        img.src = '../'+recipe.RecImgUrl; // Assuming RecImgUrl is adjusted in fetch_recipes33.php
                        img.alt = recipe.name; // Example: Set alt attribute for accessibility
                        recipeElement.appendChild(img);

                        // Create and append description element
                        const description = document.createElement('div');
                        description.className = 'description';
                        description.textContent = recipe.description;
                        recipeElement.appendChild(description);

                        // Create and append name element
                        const name = document.createElement('div');
                        name.textContent = recipe.name;
                        recipeElement.appendChild(name);

                        // Create and append level element
                        const level = document.createElement('div');
                        level.className = 'info';
                        level.textContent = `Level: ${recipe.level}`;
                        recipeElement.appendChild(level);

                        // Create and append time element
                        const time = document.createElement('div');
                        time.className = 'info';
                        time.textContent = `Time: ${recipe.time}`;
                        recipeElement.appendChild(time);

                        // Create and append star rating element
                        const stars = document.createElement('div');
                        stars.className = 'stars';
                        for (let i = 0; i < 5; i++) {
                            const star = document.createElement('span');
                            star.textContent = '★';
                            if (i < recipe.Rating) {
                                star.classList.add('filled');
                            }
                            stars.appendChild(star);
                        }
                        recipeElement.appendChild(stars);

                        // Create and append rating slider element
                        const ratingSlider = document.createElement('div');
                        ratingSlider.className = 'rating-slider';
                        const slider = document.createElement('input');
                        slider.type = 'range';
                        slider.min = '1';
                        slider.max = '5';
                        slider.value = recipe.Rating;
                        slider.oninput = function() {
                            updateRating(recipe.id, this.value); // Example: Implement updateRating function
                        };
                        ratingSlider.appendChild(slider);
                        recipeElement.appendChild(ratingSlider);

                        // Create and append buttons container
                        const buttons = document.createElement('div');
                        buttons.className = 'buttons';

                        // Create and append favorite button
                        const favButton = document.createElement('button');
                        favButton.textContent = 'Add to Favorite';
                        favButton.onclick = function() {
                            addToFavorite(recipe.id); // Example: Implement addToFavorite function
                        };
                        buttons.appendChild(favButton);

                        // Create and append view ingredients button
                        const ingButton = document.createElement('button');
                        ingButton.textContent = 'View Ingredients';
                        ingButton.onclick = function() {
                            showIngredients(recipe.id, this); // Example: Implement showIngredients function
                        };
                        buttons.appendChild(ingButton);

                        recipeElement.appendChild(buttons);

                        // Append recipe element to container
                        recipesContainer.appendChild(recipeElement);
                    });
                })
                .catch(error => console.error('Error fetching and displaying recipes:', error));
        }

        function searchRecipeByName() {
            const searchInput = document.getElementById('searchInput').value;
            if (searchInput) {
                filterRecipes('name', encodeURIComponent(searchInput));
            }
        }

        function updateRating(recipeId, rating) {
            fetch(`rate_recipe.php?recipeId=${recipeId}&rating=${rating}`)
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        console.log(`Successfully rated recipe ID ${recipeId} with rating ${rating}`);
                    } else {
                        console.error(`Failed to rate recipe ID ${recipeId}`);
                    }
                })
                .catch(error => console.error('Error:', error));
        }

        function addToFavorite(recipeId) {
            fetch(`add_to_favorite.php?recipeId=${recipeId}`)
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert('Recipe added to favorites!');
                    } else {
                        alert('Failed to add recipe to favorites.');
                    }
                })
                .catch(error => console.error('Error:', error));
        }

        function viewIngredients(recipeId) {
            // Code to display ingredients in a popup
            showIngredients(recipeId);
        }

        function showIngredients(recipeID, button) {
            var popupWidth = 300; // Set the initial width of the popup
            var popupHeight = 300; // Set the initial height of the popup

            // Calculate position for the popup window to appear above the button
            var buttonRect = button.getBoundingClientRect(); // Get button's position relative to the viewport
            var leftOffset = window.screenX + buttonRect.left - (popupWidth / 2) + (button.offsetWidth / 2);
            var topOffset = window.screenY + buttonRect.top - popupHeight - 40;

            // Open the popup window
            var popup = window.open("show.php", "popup", "width=" + popupWidth + ",height=" + popupHeight + ",left=" + leftOffset + ",top=" + topOffset);

            var xhr = new XMLHttpRequest();
            xhr.open("GET", "show.php?recipeID=" + recipeID, true);
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    var content = xhr.responseText;
                    popup.document.write("<html><head><title>Ingredients</title></head><body>");
                    popup.document.write(content);
                    popup.document.write("</body></html>");

                    // Wait for the content to be fully loaded
                    popup.addEventListener('load', function() {
                        // Adjust popup size based on content size
                        var contentHeight = popup.document.documentElement.scrollHeight;
                        var contentWidth = popup.document.documentElement.scrollWidth;

                        // Add some padding to the height and width
                        popupWidth = Math.min(contentWidth + 40, screen.availWidth);
                        popupHeight = Math.min(contentHeight , screen.availHeight);

                        popup.resizeTo(popupWidth, popupHeight);
                    });
                }
            };
            xhr.send();
        }
    </script>
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
<div class="container">
    <div class="slider">
        <button onclick="filterRecipes('level', 'easy')">Easy-Way</button>
        <button onclick="filterRecipes('level', 'intermediate')">Intermediate-Way</button>
        <button onclick="filterRecipes('level', 'hard')">Hard-Way</button>
        <button onclick="filterRecipes('time', 'short')">Short-Time</button>
        <button onclick="filterRecipes('time', 'intermediate')">Intermediate-Time</button>
        <button onclick="filterRecipes('time', 'long')">Long-Time</button>
    </div><br>
    <div class="search-container">
        <input type="text" id="searchInput" placeholder="Enter recipe name">
        <button onclick="searchRecipeByName()">Search</button>
        <button onclick="location.href='new2y.html'">Search-By-Ingredients-Name</button>
    </div>
    <div class="recipes"></div>
</div>
</body>
</html>
