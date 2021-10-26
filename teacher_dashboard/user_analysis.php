<!DOCTYPE html>
<html lang="en" >
<head>

		<meta charset="UTF-8">
		<link rel="apple-touch-icon" type="image/png" href="https://cpwebassets.codepen.io/assets/favicon/apple-touch-icon-5ae1a0698dcc2402e9712f7d01ed509a57814f994c660df9f7a952f3060705ee.png" />
		<meta name="apple-mobile-web-app-title" content="CodePen">

		<link rel="shortcut icon" type="image/x-icon" href="https://cpwebassets.codepen.io/assets/favicon/favicon-aec34940fbc1a6e787974dcd360f2c6b63348d4b1f4e06c77743096d55480f33.ico" />

		<link rel="mask-icon" type="" href="https://cpwebassets.codepen.io/assets/favicon/logo-pin-8f3771b1072e3c38bd662872f6b673a722f4b3ca2421637d5596661b4e2132cc.svg" color="#111" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">


		<title>TruPen - Teacher DashBoard</title>

		<link rel="stylesheet" href="styles.css?v=<?php echo time(); ?>">

		<script>
			if (document.location.search.match(/type=embed/gi)) {
			window.parent.postMessage("resize", "*");
			}
		</script>
</head>
<?php
session_start();
$con = new mysqli('localhost', 'root', NULL, 'trupendb');
$name = $_POST["name"];
$subject = $_POST["subject"];
$total = $_POST["total"];
$sql = "SELECT * FROM ".$subject."_".$name."_result ORDER BY marks DESC";
$result = $con->query($sql) or die("Error: ". $con->error);
$colorbk=array('#fee4cb','#e9e7fd',' #4f3ff0','#ffd3e2','#c8f7dc','#d5deff');
$colors=array('#ff942e','#4f3ff0','#096c86','#df3670','#34c471','#4067f9');
$cnt=0;
while($row = $result->fetch_assoc())
	{
			echo '
				<div class="project-box-wrapper">
				<div class="project-box" onclick="begQ('."'".$row["user"]."'".');" style="background-color: '.$colorbk[$cnt%6].';">
				<div class="project-box-header">
				<div class="more-wrapper">
				<button class="project-btn-more">
				<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical">
				<circle cx="12" cy="12" r="1" />
				<circle cx="12" cy="5" r="1" />
				<circle cx="12" cy="19" r="1" />
				</svg>
				</button>
				</div>
				</div>
				<div class="project-box-content-header">
				<form method="POST" action="question_analysis.php" id="myForm'.$row["user"].'">
				<input type="hidden" name="name" value="'.$name.'">
				<input type="hidden" name="subject" value="'.$subject.'">
				<input type="hidden" name="user" value="'.$row["user"].'">
				<input type="hidden" name="no" value="'.$_POST["no"].'">
				</form>
				<p class="box-content-header">User: '.$row["user"].'</p>
				</div>
				<div class="box-progress-wrapper">
				<p class="box-progress-header">Marks Obtained: '.$row["marks"].'</p>
				<p class="box-progress-header">Total Marks : '.$total.'</p>
				<p class="box-progress-header">Submit Time: '.explode(" ", $row['time'])[1].'</p>
				<p class="box-progress-header">Submit Date: '.explode(" ", $row['time'])[0].'</p>
				<div class="box-progress-bar">
				<span class="box-progress" style="width: '.round((100*$row['marks']/$total),2).'%; background-color: #ff942e"></span>
				</div>
				<p class="box-progress-percentage">'.round((100*$row['marks']/$total),2).'%</p>
				</div>
				<div class="project-box-footer">
				</div>
				</div>
				</div>';
				$cnt+=1;
	}
?>
<script id="rendered-js" >
			document.addEventListener('DOMContentLoaded', function () {
				var modeSwitch = document.querySelector('.mode-switch');

				modeSwitch.addEventListener('click', function () {
					document.documentElement.classList.toggle('dark');
					modeSwitch.classList.toggle('active');
				});

				var listView = document.querySelector('.list-view');
				var gridView = document.querySelector('.grid-view');
				var projectsList = document.querySelector('.project-boxes');

				listView.addEventListener('click', function () {
					gridView.classList.remove('active');
					listView.classList.add('active');
					projectsList.classList.remove('jsGridView');
					projectsList.classList.add('jsListView');
				});

				gridView.addEventListener('click', function () {
					gridView.classList.add('active');
					listView.classList.remove('active');
					projectsList.classList.remove('jsListView');
					projectsList.classList.add('jsGridView');
				});

				document.querySelector('.messages-btn').addEventListener('click', function () {
					document.querySelector('.messages-section').classList.add('show');
				});

				document.querySelector('.messages-close').addEventListener('click', function () {
					document.querySelector('.messages-section').classList.remove('show');
				});
			});
			function begQ(data){
				document.getElementById('myForm'+data).submit();
			}
			function gotoC(combo){
				window.location.href = combo;
			}
		</script>
<form action="quiz_analysis.php">
<input type="submit" value="Back">
</form>
</html>