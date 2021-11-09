<?php
	session_start(); 
	date_default_timezone_set('Asia/Kolkata');
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "trupendb";
	$uimg=$_SESSION["uimg"];
	$conn = new mysqli($servername, $username, $password, $dbname);
	$sql = "SELECT time, time_limit FROM quiz WHERE name = '".$_POST["quiz_name"]."' AND subject = '".$_POST["quiz_subject"]."'";
	$result = $conn->query($sql);
	while($row = $result->fetch_assoc())
	{
		$to_time = strtotime(implode(" ", explode("T", $row["time"])));
		$time_limit = $row["time_limit"];
		$from_time = strtotime(date('Y-m-d H:i:s'));
		$t = $from_time - $to_time;
	}
	if($t<0)
	{
		header("location:javascript://history.go(-1)");
		exit();
	}
	// Check connection
	if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
	}
	$_SESSION["quiz_name"] = $_POST["quiz_name"];
	$_SESSION["quiz_subject"] = $_POST["quiz_subject"];
	$qryst="select * from ".$_SESSION["quiz_subject"].'_'.$_SESSION["quiz_name"];
		$result = $conn->query($qryst);
	$x=0;
	if ($result && $result->num_rows > 0) {
?>
<!DOCTYPE html>
<html lang="en" >

	<head>

		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="../Chatbot/static/css/chat.css">
		<link rel = "icon" href ="../Image_Components/truPen Better Logo.png"  type = "image/x-icon">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>


		<title>TruPen - Student DashBoard</title>

		<style>
			*{box-sizing: border-box}
			body {
				font-family: Verdana, sans-serif; margin:0;
				background: #f4ffff;
			}
			.mySlides {
				display: none;
				height: 500px;
			}
			.main-container {
				display:flex;
				/*flex-flow: row wrap;*/
				width:100%;
				height:68vh;
			}
			/* Slideshow container */
			.slideshow-container {
				float: left;
				margin:4px;
				width:100%;
				height:65vh;
			}
			.slideshow-container form {
				width:100%;
				height:65vh;
			}
			.main-container .navstp{
				padding: 6px;
				display: inline-flex;
				flex-direction: column;
				background:rgba(250, 250, 250, 0.2);
				border-radius: 5% 5%;
				width:10%;
				height:67vh;
			}
			/* Next & previous buttons */
			.prev, .next {
				cursor: pointer;
				background-color: rgba(0,0,0,0.1);
				width: auto;
				padding: 16px;
				color: white;
				font-weight: bold;
				font-size: 18px;
				transition: 0.6s ease;
				border-radius: 10%;
				user-select: none;
			}
			.first{
				cursor: pointer;
				float: left;
				background-color: rgba(100,0,0,0.5);
				width: auto;
				padding: 16px;
				color: white;
				font-weight: bold;
				font-size: 18px;
				transition: 0.6s ease;
				border-radius: 10%;
				user-select: none;
			}
			.last {
				cursor: pointer;
				float: right;
				background-color: rgba(0,100,0,0.5);
				width: auto;
				padding: 16px;
				color: white;
				font-weight: bold;
				font-size: 18px;
				transition: 0.6s ease;
				border-radius: 10%;
				user-select: none;
			}

			/* On hover, add a black background color with a little bit see-through */
			.prev:hover, .next:hover {
				background-color: rgba(0,0,0,0.8);
				border: 2px solid rgba(200,250,250,0.8);
			}
			.first:hover{
				background-color: rgba(100,0,0,0.8);
				border: 2px solid rgba(200,150,200,0.8);
			}
			.last:hover {
				background-color: rgba(0,100,0,0.8);
				border: 2px solid rgba(200,150,200,0.8);
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
				margin-left:40%;
				width:60px;
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
				-webkit-animation-duration: 1s;
				animation-name: fade;
				animation-duration: 1s;
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
				background-color: var(--projects-section);
				border-radius: 10px;
				box-shadow: 0 0 10px 2px var(--main-color);
				color:var(--main-color);
				width: 100%;
				height: 100%;
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
				padding: 5px;
			}
			ul li{
				font-size: 1.2rem;
				margin: 1.3rem 1.3rem;
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


			.navboxd {
					display: block;
					float: right;
					overflow: hidden;
					height: 80vh;
					width: 100%;
					align-content: center;
					background-color: rgba(235,235,235,0.13);
					border-radius: 10px;
					backdrop-filter: blur(10px);
					border: 2px solid rgba(255,255,255,0.1);
					box-shadow: 0 0 10px rgba(8,7,16,0.6);
				}
				.flexbox {
					display: flex;
					padding: 5px;
					margin: 5px;
					flex-flow: row wrap;
					background-color: rgba(235,235,235,0.13);
					border-radius: 10px;
					backdrop-filter: blur(10px);
					border: 2px solid rgba(255,255,255,0.1);
					box-shadow: 0 0 40px rgba(8,7,16,0.6);
				}

				.flexbox .flex-item {
					padding: 5px;
					margin: 5px;
					width: 45px;
					cursor: pointer;
					height: 45px;
					align-content: center;
					vertical-align: center;
					border-radius: 35% 60%;
					background-color:  #999999;
				}
				.flexbox .act {
					/*background-color: #999999;*/
					border-radius: 25%;
					color: var(--qtt);
					font-size:22px;
					border-color:#ffffff;
				}
				.flexbox .flex-item .act{
					display: block;
					padding: 0 auto;
					margin: 0 auto;
					height:32px;
					border-color: black;
					font-size:18px;
					border-radius: 25%;
					background: #555;
					box-shadow: 5px;
					text-align: center;
					justify-content: center;
				}
				.flexbox .lft {
					display: block;
					padding: 5px;
					margin: 5px;
					border-color:#ff00af;
					background-color: #da0000;
					box-shadow: 5px;
					text-align: center;
				}

				.flexbox .atm {
					display: block;
					padding: 5px;
					margin: 5px;
					border-color:#00ff00;
					background-color: #00da00;
					box-shadow: 5px;
					text-align: center;
				}
				.flexbox .flex-item .con {
					display: block;
					padding: 5px;
					margin: 5px;
					height: 25px;
					border-radius: 50%;
					border-color: black;
					background-color: var(--search-area-bg);
					box-shadow: 5px;
					text-align: center;
				}
				.flexbox .flex-item-rev .con {
					display: block;
					padding: 5px;
					margin: 5px;
					border-radius: 50%;
					border-color: black;
					background-color: #fff;
					box-shadow: 5px;
					text-align: center;
				}
				.flexbox .flex-item-attempt .con {
					display: block;
					padding: 5px;
					margin: 5px;
					border-radius: 50%;
					border-color: black;
					background-color: #fff;
					box-shadow: 5px;
					text-align: center;
				}
				.flexbox .flex-item-leftb .con {
					display: block;
					padding: 5px;
					margin: 5px;
					border-radius: 50%;
					border-color: black;
					background-color: #ff0000;
					box-shadow: 5px;
					text-align: center;
				}
				.flexbox .flex-item-rev {
					padding: 5px;
					margin: 5px;
					width: 45px;
					height: 45px;
					align-content: center;
					vertical-align: center;
					border-radius: 50%;
					background-color: #aa00aa;
				}
				.flexbox .flex-item-leftb {
					padding: 5px;
					margin: 5px;
					width: 45px;
					height: 45px;
					align-content: center;
					vertical-align: center;
					border-radius: 50%;
					background-color: #a00;
				}
				.flexbox .flex-item-attempt {
					padding: 5px;
					margin: 5px;
					width: 45px;
					height: 35px;
					align-content: center;
					vertical-align: center;
					border-radius: 50%;
					background-color: #0f0;
				}
			
				.head {
					padding: 5px;
					margin: 5px;
					text-align: center;
					background-color: rgba(235,235,235,0.13);
					border-radius: 10px;
					backdrop-filter: blur(10px);
					border: 2px solid rgba(255,255,255,0.1);
					box-shadow: 0 0 10px rgba(8,7,16,0.6);
				}
					.botm{
						padding: 5px;
						margin: 5px;
						position: absolute;
						bottom: 0;
						text-align: center;
						background-color: rgba(0,0,100,0.23);
						border-radius: 10px;
						backdrop-filter: blur(10px);
						border: 2px solid rgba(255,255,255,0.1);
						box-shadow: 0 0 5px rgba(8,7,16,0.6);
					}
					.botm .btn { 
						border-radius: 5px;
						border: 4px solid rgba(255,255,255,0.2);
						color: #fff;
						border: none;
						display:inline-flex;
						width: 100%;
						font-size: 1 rem;
						font-family: sans-serif;
						padding: 1rem;
						background-color: rgba(10,10,150,0.13);
					}
				.btn:hover {
					border: 4px solid rgba(255,255,255,0.8);
					background-color: rgba(200,25,25,0.4);
				}

				.btn:focus {
					outline: none;
					background-color: rgba(200,250,235,0.13);
				}
				.timer-container {
						display: block;
						float: right;
						width: 100px;
						height: 50px;
						align-content: center;
						background-color: rgba(235,235,235,0);
						border-radius: 10px;
						backdrop-filter: blur(10px);
						border: 1px solid rgba(255,255,255,0);
						box-shadow: 0 0 40px rgba(8,7,16,0);
						top:-200px;
				}
			.base-timer {
				position: relative;
				width: 60px;
				height: 60px;
			}
			
			.base-timer__svg {
				transform: scaleX(-1);
			}
			
			.base-timer__circle {
				fill: none;
				stroke: none;
			}
			
			.base-timer__path-elapsed {
				stroke-width: 7px;
				stroke: grey;
			}
			
			.base-timer__path-remaining {
				stroke-width: 10px;
				stroke-linecap: round;
				transform: rotate(90deg);
				transform-origin: center;
				transition: 1s linear all;
				fill-rule: nonzero;
				stroke: currentColor;
			}
			
			.base-timer__path-remaining.green {
				color: rgb(65, 184, 131);
			}
			
			.base-timer__path-remaining.orange {
				color: orange;
			}
			
			.base-timer__path-remaining.red {
				color: red;
			}
			
			.base-timer__label {
				position: absolute;
				width: 60px;
				height: 60px;
				top: 0;
				display: flex;
				align-items: center;
				justify-content: center;
				font-size: 17px;
			}
		</style>

		<link rel="stylesheet" href="styles.css?v=<?php echo time(); ?>">

		<script>
			if (document.location.search.match(/type=embed/gi)) {
			window.parent.postMessage("resize", "*");
			}
		</script>
	</head>

	<body translate="no" >
		<div class="app-container">
			<div class="app-header">
				<div class="app-header-left">
					<img src="../Image_Components/truPen Better Logo.png" height="40" width="50" alt="i_logo"></img>
					<!--<span class="app-icon"></span>-->
					<p class="app-name">Student</p>
					<p  class="app-name">Quiz - <?php echo $_SESSION["quiz_name"];?></p>
				</div>
				<div class="app-header-right">
					<button class="mode-switch" title="Switch Theme">
						<svg class="moon" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" width="24" height="24" viewBox="0 0 24 24">
							<defs></defs>
							<path d="M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z"></path>
						</svg>
					</button>
					<button class="add-btn" title="Add New Project">
						<svg class="btn-icon" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus">
							<line x1="12" y1="5" x2="12" y2="19" />
							<line x1="5" y1="12" x2="19" y2="12" />
						</svg>
					</button>
					<button class="profile-btn">
						<img src='<?php echo  $uimg;?>' />
						<span><?php echo  $_SESSION["user"];?></span>
					</button>
				</div>
				<button class="messages-btn">
					<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-message-circle">
						<path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z" />
					</svg>
				</button>
			</div>
			<div class="app-content">
				<div class="app-sidebar">
					<a href="#" class="app-sidebar-link active">
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home">
							<path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z" />
							<polyline points="9 22 9 12 15 12 15 22" />
						</svg>
					</a>
				</div>
				<div class="projects-section">
					
					<div class="projects-section-line">
						<div class="projects-status">
							<div class="item-status">
								<span class="status-number" id="nvq"><?php echo $result->num_rows-1;?></span>
								<span class="status-type">Not-Visited</span>
							</div>
							<div class="item-status">
								<span class="status-number"  id="uaq">0</span>
								<span class="status-type">Un-Attempted</span>
							</div>
							<div class="item-status">
								<span class="status-number"  id="atmq">0</span>
								<span class="status-type">Attempted</span>
							</div>
							<div class="item-status">
								<span class="status-number" id="ttq"><?php echo $result->num_rows;?></span>
								<span class="status-type">Total Qusetions</span>
							</div>
					
								<span class="status-number">
									<div class="search-wrapper" style="height:60px;width:60px;background:transparent;">
										<p id="app"></p>
										<!--<div class="box-progress-bar">
											<span class="box-progress" id="timep" style="background-color:#0f0;"></span>
										</div>-->
									</div>
								</span>
					
							
						</div>
					</div>
					<div class="project-boxes jsGridView">
						<div class="main-container">
									<div class="slideshow-container">
										<form method="post" action="evaluation.php" id="myform">
												<?php
													global $x;
													$row = array();
													while($x = $result->fetch_assoc()){
													$row[] = $x;
													}
													$q = 1;
													$al = array("a", "b", "c", "d");
													shuffle($al);
													$arr = range(0, count($row)-1);
													shuffle($arr);
													foreach ($arr as $x) {
														echo '<div class="mySlides" id="'.$x.'">
																<div class="quiz-container" id="quiz">
																<div class="quiz-header">
																	<div class="numbertext">Q : '.($q++).'</div>
																	<h2>Marks: '.$row[$x]["marks"].'</h2>
																	<h2>'.$row[$x]["question"].'</h2>
																	<ul>';
																	foreach ($al as $y)
																	{
																		echo '<li><input type="radio" name="answer'.$x.'" id="'.$y.$x.'" onclick="check_select()" class="answer" value="'.$y.'_'.$x.'">&nbsp&nbsp<label for="'.$y.$x.'" id="a_text">'.$row[$x]["option_".$y].'</label></li>';
																	}
																	echo '</ul>
																</div>
																</div>
															</div>';
													}
													}

												?>
											<!--<button type="submit" id="s">Submit</button>-->
											
										</form>
									</div>
									
									<div class="navstp">
											<a class="first" onclick="firstSlide()">&#10094;&#10094;</a><br>
											<a class="last" onclick="lastSlide()">&#10095;&#10095;</a><br>
											<br>
											<a  class="prev" onclick="plusSlides(-1)">&#10094;P</a><br>
											<a class="next" onclick="plusSlides(1)">N&#10095;</a><br>
									</div>
						</div>
					</div>
				</div>
				<div class="messages-section" style="overflow: hidden;">
					<button class="messages-close">
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-circle">
							<circle cx="12" cy="12" r="10" />
							<line x1="15" y1="9" x2="9" y2="15" />
							<line x1="9" y1="9" x2="15" y2="15" />
						</svg>
					</button>
					<div class="projects-section-header">
						<?php
									echo'
									<div class="navboxd">
										<h3 class="head">Quiz Navigation</h3>
										<hr noshade="2">
										<div class="flexbox">';
										//echo"<a style='color:#f1f1f1'>QUESTIONS</a>";
										for($i=1;$i<count($row)+1;$i++){
											$i1=$i-1;
											//echo '<a onclick="currentSlide('.$i1.')">'.$i.'</a>';
											echo'<div class="flex-item">
													<a onclick="currentSlide('.$i1.')">
													<h6 class="con">'.$i.'</h6></a>
												</div>';
										}
										echo '</div>
											<div class="botm">
												<button class="btn" onclick="forcesubmit()">Submit</button>
											</div>
									</div>';
									?>
					</div>
				</div>
			</div>
		</div>
		<script src="oscillate.js?v=<?php echo time(); ?>"></script>
		<script id="rendered-js" >
			document.addEventListener('DOMContentLoaded', function () {
				var modeSwitch = document.querySelector('.mode-switch');

				modeSwitch.addEventListener('click', function () {
					document.documentElement.classList.toggle('dark');
					modeSwitch.classList.toggle('active');
				});

				var projectsList = document.querySelector('.project-boxes');

				document.querySelector('.messages-btn').addEventListener('click', function () {
					document.querySelector('.messages-section').classList.add('show');
				});

				document.querySelector('.messages-close').addEventListener('click', function () {
					document.querySelector('.messages-section').classList.remove('show');
				});
			});
			function gotoC(combo){
				window.location.href = "showqlist.php?sub="+combo;
			}
		</script>
		<?php
			$max = max(60*$time_limit-$t, 0);
			echo "
			<script> let TIME_LIMIT =$max;
				let TL =$time_limit*60;  
			</script>";
		?>

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
				if(slideIndex == n+1){
					return;
				}
				showSlides(slideIndex = n+1);
			}

			function showSlides(n) {
			var i;
			var slides = document.getElementsByClassName("mySlides");
			var dots = document.getElementsByClassName("flex-item");
			document.querySelector('.messages-section').classList.remove('show');
			if (n > slides.length) {slideIndex = 1}    
			if (n < 1) {slideIndex = slides.length}
			for (i = 0; i < slides.length; i++) {
				slides[i].style.display = "none";  
			}
			check_select();
			for (i = 0; i < dots.length; i++) {
				if(dots[i].className.includes(" act") && !dots[i].className.includes(" lft") && !dots[i].className.includes(" atm")){
					dots[i].className += " lft"; //dots[i].className.replace(" act", "");
					document.getElementById("uaq").innerHTML=Number(document.getElementById("uaq").innerHTML)+1;
				}
				var nv=Number(document.getElementById("ttq").innerHTML)
					-Number(document.getElementById("uaq").innerHTML)
					-Number(document.getElementById("atmq").innerHTML)-1;
					document.getElementById("nvq").innerHTML=nv>=0?nv:0;
				dots[i].className = dots[i].className.replace(" act", "");
			}
			slides[slideIndex-1].style.display = "block";  
			if(dots[slideIndex-1].className.includes(" lft")){
				dots[slideIndex-1].className.replace(" lft", "");
			}
			dots[slideIndex-1].className += " act";
			}
			function check_select() { 
						let k='input[name= "answer'+String(slideIndex-1)+'"]:checked';
						var checkRadio = document.querySelector(k);
						var dots = document.getElementsByClassName("flex-item");
						if(checkRadio != null) {
							if(dots[slideIndex-1].className.includes(" lft")){
								dots[slideIndex-1].className = dots[slideIndex-1].className.replace(" lft", "");
								document.getElementById("uaq").innerHTML=Number(document.getElementById("uaq").innerHTML)-1;
							}
							if(!dots[slideIndex-1].className.includes(" atm")){
								dots[slideIndex-1].className += " atm";
								document.getElementById("atmq").innerHTML=Number(document.getElementById("atmq").innerHTML)+1;
							}
						}
						else {

						}
						
					}
			// code for timer :
			const FULL_DASH_ARRAY = 283;
			const WARNING_THRESHOLD = TL*25/100;
			const ALERT_THRESHOLD = 10;

			const COLOR_CODES = {
				info: {
					color: "green"
				},
				warning: {
					color: "orange",
					threshold: WARNING_THRESHOLD
				},
				alert: {
					color: "red",
					threshold: ALERT_THRESHOLD
				}
			};
			//const TIME_LIMIT = 100;
			//TIME_LIMIT = window.sessionStorage.getItem("Time");
			let timePassed = 0;
			let timeLeft = TIME_LIMIT;
			let timerInterval = null;
			let remainingPathColor = COLOR_CODES.info.color;

			document.getElementById("app").innerHTML = `
				<div class="base-timer">
					<svg class="base-timer__svg" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
						<g class="base-timer__circle">
						<circle class="base-timer__path-elapsed" cx="50" cy="50" r="45"></circle>
						<path
							id="base-timer-path-remaining"
							stroke-dasharray="283"
							stroke-dashoffset="0"
							class="base-timer__path-remaining ${remainingPathColor}"
							d="
							M 50, 50
							m -45, 0
							a 45,45 0 1,0 90,0
							a 45,45 0 1,0 -90,0
							"
						></path>
						</g>
					</svg>
					<span id="base-timer-label" class="base-timer__label">${formatTime(timeLeft)}</span>
					</div>
					`;

			startTimer();

			function onTimesUp() {
				clearInterval(timerInterval);
			}

			function startTimer() {
				timerInterval = setInterval(() => {
					timePassed = timePassed += 1;
					timeLeft = TIME_LIMIT - timePassed;
					//window.sessionStorage.setItem("time",timeLeft);
					document.getElementById("base-timer-label").innerHTML = formatTime(
						timeLeft
					);
					setCircleDasharray();
					setRemainingPathColor(timeLeft);

					if (timeLeft <= 0) {
						onTimesUp();
						location.reload();
						document.getElementById("myform").submit();
						//window.sessionStorage.setItem("time",0);
						return ;
					}
				}, 1000);
			}
			function formatTime(time) {
				const minutes = Math.floor(time / 60);
				let seconds = time % 60;
				
				if (seconds < 10) {
					seconds = `0${seconds}`;
				}
				//document.getElementById("timep").style.width=String((time)*100/TL)+"%";
				//document.getElementById("timep").style.backgroundColor="#0f0";
				//document.getElementById("timep").setAttribute("class", `base-timer__path-remaining ${remainingPathColor}`);
				return `${minutes}:${seconds}`;
			}

			function setRemainingPathColor(timeLeft) {
				const {
					alert,
					warning,
					info
				} = COLOR_CODES;
				if (timeLeft <= alert.threshold) {
					document
						.getElementById("base-timer-path-remaining")
						.classList.remove(warning.color);
					document
						.getElementById("base-timer-path-remaining")
						.classList.add(alert.color);
				} else if (timeLeft <= warning.threshold) {
					document
						.getElementById("base-timer-path-remaining")
						.classList.remove(info.color);
					document
						.getElementById("base-timer-path-remaining")
						.classList.add(warning.color);
				}
			}

			function calculateTimeFraction() {
				const rawTimeFraction = timeLeft / TIME_LIMIT;
			// return rawTimeFraction - (1 / TIME_LIMIT) * (1 - rawTimeFraction);
			return rawTimeFraction;
			}

			function setCircleDasharray() {
				const circleDasharray = String((TL-timeLeft)*283/TL);
				//const circleDasharray = `${(calculateTimeFraction() * FULL_DASH_ARRAY).toFixed(0)} 360`;
				//const circleDasharray = ((TIME_LIMIT-timeLeft)/TIME_LIMIT*283).toString();;
				document.getElementById("base-timer-path-remaining").style.strokeDashoffset=circleDasharray;
			}
		</script>

		<script type="text/javascript">
			function forcesubmit() {
			document.getElementById("myform").submit();
			}
		</script>
		<script src='../Design_Components/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/js/bootstrap.min.js'></script>

	</body>

</html>
