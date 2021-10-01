<?php
session_start();
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>

        <meta charset="UTF-8">
        <meta name="trupen" content="truPen">
        <title>truPen | Dashboard -&gt; HTML &amp; CSS</title>
        <style>
            body {
                color: orange;
                background: #F8F0E3;
            }
            
            .container {
                position: relative;
                padding: 50px;
                width: 260px;
                min-height: 30px;
                display: flex;
                justify-content: center;
                align-items: center;
                background: rgba(255, 255, 255, 0.2);
                backdrop-filter: blur(5px);
                border-radius: 10px;
                box-shadow: 0 25px 45px rgba(0, 0, 0, 0.2);
            }
            /* Add a black background color to the top navigation */
            
            .topnav {
                background-color: #333;
                overflow: hidden;
            }
            /* Style the links inside the navigation bar */
            
            .topnav a {
                float: left;
                color: #f2f2f2;
                text-align: center;
                padding: 14px 16px;
                text-decoration: none;
                font-size: 17px;
            }
            /* Change the color of links on hover */
            
            .topnav a:hover {
                background-color: #ddd;
                color: black;
            }
            /* Add a color to the active/current link */
            
            .topnav a.active {
                background-color: #04AA6D;
                color: white;
            }
            
            .sidenav {
                height: 100%;
                width: 0;
                position: fixed;
                z-index: 1;
                top: 0;
                left: 0;
                background-color: #111;
                overflow-x: hidden;
                transition: 0.5s;
                padding-top: 60px;
            }
            
            .sidenav a {
                padding: 8px 8px 8px 32px;
                text-decoration: none;
                font-size: 25px;
                color: #818181;
                display: block;
                transition: 0.3s;
            }
            
            .sidenav a:hover {
                color: #f1f1f1;
            }
            
            .sidenav .closebtn {
                position: absolute;
                top: 0;
                right: 25px;
                font-size: 36px;
                margin-left: 50px;
            }
            
            @media screen and (max-height: 450px) {
                .sidenav {
                    padding-top: 15px;
                }
                .sidenav a {
                    font-size: 18px;
                }
            }
        </style>
        <script>
            window.console = window.console || function(t) {};
        </script>

        <script>
            if (document.location.search.match(/type=embed/gi)) {
                window.parent.postMessage("resize", "*");
            }
        </script>
    </head>

    <body translate="no">
        <br>
        <br>
        <center>
            <div class="container">
                <h1><span style="font-size:30px;cursor:pointer" onclick="toggle();">&#9776; Dashboard</span></h1>
            </div>
            <br><br>
            <div class="topnav">
                <a class="active" href="loggedin.php">Home</a>
                <a href="Quiz App/index.html">Quizzes</a>
                <a href="#contact">Contact</a>
                <a href="#about">About</a>
            </div>
            </div>
        </center>
        <div id="mySidenav" class="sidenav">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <a href="#">About</a>
            <a href="#">Services</a>
            <a href="#">Clients</a>
            <a href="#">Contact</a>
        </div>

        <script id="rendered-js" src="Design_Components/Button-Effect.js"></script>
        <script>
            function toggle() {
                var x = document.getElementById("mySidenav");
                if (x.style.width === "250px") {
                    closeNav();
                } else {
                    openNav();
                }
            }
            function openNav() {
                document.getElementById("mySidenav").style.width = "250px";
            }

            function closeNav() {
                document.getElementById("mySidenav").style.width = "0";
            }
        </script>
    </body>

    </html>