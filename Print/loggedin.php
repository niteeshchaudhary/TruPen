<?php
session_start();
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>

        <meta charset="UTF-8">
        <meta name="trupen" content="truPen">
        <title>truPen | Dashboard -&gt; HTML &amp; CSS</title>
        <link rel="stylesheet" href="dashboard.css?v=<?php echo time(); ?>">
        <style>
            body {
                color: orange;
                background: #f4ffff;
                transition: 0.5s;
            }
            .buttonOn {
    background-color: #2a384d;
    border: none;
    color: white;
    padding: 10px 20px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
}

.buttonOff {
    background-color: #455d80;
    border: none;
    color: white;
    padding: 10px 20px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
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
                <h1><span style="font-size:30px;cursor:pointer" onclick="toggle();"> <div style = "display:inline-block;" id="rotation">&#9776; </div> Dashboard</span></h1>
            </div>
            <br><br>
            <div class="topnav">
                <a class="active gradient-text" href="loggedin.php"><img src="Image_Components\truPen Better Logo.png" style="width: 25pt;">
                    <div style="display:inline-block;" class="gradient">truPen</div>
                </a>
                &nbsp;
                <a href="Quiz App/select.php">Quizzes</a>
                <a href="Quiz App/create.php">Create Quiz</a>
				<a href="Print/request.php">Print Request</a>
				<a href="Print/acc_rej.php">Print Accept/Reject</a>
				<a href="Print/my_request.php">My Requests</a>
                <a href="second_form_stu.php">Profile</a>
                <a href="#contact">Contact</a>
                <a href="#about">About</a>
            </div>
        </center>
        <div id="mySidenav" class="sidenav">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <a href="#">About</a>
            <a href="#">Services</a>
            <a href="#">Clients</a>
            <a href="#">Contact</a>
        </div>
        <br>
        <br>
        <br>
        <form name="log out" method="post" action="logoff.php">
        <center>
        <button type="submit" id="submit">Log-OFF ?</button>
        </center>
        </form> 
        <script id="rendered-js" src="Design_Components/Button-Effect.js"></script>
        <script>
            function toggle() {
                var x = document.getElementById("mySidenav");
                var y = document.getElementById("rotation");
                if (x.style.width === "250px") {
                    y.classList.add("rotation");
                    closeNav();
                } else {
                    y.classList.add("rotation");
                    openNav();
                }
                setTimeout(() => {
                    y.classList.remove("rotation");
                }, 1050);
            }

            function openNav() {
                document.getElementById("mySidenav").style.width = "250px";
                document.body.style.marginLeft = "250px";
            }

            function closeNav() {
                document.getElementById("mySidenav").style.width = "0";
                document.body.style.marginLeft = "10px";
            }
            function blink(c){
var s = document.getElementById(c);
s.classList.add("buttonOff");
s.addEventListener("mouseleave", ()=>{
    s.classList.remove("buttonOn");
    s.classList.add("buttonOff");
});
s.addEventListener("mouseover", ()=>{
    s.classList.remove("buttonOff");
    s.classList.add("buttonOn");
});
}
blink("submit");
        </script>
    </body>

    </html>