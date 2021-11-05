<?php
session_start();
	$x = $_SESSION["user"];
	$p = $_SESSION["table"];
	$y = date('Y-m-d H-i-s');
	if(isset($_FILES['pdf']))
	{
			$pdfFile = $_FILES['pdf']['name'];
			$tmp_dir = $_FILES['pdf']['tmp_name'];
			$upload_dir = 'pdf/';
			$fin = $upload_dir.$p."#".$x."#".$y.".pdf";
			move_uploaded_file($tmp_dir, $fin);
	}
		$con = new mysqli('localhost', 'root', NULL, 'trupendb');
		$n = $_POST["copy"];
		$t = $_POST["type"];
		$c = $_POST["comment"];
		$sql = "INSERT INTO print(user, person, location, copies, type, status, comment)
			VALUES ('$x', '$p', '$fin', '$n', '$t', '1', '$c')";
		$con->query($sql);
		/*NOTIFICATION*/
		$to = "office_all"; 
		$from = $_SESSION["table"]."_".$_SESSION["user"]; /*$_SESSION["user"]*/
		$note = "New print request from ".$_SESSION["user"];
		$con = new mysqli('localhost', 'root', NULL, 'trupendb');
		$date = date('Y-m-d H:i:s');
		$sql = "INSERT INTO notifications(type_to, type_from, note, time)
					VALUES ('$to', '$from', '$note', '$date')";
		if ($con->query($sql) === FALSE)
		{
			die("Error " . $con->error);
		}
		/*NOTIFICATION*/
		echo "Success!!";
?>