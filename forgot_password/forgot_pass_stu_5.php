<?php 
session_start(); 
?>
<!DOCTYPE html>
<html lang="en" >
<head>
</head>
<body>
<?php
$new = $_POST['new_pass'];
$user = $_SESSION['user'];
$mysql = new mysqli("localhost","root",NULL, "trupendb");
if ($mysql -> connect_errno) 
{
  echo "Failed to connect to MySQL: " . $mysql -> connect_error;
  exit();
}
$sql = "UPDATE user
			SET passcode = '$new'
			WHERE username = '$user'";
		$mysql->query($sql);
			echo "Success!!<br>";
		echo '<a href="../stu_login.php">Login</a>';
?>
</body>
</html>
 
