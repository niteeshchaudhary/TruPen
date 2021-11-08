<?php
session_start();
	$x = $_SESSION["user"];
	$upload_dir = 'profile_pic/student/';
	$coverpic = $x;
	if(isset($_FILES['image'])){
		$x = $_SESSION["user"];
			$imgFile = $_FILES['image']['name'];
			$tmp_dir = $_FILES['image']['tmp_name'];
			$imgSize = $_FILES['image']['size'];
			$coverpic = $coverpic."."."jpg";
			move_uploaded_file($tmp_dir,$upload_dir.$coverpic);
	}
		$con = new mysqli('localhost', 'root', NULL, 'trupendb');
		$sql = "UPDATE user
				SET firstname = '".$_POST["fname"]."', 
				lastname= '".$_POST["lname"]."', 
				email='".$_POST["email"]."', 
				gender='".$_POST["gender"]."', 
				birthday='".$_POST["dob"]."', 
				bio='".$_POST["bio"]."',
				img_dir='"."../".$upload_dir.$coverpic."'
				WHERE username = '$x';";
		if($con->query($sql)){
			echo "Success!!";
		}
		else{
			echo $mysql->error_log;
		}
		/*exit();*/
?>