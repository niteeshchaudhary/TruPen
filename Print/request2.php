<?php
session_start();
	$x = $_SESSION["user"];
	$y = date('Y-m-d H-i-s');
	if(isset($_FILES['pdf']))
	{
			$pdfFile = $_FILES['pdf']['name'];
			$tmp_dir = $_FILES['pdf']['tmp_name'];
			$upload_dir = 'pdf/';
			move_uploaded_file($tmp_dir, $upload_dir.$x.$y.".pdf");
	}
		$con = new mysqli('localhost', 'root', NULL, 'trupendb');
		$n = $_POST["copy"];
		$t = $_POST["type"];
		$c = $_POST["comment"];
		$dir = $upload_dir.$x.$y.".pdf";
		$sql = "INSERT INTO print(user, location, copies, type, status, comment)
			VALUES ('$x', '$dir', '$n', '$t', '1', '$c')";
		$con->query($sql);
		echo "Success!!";
?>