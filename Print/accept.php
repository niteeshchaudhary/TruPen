<?php
session_start();
date_default_timezone_set('Asia/Kolkata');
$user = 'root';
$pass = '';
$con = new mysqli('localhost', $user, $pass, 'trupendb');
$id = $_POST['id'];
$name = $con->query("SELECT user FROM print WHERE location = '$id'")->fetch_object()->user;
$p = $con->query("SELECT person FROM print WHERE location = '$id'")->fetch_object()->person;
$cost = $con->query("SELECT cost FROM $p WHERE username = '$name'")->fetch_object()->cost;
$t = $cost + $_POST["cost"];
$sql = "UPDATE $p
		SET cost = '$t' 
		WHERE username = '$name'";
		$con->query($sql);
$con->query($sql) or die("Error: ". $con->error);
$sql = "UPDATE print
		SET status = '2' 
		WHERE location = '$id';";
		$con->query($sql);
$con->query("ALTER TABLE print AUTO_INCREMENT = 1") or die("Error: ". $con->error);
/*NOTIFICATION*/
$to = $p."_".$name; 
$from = "office_".$_SESSION["user"]; /*$_SESSION["user"]*/
$note = "Your Print request has been Accepted!";
$con = new mysqli('localhost', 'root', NULL, 'trupendb');
$date = date('Y-m-d H:i:s');
$sql = "INSERT INTO notifications(type_to, type_from, note, time)
			VALUES ('$to', '$from', '$note', '$date')";
if ($con->query($sql) === FALSE)
{
    die("Error " . $con->error);
}
/*NOTIFICATION*/
header('location:pri_dashboard.php');
exit();
?>