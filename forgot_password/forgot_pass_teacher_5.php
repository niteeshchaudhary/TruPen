<?php 
session_start(); 
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
				i {
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
		if($mysql->query($sql)){
			echo '
				<div class="card">
				<div style="border-radius:200px; height:200px; width:200px; background: #F8FAF5; margin:0 auto;">
				  <i class="checkmark">✓</i>
				</div>
				  <h1>Success</h1> 
				  <p>We have successfully changed your account password.</p>
				  <br>
				  <a href="../tea_login.php">Login</a>
				</div>';
		}
		else{
			echo '
				<div class="card">
				<div style="border-radius:200px; height:200px; width:200px; background: #F8FAF5; margin:0 auto;">
				  <b class="checkmark wrong">&#10060;</b>
				</div>
				  <h1 style="color:red;">Failed</h1> 
				  <p>There was an error while changing your account password.</p>
				  <br>
				  <a href="../tea_login.php">Login</a>
				</div>';
		}
?>
</body>
</html>
 
