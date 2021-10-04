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
</style>
</head>
<body>
  <div class="slideshow-container">
    <?php

    if ($result && $result->num_rows > 0) {
    for ($x = 0;$row = $result->fetch_assoc(); $x++) {
    echo '<div class="mySlides fade">
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
    <a  class="prev" onclick="plusSlides(-1)">&#10094;</a>
    <a class="next" onclick="plusSlides(1)">&#10095;</a>
    <a class="first" onclick="firstSlide()">&#10094;&#10094;</a>
    <a class="last" onclick="lastSlide()">&#10095;&#10095;</a>
      <div class="text">Submit</div>
      <div style="text-align:center">
        <?php

        ?> 
      </div>
  </div>
  <br>
<a href="newupload.php"><button>Upload Image</button></a>
<br>
<form action="logout.php">
<br>
<input type="submit" value="Log Out">
</form>
<script src="sldshw.js"></script>
</body>
</html>