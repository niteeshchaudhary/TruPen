<?php
session_start();
$user = 'root';
$pass = '';
$con = new mysqli('localhost', $user, $pass, 'trupendb');
$sql = "select * from ".$_SESSION["quiz_subject"].'_'.$_SESSION["quiz_name"];
$result1 = $con->query($sql);
$sql = "select * from quiz WHERE name = '".$_SESSION["quiz_name"]."'";
$result2 = $con->query($sql);
$user2 = $_SESSION["user"];
$sql = "INSERT INTO ".$_SESSION["quiz_subject"]."_".$_SESSION["quiz_name"]."_result"."(user)
			VALUES('$user2')";
if ($con->query($sql) === FALSE)
{
	die("Error: " . $con->error);
}
$date = date('Y-m-d H:i:s');
$sql = "UPDATE ".$_SESSION["quiz_subject"]."_".$_SESSION["quiz_name"]."_result
				SET time = '$date'
				 WHERE user = '$user2'";
if ($con->query($sql) === FALSE)
{
	die("Error: " . $con->error);
}
$marks = 0;
$x = 0;
while($row = $result1->fetch_assoc())
{
	$temp = $row["answer"].'_'.$x;
	if(isset($_POST["answer".$x]))
	{
		$sql = "UPDATE ".$_SESSION["quiz_subject"]."_".$_SESSION["quiz_name"]."_result
				SET ".$x."_m = '".explode("_", $_POST["answer".$x])[0]."'
				 WHERE user = '$user2'";
		if ($con->query($sql) === FALSE)
		{
			die("Error: " . $con->error);
		}
		if($_POST["answer".$x] == $temp)
		{
			$marks += $row["marks"];
		}
	}
	$x++;
}
$sql = "UPDATE ".$_SESSION["quiz_subject"]."_".$_SESSION["quiz_name"]."_result
				SET marks = $marks
				 WHERE user = '$user2'";
		if ($con->query($sql) === FALSE)
		{
			die("Error: " . $con->error);
		}
header("location:../student_dashboard/dashboard.php");
exit();
?>