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
<link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
<style>
  * {box-sizing: border-box}
body {
  font-family: Verdana, sans-serif; margin:0;
  background: #f4ffff;
}
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
  top:10%;
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
  margin: 0;
}

ul{
  list-style-type: none;
  padding: 0;
}
ul li{
  font-size: 1.2rem;
  margin: 1.3rem 1rem;
}
ul li label{
  cursor: pointer;
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
.sidepanel  {
  text-align: center;
  width: 0;
  position: fixed;
  z-index: 1;
  height: 250px;
  top: 200px;
  right: 0;
  background-color: #111;
  overflow: hidden;
  transition: 0.5s;
  padding-top: 30px;
}

.sidepanel a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  color: #818181;
  display: block;
  transition: 0.3s;
}

.sidepanel a:hover {
  color: #f1f1f1;
}

.sidepanel .closebtn1 {
  position: absolute;
  top: 0;
  left: 25px;
  font-size: 36px;
}

.openbtn1 {
  font-size: 20px;
  cursor: pointer;
  background-color: #111;
  color: white;
  padding: 10px 15px;
  border: none;
}

.openbtn1:hover {
  background-color:#444;
}

.circlestyle{
  border:none;
  background-color:cyan;
  box-shadow: 10px;
  border-radius: 50%;
  padding:5px;
}
.exitit{
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
.exitit:hover {
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
</style>
</head>
<body style="margin-left:10px;margin-top:8px;margin-bottom:10px">
            <div class="topnav">
                <a class="active gradient-text" href="http://localhost/assperl/loggedin.php"><img src="../Image_Components/truPen Better Logo.png" style="width: 25pt;">
                    <div style="display:inline-block;" class="gradient">truPen</div>
                </a>
                &nbsp;
                <a href="Quiz App/select.php">Quizzes</a>
                <a href="Quiz App/create.php">Create Quiz</a>
                <a href="#contact">Contact</a>
                <a href="#about">About</a>
            </div>
            <div style="margin-right:10px" >
                <h1 align="right" ><span style="font-size:30px;cursor:pointer;" class="circlestyle" onclick="toggle();"> <div style = "display:inline-block;width:40px;text-align: center;" id="rotation" >&#9776;</div></span></h1>
            </div>
  <div class="slideshow-container">
    <form method="post" action="#">
    <?php
    if ($result && $result->num_rows > 0) {
    for ($x = 0;$row = $result->fetch_assoc(); $x++) {
    echo '<div class="mySlides fade" id="'.$x.'">
            <div class="quiz-container" id="quiz">
              <div class="quiz-header">
                <div class="numbertext">'.($x+1).' /'.$result->num_rows.'</div>
                <h2>'.$row["question"].'</h2>
                <ul>
                  <li><input type="radio" name="answer'.$x.'" id="a" class="answer"><label for="a" id="a_text">'.$row["option_a"].'</label></li>
                  <li><input type="radio" name="answer'.$x.'" id="b" class="answer"><label for="b" id="b_text">'.$row["option_b"].'</label></li>
                  <li><input type="radio" name="answer'.$x.'" id="c" class="answer"><label for="c" id="c_text">'.$row["option_c"].'</label></li>
                  <li><input type="radio" name="answer'.$x.'" id="d" class="answer"><label for="d" id="d_text">'.$row["option_d"].'</label></li>
      	        </ul>
              </div>
            </div>
          </div>';
    }}
    ?>
    <div id="mySidePanel" class="sidepanel">
            <?php
            echo"<a style='color:#f1f1f1'>QUESTIONS</a>";
            for($i=1;$i<=$x;$i++){
              $i1=$i-1;
            echo '
            <a onclick="currentSlide('.$i1.')">'.$i.'</a>
            ';
            }
            echo '<button type="submit">SUBMIT</button>';
            ?>
     </div>
    <a  class="prev" onclick="plusSlides(-1)">&#10094;</a>
    <a class="next" onclick="plusSlides(1)">&#10095;</a>
    <a class="first" onclick="firstSlide()">&#10094;&#10094;</a>
    <a class="last" onclick="lastSlide()">&#10095;&#10095;</a>
    </form>
  </div>
<form action="http://localhost/assperl/loggedin.php">
<input type="submit" value="Exit Quiz" class="exitit">
</form>
<script>
var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function firstSlide() {
  showSlides(slideIndex =1);
}

function lastSlide() {
  showSlides(slideIndex =-200);
}

function currentSlide(n) {
  showSlides(slideIndex = n+1);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";  
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
}
function toggle() {
                var x = document.getElementById("mySidePanel");
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
                document.getElementById("mySidePanel").style.width = "250px";
            }

            function closeNav() {
                document.getElementById("mySidePanel").style.width = "0";
            }
</script>
</body>
</html>