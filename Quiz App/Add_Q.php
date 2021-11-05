<?php
session_start();
$name_subject = $_SESSION["subject_quiz"];
$name = $_SESSION["quiz_name"];
$n = $_SESSION["quetion_no"];
$i = 0;
$t = 0;
$con = new mysqli('localhost', 'root', NULL, 'trupendb');
$sql = "INSERT INTO quiz(name, subject, time, time_limit, no_questions)
			VALUES ('$name', '".$_SESSION["subject"]."', '".$_SESSION["temp_time"]."', '".$_SESSION["temp_duration"]."', '$n')";
	$con->query($sql);
$sql = 'CREATE TABLE IF NOT EXISTS '.$_SESSION["subject_quiz"].'
		(sn INT AUTO_INCREMENT PRIMARY KEY,
         question TEXT unique,
		 option_a varchar(120),
		 option_b varchar(120),
		 option_c varchar(120),
		 option_d varchar(120),
		 answer varchar(120),
		 marks smallint(6)
		)';
?>
<html>
	<head>
		<style>
				body {
				  text-align: center;
				  padding: 40px 0;
				  background: #EBF0F5;
				}
				  h1 {
					color: #88B04B;
					font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
					font-weight: 900;
					font-size: 40px;
					margin-bottom: 10px;
				  }
				  p {
					color: #404F5E;
					font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
					font-size:20px;
					margin: 0;
				  }
				.marks {
				  color: #9ABC66;
				  font-size: 100px;
				  line-height: 200px;
				  margin-left:-15px;
				}
				.wrong {
				  color: red;
				  font-size: 100px;
				  line-height: 200px;
				}
				.card {
				  background: white;
				  padding: 60px;
				  border-radius: 4px;
				  box-shadow: 0 2px 3px #C8D0D8;
				  display: inline-block;
				  margin: 0 auto;
				}
				a {
					text-decoration: none;
					font: medium;
					font-family: Helvetica Neue, Helvetica, Arial, sans-serif;
					letter-spacing: 2px;
					font-weight: 600px;
					text-align: center;
					opacity: 100%;
				}

				a:link {
					color: rgba(0, 0, 0, 0.505);
					background-color: transparent;
					text-decoration: none;
				}

				a:visited {
					color: rgba(0, 0, 0, 0.305);
					background-color: transparent;
					text-decoration: none;
				}

				a:hover {
					color: black;
					background-color: transparent;
					text-decoration: none;
				}
		</style>
	</head>
	<body>

		<?php
			if ($con->query($sql) === FALSE)
			{
				die("Error creating table: " . $con->error);
			}
			$string = "";
			for($j=0; $j<$n; $j++)
			{
				$string .= ", ".$j."_m varchar(4)";
			}
			$sql = 'CREATE TABLE IF NOT EXISTS '.$_SESSION["subject_quiz"].'_result'.'
					(user varchar(120) PRIMARY KEY,
					marks smallint(6),
					time varchar(120)
					'.$string.'
					)';

			if ($con->query($sql) === FALSE)
			{
				die("Error creating table: " . $con->error);
			}
			while($i<$n)
			{
				$a = $_POST["question".$i];
				$b = $_POST["a".$i];
				$c = $_POST["b".$i];
				$d = $_POST["c".$i];
				$e = $_POST["d".$i];
				$f = $_POST["answer".$i];
				$g = $_POST["marks".$i];
				$sql = "INSERT INTO $name_subject(question, option_a, option_b, option_c, option_d, answer, marks)
						VALUES ('$a', '$b', '$c', '$d', '$e', '$f', '$g')";
				if ($con->query($sql) === FALSE)
				{
					die("Error: " . $con->error);
				}
				$t += $_POST["marks".$i];
				$i++;
			}
							$sql = "UPDATE quiz
							SET total = '$t' 
							WHERE name = '$name'";	
				if ($con->query($sql) === FALSE)
				{
					die("Error" . $con->error);
				}
				/*NOTIFICATION*/
				$to = "user_all"; 
				$from = "admin_".$_SESSION["user"];
				$note = "Quiz ".$name." for ".explode("_", $name_subject)[0]." has been scheduled, please check.";
				$con = new mysqli('localhost', 'root', NULL, 'trupendb');
				$date = date('Y-m-d H:i:s');
				$sql = "INSERT INTO notifications(type_to, type_from, note, time)
							VALUES ('$to', '$from', '$note', '$date')";
				if ($con->query($sql) === FALSE)
				{
					die("Error " . $con->error);
				}
				/*NOTIFICATION*/
				echo '<h1>Quiz Successfully created</h1>
				<div class="card">
					<div style="border-radius:200px; height:200px; width:200px; background: #F8FAF5; margin:0 auto;">
						<b class="marks" style="color: transparent;text-shadow: 0 0 0 #9ABC66;">✔️</b>
					</div>
					<h1>Congratulations!</h1> 
					<p> '.$name.' Quiz Created</p>
						<br>
					<a href="../teacher_dashboard/createQ.php" target="_top">Want to Create More Quiz</a>
				</div>
				';
			?>
	</body>
</html>