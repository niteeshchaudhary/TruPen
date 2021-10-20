<?php
session_start();
?>
<html>
	<head>
		<style>
			.btn{
				padding:5px;
				width:100%;
				height: 50px;
				color:white;
				font-size: 24px;
				background-color: rgba(100,20,240,0.7);
			}
			.btn:hover{
				padding:5px;
				width:100%;
				height: 50px;
				color:white;
				font-size: 24px;
				background-color: rgba(100,200,20,0.7);
			}
			.btn:active{
				padding:5px;
				width:100%;
				height: 50px;
				color:white;
				font-size: 24px;
				background-color: rgba(0,0,255,0.7);
			}
		</style>
	</head>
	<body>
		<dl>
			<dt> <button href="student_profile" class="btn">Profile</button></dt><br>
			<dt> <button href="" class="btn">Change Password</button></dt><br>
			<dt> <button href="logoff.php" class="btn">Logout</button></dt><br>
		</dl>
	</body>
<html>