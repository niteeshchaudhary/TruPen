<?php 
session_start(); 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "trupendb";

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$qryst="select * from ".$_GET["quiz_choosed"].";";
     $result = $conn->query($qryst);
?>
<html>
<head>
<title><?php echo "Quiz : ".$_GET["quiz_choosed"]; ?></title>
<link rel="stylesheet" href="style.css">
<style>
  * {box-sizing: border-box}
body {font-family: Verdana, sans-serif; margin:0}
.mySlides {display: none;}
img {vertical-align: middle;}

/* Slideshow container */
.slideshow-container {
  max-width: 500px;
  position: fixed;
  min-width: 500px;
  max-height: 100px;
  min-height: 100px;
  left:15%;
  top:5%;
}

/* Next & previous buttons */
.prev, .next {
  cursor: pointer;
  background-color: rgba(0,0,0,0.1);
  position: absolute;
  top: 100%;
  width: auto;
  padding: 16px;
  margin-top: 300px;
  color: white;
  font-weight: bold;
  font-size: 18px;
  transition: 0.6s ease;
  border-radius: 0 3px 3px 0;
  user-select: none;
}
.first{
  cursor: pointer;
  background-color: rgba(100,0,0,0.5);
  position: absolute;
  top: 100%;
  margin-left:10%;
  width: auto;
  padding: 16px;
  margin-top: 400px;
  color: white;
  font-weight: bold;
  font-size: 18px;
  transition: 0.6s ease;
  border-radius: 0 3px 3px 0;
  user-select: none;
}
.last {
  cursor: pointer;
  background-color: rgba(0,100,0,0.5);
  position: absolute;
  top: 100%;
  width: auto;
  padding: 16px;
  margin-top: 400px;
  color: white;
  font-weight: bold;
  font-size: 18px;
  transition: 0.6s ease;
  border-radius: 0 3px 3px 0;
  margin-left:100%;
  user-select: none;
}
/* Position the "next button" to the right */
.next {
  right: 30;
  border-radius: 3px 0 0 3px;
}
.prev {
  left: 120;
  border-radius: 3px 0 0 3px;
}

/* On hover, add a black background color with a little bit see-through */
.prev:hover, .next:hover {
  background-color: rgba(0,0,0,0.8);
}
.first:hover{
  background-color: rgba(100,0,0,0.8);
}
.last:hover {
  background-color: rgba(0,100,0,0.8);
}

/* Caption text */
.text {
  color: #f2f2f2;
  background-color: rgba(0,0,0,0.6);
  font-size: 15px;
  padding: 8px 12px;
  position: relative;
  bottom: -70px;
  width: 100%;
  text-align: center;
}

/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  background-color: rgba(0,0,0,0.4);
  font-size: 12px;
  padding: 8px 12px;
  text-align: center;
  margin-left:85%;
  top: 0;
}

/* The dots/bullets/indicators */
.dot {
  cursor: pointer;
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}

.active, .dot:hover {
  background-color: #717171;
}

/* Fading animation */
.fade {
  -webkit-animation-name: fade;
  -webkit-animation-duration: 1.5s;
  animation-name: fade;
  animation-duration: 1.5s;
}

@-webkit-keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

@keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

/* On smaller screens, decrease text size */
@media only screen and (max-width: 300px) {
  .prev, .next,.text {font-size: 11px}
}

.quiz-container{
  background-color: #fff;
  border-radius: 10px;
  box-shadow: 0 0 10px 2px rgba(100, 100, 100, 0.1);
  width: 600px;
  height: 600px;
  overflow: hidden;
}
.quiz-header{
  padding: 4rem;
}
h2{
  padding: 1rem;
  text-align: center;
  margin: 0;
}

ul{
  list-style-type: none;
  padding: 0;
}
ul li{
  font-size: 1.2rem;
  margin: 1rem 0;
}
ul li label{
  cursor: pointer;
}
button{
  background-color: #03cae4;
  color: #fff;
  border: none;
  display: block;
  width: 100%;
  cursor: pointer;
  font-size: 1.1rem;
  font-family: inherit;
  padding: 1.3rem;
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
    border-radius: 25px;
    position: sticky;
    background-color: lightgray;
    overflow: hidden;
    font-weight: 400;
    display: flex;
    align-items: center;
}


/* Style the links inside the navigation bar */

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
    border-radius: 25px;
    background-color: rgba(255, 251, 251, 0.418);
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

@keyframes AnimationName {
    0% {
        background-position: 0% 50%
    }
    50% {
        background-position: 100% 50%
    }
    100% {
        background-position: 0% 50%
    }
}

