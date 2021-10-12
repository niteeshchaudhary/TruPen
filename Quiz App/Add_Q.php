<?php
session_start();
$name_subject = $_SESSION["subject_quiz"];
$name = $_SESSION["quiz_name"];
$n = $_SESSION["quetion_no"];
$i = 0;
$t = 0;
$con = new mysqli('localhost', 'root', NULL, 'trupendb');
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
?>
<form action="../loggedin.php">
<input type = "submit" value="Back">
</form>