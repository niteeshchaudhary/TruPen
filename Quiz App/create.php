<!DOCTYPE html>
<html lang="en">
<style>
    .topnav a {
                float: left;
                color: black;
                text-align: center;
                padding: 14px 16px;
                text-decoration: none;
                font-size: 17px;
            }
            /* Change the color of links on hover */
            
            .topnav a:hover {
                background-color: #ddd;
                display: flex;
                align-items: center;
                justify-content: center;
            }
            /* Add a color to the active/current link */
            
            @import url("https://fonts.googleapis.com/css2?family=Comfortaa:wght@400;600;700&display=swap");
             :root {
                --color-v: #7f71fe;
                --color-m: #7e00ff;
                --color-e: #ffbe3c;
            }
            
            .topnav a.active {
                font-weight: 400;
                background-color: #4285F4;
                font-weight: 400;
                display: flex;
                align-items: center;
            }
            body {
                color: orange;
                background: #f4ffff;
            }
</style>
<body>
<?php
session_start();
?>
<h1>Create Quiz</h1>
<form align = "center" action="QnA.php" method="post">
Name: <input type="text" name="name" required /><br>
Subject: <input type="text" name="subject" required /><br>
No of Questions: <input type="number" name="no" required /><br>
Time limit: <input type="number" name="time" required /><br>
<input type="submit" value="Submit">
</form>
</body>
</html>