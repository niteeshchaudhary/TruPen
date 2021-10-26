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
	header("loction:../teacher_dashboard/createQ.php");
	exit();
?>