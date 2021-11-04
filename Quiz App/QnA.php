<!DOCTYPE html>
<?php
session_start();
?>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
  * {box-sizing: border-box}
  body {font-family: Verdana, sans-serif; margin:0;
    font-family: "Roboto", Helvetica, Arial, sans-serif;
    font-weight: 100;
    font-size: 20px;
    line-height: 25px;
  }

  .mySlides {display: none}
  img {vertical-align: middle;}

  /* Slideshow container */
  .slideshow-container {
    width: 400vw;
    max-width: 75%;
    position: relative;
    top: -130px;
    margin: auto;
  }

  /* Next & previous buttons */
  .prev, .next {
    cursor: pointer;
    width: auto;
    padding: 16px;
    color: black;
    font-weight: bold;
    font-size: 18px;
    transition: 0.6s ease;
    border-radius: 0 3px 3px 0;
    user-select: none;
  }

  /* Position the "next button" to the right */
  .next {
    border-radius: 3px 0 0 3px;
  }

  /* On hover, add a black background color with a little bit see-through */
  .prev:hover, .next:hover {
    color: rgba(150,30,500,1);
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
  *, *:before, *:after {
    -moz-box-sizing: border-box;
    -webkit-box-sizing: border-box;
    box-sizing: border-box;
  }
  @import url(https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900);

  /*import compass*/
  @import "compass";


  @import url(https://fonts.googleapis.com/css?family=Roboto:400,300,600,400italic);
  * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    -webkit-font-smoothing: antialiased;
    -moz-font-smoothing: antialiased;
    -o-font-smoothing: antialiased;
    text-rendering: optimizeLegibility;
  }


  #contact input[type="text"],
  #contact input[type="number"],
  #contact input[type="email"],
  #contact input[type="tel"],
  #contact input[type="url"],
  #contact textarea,
  #contact input[type="submit"] {
    font: 400 12px/16px "Roboto", Helvetica, Arial, sans-serif;
  }

  #contact {
    background: #F9F9F9;
    padding: 25px;
    margin: 150px 0;
    box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
  }

  #contact h3 {
    display: block;
    font-size: 30px;
    font-weight: 300;
    margin-bottom: 10px;
  }

  #contact h4 {
    margin: 5px 0 15px;
    display: block;
    font-size: 13px;
    font-weight: 400;
  }

  fieldset {
    border: medium none !important;
    margin: 0 0 10px;
    min-width: 100%;
    padding: 0;
    width: 100%;
  }

  #contact input[type="text"],
  #contact input[type="number"],
  #contact input[type="email"],
  #contact input[type="tel"],
  #contact input[type="url"],
  #contact textarea {
    width: 100%;
    border: 1px solid #ccc;
    background: #FFF;
    margin: 0 0 5px;
    padding: 10px;
  }

  #contact input[type="text"]:hover,
  #contact input[type="number"]:hover,
  #contact input[type="email"]:hover,
  #contact input[type="tel"]:hover,
  #contact input[type="url"]:hover,
  #contact textarea:hover {
    -webkit-transition: border-color 0.3s ease-in-out;
    -moz-transition: border-color 0.3s ease-in-out;
    transition: border-color 0.3s ease-in-out;
    border: 1px solid #aaa;
  }

  #contact textarea {
    height: 90px;
    max-width: 100%;
    resize: none;
  }

  #contact input[type="submit"] {
    cursor: pointer;
    width: 100%;
    border: none;
    background: #4CAF50;
    color: #FFF;
    margin: 0 0 5px;
    padding: 10px;
    font-size: 15px;
  }

  #contact button[type="submit"]:hover {
    background: #43A047;
    -webkit-transition: background 0.3s ease-in-out;
    -moz-transition: background 0.3s ease-in-out;
    transition: background-color 0.3s ease-in-out;
  }

  #contact button[type="submit"]:active {
    box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.5);
  }
  #contact input:focus,
  #contact textarea:focus {
    outline: 0;
    border: 1px solid #aaa;
  }

  ::-webkit-input-placeholder {
    color: black;
  }

  :-moz-placeholder {
    color: black;
  }

  ::-moz-placeholder {
    color: black;
  }

  :-ms-input-placeholder {
    color: black;
  }
  :root {
    --background-gradient: linear-gradient(30deg, #f39c12 30%, #f1c40f);
    --gray: #34495e;
    --darkgray: #2c3e50;
  }

  select {
    -webkit-appearance:none;
    -moz-appearance:none;
    -ms-appearance:none;
    appearance:none;
    outline:0;
    box-shadow:none;
    border:0!important;
    background: #5c6664;
    background-image: none;
    flex: 1;
    padding: 0 .5em;
    color:#fff;
    cursor:pointer;
    font-size: 1em;
    font-family: 'Open Sans', sans-serif;
  }
  select::-ms-expand {
    display: none;
  }
  .select {
    position: relative;
    display: flex;
    width: 20em;
    height: 3em;
    line-height: 3;
    background: #5c6664;
    overflow: hidden;
    border-radius: .25em;
  }
  .select::after {
    content: '\25BC';
    position: absolute;
    top: 0;
    right: 0;
    padding: 0 1em;
    background: #2b2e2e;
    cursor:pointer;
    pointer-events:none;
    transition:.25s all ease;
  }
  .select:hover::after {
    color: #23b499;
  }
  .button {
    background-color: red;
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
  }
  .butt{
    display:none;
  }
</style>
</head>
<body style="height: 80vh;">
<?php
/*$_POST["name"]="ak2";
$_POST["no"]=2;
$_POST["time"]=50;
$_POST["duration"]=60;*/
$_SESSION["subject_quiz"] = $_SESSION["subject"].'_'.$_POST["name"];
$_SESSION["quiz_name"] = $_POST["name"];
$_SESSION["quetion_no"] = $_POST["no"];
$_SESSION["temp_time"] = $_POST["time"];
$_SESSION["temp_duration"] = $_POST["duration"];
$n = $_POST["no"];
$i = 0;
?>

<div align="center"  class="slideshow-container">
<form method="POST" action="Add_Q.php" id="contact">
<?php
 while($i<$n)
{
 ?>
<div align="center" id="slider<?php echo $i; ?>" class="mySlides">
     <div style="display:flex-inline;">
        <span class="prev" style="float:left;"><a  onclick="plusSlides(-1)" id="<?php echo 'prev'.$i ?>">&#10094; Prev </a></span>
        <span class="next" style="float:right;"><a onclick="plusSlides(1)" id="<?php echo 'next'.$i ?>">Next &#10095;</a></span>
        <h2 style="float:center;width:120px;">  
          <?php echo 'Question '.($i+1) ?>
        </h2> 
     </div>
		<label style="color: black;">Question</label>
		<textarea cols="20" rows ="5" name="<?php echo 'question'.$i ?>" id="contact" form="contact" required></textarea>
    <div style="display:flex;flex-wrap:wrap">
      <div style="display:flex-inline;padding:3px;margin:2px;width:100%;">
          <div style="display:flex;flex-wrap:wrap;float:left;width:49%;">
            <label for="oa" style="width:100%;">Option A</label>
            <input type="text" name = "<?php echo 'a'.$i ?>" required id="oa" >
          </div>
          <div style="display:flex;flex-wrap:wrap;float:right;width:49%;">
            <label for="ob" style="width:100%;">Option B </label>
            <input type="text" name = "<?php echo 'b'.$i ?>" required id="ob">
          </div>
      </div>

      <div style="display:flex-inline;padding:3px;margin:2px;width:100%;">
          <div style="display:flex;flex-wrap:wrap;float:left;width:49%;">
            <label for="oc"  style="width:100%;">Option C </label>
            <input type="text" name = "<?php echo 'c'.$i ?>" required id="oc"  >
          </div>
          <div style="display:flex;flex-wrap:wrap;float:right;width:49%;">
            <label for="od" style="width:100%;">Option D </label>
            <input type="text" name = "<?php echo 'd'.$i ?>" required id="od" >
          </div>
      </div>
      <div style="display:flex-inline;padding:3px;margin:2px;width:100%;">
          <div style="float:center;width:20%;">
            <label for="answer "id="answer">Correct Option:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <select name="<?php echo 'answer'.$i ?>" id="answer">
              <option value="a">a</option>
              <option value="b">b</option>
              <option value="c">c</option>
              <option value="d">d</option>
            </select><br>
          </div>
      </div>
      <div style="display:flex-inline;padding:3px;margin:2px;width:100%;">
        <label for="ma">Marks
        <input type="number" name = "<?php echo 'marks'.$i ?>" required id="ma" /></label><br><br>
      </div>
    </div>
</div>
 <?php
 $i++;
 }
?>
<div align="center"><input type="submit" value="Create"></div>
</form>
</div>

<button class="butt"  onclick="slide()" id="slide" style="opacity: 0; cursor: not-allowed;" disabled></button>
<button class="butt"  onclick="total()" id="total">Layout 2</button>
<script>
var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  if (n > slides.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";  
  }
  slides[slideIndex-1].style.display = "block";  
}
function total()
{
	for(var i=0; i<<?php echo $n; ?>; i++)
	{
		document.getElementById("slider"+i).classList.remove('mySlides');
		document.getElementById("slider"+i).classList.add('x');
		document.getElementById("slider"+i).removeAttribute('style');
    document.getElementById("prev"+i).style.visibility = "hidden";  
	  document.getElementById("next"+i).style.visibility = "hidden";
	}
	document.getElementById("total").disabled = true;
	document.getElementById("total").style.opacity = "0.6";
	document.getElementById("total").style.cursor = "not-allowed";
	document.getElementById("slide").removeAttribute('disabled');
	document.getElementById("slide").removeAttribute('style');
}
function slide()
{
	for(var i=0; i<<?php echo $n; ?>; i++)
	{
		document.getElementById("slider"+i).classList.remove('x');
		document.getElementById("slider"+i).classList.add('mySlides');  
	}
	var slides = document.getElementsByClassName("mySlides");
		slideIndex = 1;
		for (i = 0; i < slides.length; i++) {
			slides[i].style.display = "none";  
      document.getElementById("next"+i).removeAttribute('style'); 
	    document.getElementById("prev"+i).removeAttribute('style');
		}
		slides[slideIndex-1].style.display = "block";
	document.getElementById("slide").disabled = true;
	document.getElementById("slide").style.opacity = "0.6";
	document.getElementById("slide").style.cursor = "not-allowed";	
	document.getElementById("total").removeAttribute('disabled');
	document.getElementById("total").removeAttribute('style');
}

</script>
</body>
</html> 
