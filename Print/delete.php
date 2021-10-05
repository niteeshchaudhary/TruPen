<?php
$user = 'root';
$pass = '';
$con = new mysqli('localhost', $user, $pass, 'trupendb');
$id = $_GET['id'];
$sql = "DELETE FROM print WHERE location='$id'";
		$con->query($sql);
$con->query($sql) or die("Error: ". $con->error);
$con->query("ALTER TABLE print AUTO_INCREMENT = 1") or die("Error: ". $con->error);
unlink($id);
header('location:my_request.php');
exit();
?>