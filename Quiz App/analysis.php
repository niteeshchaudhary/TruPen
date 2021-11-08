<!DOCTYPE html>
<?php
session_start();
$conn = new mysqli('localhost', 'root', NULL, 'trupendb');
?>
<html>
<head>
  <link rel = "icon" href ="../Image_Components/truPen Better Logo.png"  type = "image/x-icon">
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
        top: -145px;
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
      font: 400 16px/16px "Roboto", Helvetica, Arial, sans-serif;
    }

    #contact {
      background: #F9F9F9;
      padding: 25px;
      margin: 150px 0;
      box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
    }

    #contact h4 {
      display: block;
      font-size: 20px;
      font-weight: 300;
      margin-bottom: -10px;
    }
    #contact p {
      display: block;
      font-size: 20px;
      font-weight: 300;
    }

    fieldset {
      border: medium none !important;
      margin: 0 0 10px;
      min-width: 100%;
      padding: 0;
      width: 100%;
    }

    #contact input[type="text"]{
      width: 100%;
      margin: 0 0 5px;
      padding: 10px;
    }
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
      .simp{
        border: 1px solid #ccc;
        background: #FFF;
      }
    .cor{
      border: 3px solid green;
      background: #aF0;
    }

    .wor{
      border: 2px solid red;
      background: #Fa0;
    }

  </style>
</head>
<body style="height: 80vh;">
<?php
  function percent($num, $subject_name, $conn) 
  {
    $sql = "SELECT ".$num."_m FROM $subject_name"."_result";
    $result3 = $conn->query($sql) or die("Error: ". $conn->error);
    $a = 0;
    $c = 0;
    while($row3 = $result3->fetch_assoc())
    {
      if($row3[$num."_m"]==NULL)
      {
        $a++;
        continue;
      }
      elseif(explode("_", $row3[$num."_m"])[0] == explode("_", $row3[$num."_m"])[1])
      {
        $c++;
      }
      $a++;
    }
    return round(100*$c/$a ,2);
  }
  $name = $_POST["name"];
  $subject = $_POST["subject"];
  $subject_name = $_POST["subject"].'_'.$_POST["name"];
  $n = $_POST["no"];
  $i = 0;
  $sql = "SELECT * FROM $subject_name"."_result"." where user='".$_SESSION["user"]."'";
  $result1 = $conn->query($sql) or die("Error: ". $conn->error);
  $sql = "SELECT * FROM $subject_name";
  $result2 = $conn->query($sql) or die("Error: ". $conn->error);
?>

<div align="center"  class="slideshow-container">
<form method="POST" action="Add_Q.php" id="contact">
<?php
 while($row1 = $result1->fetch_assoc())
{
	while($row2 = $result2->fetch_assoc())
	{
 ?>
<div align="center" id="slider<?php echo $i; ?>" class="mySlides">
		<?php
			if($row1[$i."_m"] == NULL)
			{
				$marks = 0;
				$color = "gray";
				$str = "Not Attempted";
			}
			elseif(explode("_", $row1[$i."_m"])[0] != explode("_", $row1[$i."_m"])[1])
			{
				$marks = 0;
				$color = "red";
				$str = "Wrong Answer";
			}
			elseif(explode("_", $row1[$i."_m"])[0] == explode("_", $row1[$i."_m"])[1])
			{
				$marks = $row2["marks"];
				$color = "green";
				$str = "Correct Answer";
			}
		?>
      <div style="display:flex-inline;">
          <span class="prev" style="float:left;"><a  onclick="plusSlides(-1)" id="<?php echo 'prev'.$i ?>">&#10094; Prev </a></span>
          <span class="next" style="float:right;"><a onclick="plusSlides(1)" id="<?php echo 'next'.$i ?>">Next &#10095;</a></span>
          <h2 style="float:center;width:120px;">  
            <?php echo 'Question '.($i+1) ?>
          </h2> 
     </div>
		
		<?php
			$per = percent($i, $subject_name, $conn);
			if($per>50)
			{
				$col = "green";
			}
			else
			{
				$col = "red";
			}
		?>
    <h4 style="color: <?php echo $color; ?>;margin-top:15px;"><?php echo $str ?> , Marks: <?php echo $marks; ?></h4>
		<p style="color: <?php echo $col; ?>;margin-top:10px;margin-bottom:15px"><?php echo $per; ?>% of got it right!</p>
    
    <label style="color: black;">Question</label>
		<textarea cols="20" rows ="5" disabled><?php echo $row2["question"]; ?></textarea>
    <div style="display:flex;flex-wrap:wrap">
      <div style="display:flex-inline;padding:3px;margin:2px;width:100%;">
          <div style="display:flex;flex-wrap:wrap;float:left;width:49%;">
            <label for="oa" style="width:100%;">Option A</label>
            <input type="text" class='<?php if($row2["answer"]=="a"){echo "cor";}elseif(explode("_", $row1[$i."_m"])[0]=="a"){echo "wor";}else{echo "simp";}?>' value="<?php echo $row2["option_a"]; ?>" disabled >
          </div>
          <div style="display:flex;flex-wrap:wrap;float:right;width:49%;">
            <label for="ob" style="width:100%;">Option B </label>
            <input type="text" class='<?php if($row2["answer"]=="b"){echo "cor";}elseif(explode("_", $row1[$i."_m"])[0]=="b"){echo "wor";}else{echo "simp";}?>'  value="<?php echo $row2["option_b"]; ?>" disabled>
          </div>
      </div>

      <div style="display:flex-inline;padding:3px;margin:2px;width:100%;">
          <div style="display:flex;flex-wrap:wrap;float:left;width:49%;">
            <label for="oc"  style="width:100%;">Option C </label>
            <input type="text" class='<?php if($row2["answer"]=="c"){echo "cor";}elseif(explode("_", $row1[$i."_m"])[0]=="c"){echo "wor";}else{echo "simp";}?>' value="<?php echo $row2["option_c"]; ?>" disabled>
          </div>
          <div style="display:flex;flex-wrap:wrap;float:right;width:49%;">
            <label for="od" style="width:100%;">Option D </label>
            <input type="text" class='<?php if($row2["answer"]=="d"){echo "cor";}elseif(explode("_", $row1[$i."_m"])[0]=="d"){echo "wor";}else{echo "simp";}?>' value="<?php echo $row2["option_d"]; ?>" disabled>
          </div>
          <div style="display:flex;flex-wrap:wrap;float:right;width:100%;">
            <label for="exp" style="width:100%;">Explaination </label>
            <input type="text"  value="<?php echo $row2["exp"]; ?>" disabled id="exp">
          </div>
      </div>
    </div>
</div>
 <?php
 $i++;
	}
}
?>
</form>
<button type="button" class="butt" onclick="slide()" id="slide" style="opacity: 0.6; cursor: not-allowed;" disabled>Layout 1</button>
<button type="button" class="butt" onclick="total()" id="total">Layout 2</button>
</div>
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
