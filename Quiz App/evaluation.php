<?php
session_start();
$user = 'root';
$pass = '';
$con = new mysqli('localhost', $user, $pass, 'trupendb');
$sql = "select * from ".$_SESSION["quiz_subject"].'_'.$_SESSION["quiz_name"];
$result1 = $con->query($sql);
$sql = "select * from quiz WHERE name = '".$_SESSION["quiz_name"]."'";
$result2 = $con->query($sql);
$marks = 0;
$x = 0;
$user2 = $_SESSION["user"];
while($row = $result1->fetch_assoc())
{
	$temp = $row["answer"].'_'.$x;
	if($_POST["answer".$x] == $temp)
	{
		$marks += $row["marks"];
	}
	$x++;
}
while($row = $result2->fetch_assoc())
{
	echo "You obtained $marks out of ".$row["total"]." marks.";
}
$sql = "INSERT INTO ".$_SESSION["quiz_subject"]."_".$_SESSION["quiz_name"]."_result"."(user, marks)
			VALUES('$user2', $marks)";
if ($con->query($sql) === FALSE)
{
	die("Error: " . $con->error);
}
?>
<form action="../loggedin.php">
<input type = "submit" value="Back">
</form>