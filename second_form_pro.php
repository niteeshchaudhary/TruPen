<?php
session_start();
		$x = "user";
			$imgFile = $_FILES['image']['name'];
			$tmp_dir = $_FILES['image']['tmp_name'];
			$imgSize = $_FILES['image']['size'];
			$imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION));
			if($imgExt!="jpg")
			{
				$filePath = 'avatar.jpg';
				$destinationFilePath = 'profile_pic/'.$x.'.jpg';
				copy($filePath, $destinationFilePath);
				exit();
			}
			else
			{
				$upload_dir = 'profile_pic/';
				$coverpic = $x.".".$imgExt;
				move_uploaded_file($tmp_dir,$upload_dir.$coverpic);
			}
		$con = new mysqli('localhost', 'root', NULL, 'users');
		$sql = "UPDATE user
				SET firstname = '".$_POST["fname"]."', 
				lastname= '".$_POST["lname"]."', 
				email='".$_POST["email"]."', 
				gender='".$_POST["gender"]."', 
				birthday='".$_POST["dob"]."', 
				bio='".$_POST["bio"]."'
				WHERE username = '$x';";
		$con->query($sql);
		echo "Success!!";
		exit();
?>