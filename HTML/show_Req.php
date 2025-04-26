<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Table with Status Filters</title>
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
            box-sizing: border-box;
        }
        .table-container {
            width: 80%;
            margin-top: 20px;
            background-color: white;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .buttons {
            margin-bottom: 20px;
        }
        .button {
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            margin: 5px;
        }
        .status-select {
            padding: 5px;
            font-size: 14px;
        }
        .status-waiting {
            color: black;
        }
        .status-accepted {
            color: green;
        }
        .status-rejected {
            color: red;
        }
        /* Modal Styles */
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgb(0,0,0);
            background-color: rgba(0,0,0,0.4);
            padding-top: 60px;
        }
        .modal-content {
            background-color: #fefefe;
            margin: 5% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
        }
        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }
        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
    </style>


    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            padding: 20px;
            flex-direction: column;
            align-items: center;
            background-color: #f0f0f0;
            gap: 20px;
        }
        .all{
            margin-top: 1%;
            display: flex;
            flex-direction: row;
            justify-content: space-evenly;
            flex-wrap: wrap;
        }

        .outdiv {
            background-color: #c2d6d6;
            width: 300px;
            height: 400px;
            position: relative;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: box-shadow 0.3s ease;
            margin: 10px;
        }

        .outdiv:hover {
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        .front {
            padding: 10px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .front .img {
            width: 100%;
            max-height: 200px;
            overflow: hidden;
        }

        .front .img img {
            width: 100%;
            height: auto;
        }

        .detail, .rating {
            width: 100%;
            padding: 10px;
            text-align: center;
            background-color: #f9f9f9;
            margin-top: 5px;
        }

        .way {
            display: none;
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(255, 255, 255, 0.9);
            padding: 20px;
            box-sizing: border-box;
            text-align: center;
        }

        .outdiv:hover .way {
            display: block;
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
            .all {
                margin-top: 1%;
                display: flex;
                flex-direction: column;
                align-items: center; /* Centers items horizontally */
                justify-content: center; /* Centers items vertically */
            }
            .outdiv{
                margin-top: 10%;
            }
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
            .all {
                margin-top: 1%;
                display: flex;
                flex-direction: column;
                align-items: center; /* Centers items horizontally */
                justify-content: center; /* Centers items vertically */
            }
            .outdiv{
                margin-top: 10%;
                margin-left: 1%;
            }

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
        function loadRequests(status) {
            const xhr = new XMLHttpRequest();
            xhr.open('GET', 'fetch_requests.php?status=' + status, true);
            xhr.onload = function() {
                if (this.status === 200) {
                    document.getElementById('requests-table').innerHTML = this.responseText;
                }
            };
            xhr.send();
        }

        function updateStatus(requestId, newStatus) {
            const xhr = new XMLHttpRequest();
            xhr.open('POST', 'update_status.php', true);
            xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            xhr.onload = function() {
                if (this.status === 200) {
                    alert(this.responseText);
                    loadRequests('all');  // Refresh the table
                }
            };
            xhr.send('id=' + requestId + '&status=' + newStatus);
        }

        function viewDetails(requestId) {
            const xhr = new XMLHttpRequest();
            xhr.open('GET', 'view_request.php?id=' + requestId, true);
            xhr.onload = function() {
                if (this.status === 200) {
                    document.getElementById('modal-content').innerHTML = this.responseText;
                    var modal = document.getElementById('myModal');
                    modal.style.display = "block";
                    modal.style.width = "100%";  // Adjust width as needed
                }
            };
            xhr.send();
        }


        function applyStatusColor(selectElement) {
            selectElement.classList.remove('status-waiting', 'status-accepted', 'status-rejected');
            if (selectElement.value === 'Waiting') {
                selectElement.classList.add('status-waiting');
            } else if (selectElement.value === 'Accepted') {
                selectElement.classList.add('status-accepted');
            } else if (selectElement.value === 'Rejected') {
                selectElement.classList.add('status-rejected');
            }
        }

        document.addEventListener('DOMContentLoaded', function() {
            loadRequests('all');
            document.getElementById('waiting-btn').addEventListener('click', function() {
                loadRequests('Waiting');
            });
            document.getElementById('accepted-btn').addEventListener('click', function() {
                loadRequests('Accepted');
            });
            document.getElementById('rejected-btn').addEventListener('click', function() {
                loadRequests('Rejected');
            });
            document.getElementById('all-btn').addEventListener('click', function() {
                loadRequests('all');
            });
        });

        function handleStatusChange(event, requestId) {
            const newStatus = event.target.value;
            updateStatus(requestId, newStatus);
            applyStatusColor(event.target);
        }

        // Close the modal when the user clicks on <span> (x)
        function closeModal() {
            document.getElementById('myModal').style.display = "none";
        }

        // Close the modal when the user clicks anywhere outside of the modal
        window.onclick = function(event) {
            const modal = document.getElementById('myModal');
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>
    <style>
        .top-left-button {
            top: 10px;
            right: 10px;
            width: 40px;
            height: 40px;
            font-size: 14px;
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

<div class="buttons">

    <button id="waiting-btn" class="button">Waiting</button>
    <button id="accepted-btn" class="button">Accepted</button>
    <button id="rejected-btn" class="button">Rejected</button>
    <button id="all-btn" class="button">All</button>
</div>
<div class="table-container" id="requests-table">
    <!-- Table data will be loaded here via JavaScript -->
</div>

<!-- The Modal -->
<div id="myModal" class="modal">
    <div class="modal-content" id="modal-content">
        <span class="close" onclick="closeModal()">&times;</span>
        <!-- Request details will be loaded here -->
    </div>
</div>
</body>
</html>
