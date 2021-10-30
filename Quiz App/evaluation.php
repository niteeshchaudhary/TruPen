<?php
session_start();
date_default_timezone_set('Asia/Kolkata');
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
				SET ".$x."_m = '".explode("_", $_POST["answer".$x])[0]."_".$row["answer"]."'
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
?>
<html>
<head>
	<link href="https://fonts.googleapis.com/css?family=Nunito+Sans:400,400i,700,900&display=swap" rel="stylesheet">
</head>
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
<body>
<div class="card">
	<div style="border-radius:200px; height:200px; width:200px; background: #F8FAF5; margin:0 auto;">
		<b class="marks"><?php echo $marks?>/<?php echo $x;?></b>
	</div>
	<h1>Congratulations!</h1> 
	<p>You have scored <?php echo $marks?> out of <?php echo $x;?></p>
	<br>
	<a href="../student_dashboard/dashboard.php">Exit</a>
</div>
</body>
</html>