.topnav a.active:hover {
    border-radius: 0px;
    font-weight: 400;
    background: linear-gradient(270deg, #4285f4, #7542f4, #eb42f4);
    background-size: 600% 600%;
    -webkit-animation: AnimationName 3s ease infinite;
    -moz-animation: AnimationName 3s ease infinite;
    animation: AnimationName 3s ease infinite;
    font-weight: 400;
    display: flex;
    align-items: center;
}

.gradient {
    -webkit-text-stroke: 0.1pt white;
    font-family: "Comfortaa", cursive;
    background-image: -webkit-gradient(linear, left top, right top, from(var(--color-m)), color-stop(var(--color-e)), color-stop(var(--color-m)), to(var(--color-v)));
    background-image: -webkit-linear-gradient(left, var(--color-m) 0%, var(--color-e) 50%, var(--color-m) 150%, var(--color-v) 200%);
    background-image: linear-gradient(to right, var(--color-m) 0%, var(--color-e) 50%, var(--color-m) 150%, var(--color-v) 200%);
    -webkit-background-clip: text;
    background-clip: text;
    -webkit-text-fill-color: transparent;
}

.sidenav {
    height: 100%;
    width: 0;
    position: fixed;
    z-index: 1;
    top: 0;
    left: 0;
    background-color: rgb(210, 210, 210);
    overflow-x: hidden;
    transition: 0.5s;
    padding-top: 60px;
}

.sidenav a {
    padding: 8px 8px 8px 32px;
    text-decoration: none;
    font-size: 25px;
    color: #000000;
    display: block;
    transition: 0.3s;
}

.sidenav a:hover {
    color: #aefff4;
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

@keyframes rotate {
    0% {
        transform: rotate(0deg);
    }
    100% {
        transform: rotate(-360deg);
    }
}

.rotation {
    animation-name: rotate;
    animation-duration: 1s;
    animation-iteration-count: 1;
}
</style>
</head>
<body>
        <center>
            <div class="container">
                <h1><span style="font-size:30px;cursor:pointer" onclick="toggle();"> <div style = "display:inline-block;" id="rotation">&#9776; </div> Dashboard</span></h1>
            </div>
            <br><br>
            <div class="topnav">
                <a class="active gradient-text" href="loggedin.php"><img src="../Image_Components/truPen Better Logo.png" style="width: 25pt;">
                    <div style="display:inline-block;" class="gradient">truPen</div>
                </a>
                &nbsp;
                <a href="Quiz App/select.php">Quizzes</a>
                <a href="Quiz App/create.php">Create Quiz</a>
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
  <div class="slideshow-container">
    <?php

    if ($result && $result->num_rows > 0) {
    for ($x = 0;$row = $result->fetch_assoc(); $x++) {
    echo '<div class="mySlides fade" id="'.$x.'">
            <div class="quiz-container" id="quiz">
              <div class="quiz-header">
                <div class="numbertext">'.($x+1).' /'.$result->num_rows.'</div>
                <h2>'.$row["question"].'</h2>
                <ul>
                  <li><input type="radio" name="answer" id="a" class="answer"><label for="a" id="a_text">'.$row["option_a"].'</label></li>
                  <li><input type="radio" name="answer" id="b" class="answer"><label for="b" id="b_text">'.$row["option_b"].'</label></li>
                  <li><input type="radio" name="answer" id="c" class="answer"><label for="c" id="c_text">'.$row["option_c"].'</label></li>
                  <li><input type="radio" name="answer" id="d" class="answer"><label for="d" id="d_text">'.$row["option_d"].'</label></li>
      	        </ul>
              </div>
            </div>
          </div>';
    }}
    ?>
    <a  class="prev" onclick="plusDivs(-1)">&#10094;</a>
    <a class="next" onclick="plusDivs(1)">&#10095;</a>
    <a class="first" onclick="first()">&#10094;&#10094;</a>
    <a class="last" onclick="last()">&#10095;&#10095;</a>
      <div style="text-align:left">
      <div class="text"><a href="#" style="text-decoration: none;color:white;" id="blink">Submit</div>
      </div>
  </div>
  <br>
  <br>
<br>
<br>
<br>
<a href="newupload.php" style="text-decoration: none;" id = "blink2"><button>Upload Image</button></a>
<br>
<br>
<br>
<br>
<form action="http://localhost/assperl/loggedin.php">
<br>
<button type="submit" id = "submit">Exit Quiz</button>
</form>
<script>
var slideIndex = 1;
var val;
showDivs(slideIndex);

function plusDivs(n) {
    val = n;
    showDivs(slideIndex += n);
}

function showDivs(n) {
    var i;
    var x = document.getElementsByClassName("mySlides");
    if (n > x.length) { slideIndex = 1 }
    if (n < 1) { slideIndex = x.length };
    for (i = 0; i < x.length; i++) {
        x[i].style.display = "none";
        x[i].classList.add("left");
    }
    if (val != 1) {
        x[slideIndex - 1].classList.remove("left");
        x[slideIndex - 1].classList.add("right");
    } else {
        x[slideIndex - 1].classList.remove("right");
        x[slideIndex - 1].classList.add("left");
    }
    x[slideIndex - 1].style.display = "block";
}
function first(){
    var x = document.getElementsByClassName("mySlides");
    var i;
    for (i = 0; i < x.length; i++) {
        x[i].style.display = "none";
    }
    if(x[0].classList.item(0) != "left"){
        x[0].classList.remove("right");
        x[0].classList.add("left");
    }
    x[0].style.display = "block";
}

function last() {
    var x = document.getElementsByClassName("mySlides");
    var i;
    for (i = 0; i < x.length; i++) {
        x[i].style.display = "none";
    }
    if(x[x.length-1].classList.item(0) != "right"){
        x[x.length-1].classList.remove("left");
        x[x.length-1].classList.add("right");
    }
    x[x.length-1].style.display = "block";
}
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
            }

            function closeNav() {
                document.getElementById("mySidenav").style.width = "0";
            }
</script>
</body>
</html>