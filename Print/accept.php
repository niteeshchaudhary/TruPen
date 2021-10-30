<?php
$user = 'root';
$pass = '';
$con = new mysqli('localhost', $user, $pass, 'trupendb');
$id = $_POST['id'];
$sql = "UPDATE print
		SET status = '2' 
		WHERE location = '$id';";
		$con->query($sql);
$con->query($sql) or die("Error: ". $con->error);
$con->query("ALTER TABLE print AUTO_INCREMENT = 1") or die("Error: ". $con->error);
header('location:pri_dashboard.php');
exit();
?>