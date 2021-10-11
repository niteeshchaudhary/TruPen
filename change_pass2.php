<?php 
session_start(); 
?>
<!DOCTYPE html>
<html lang="en" >
<head>
</head>
<body>
<?php
$curr = $_POST['pass'];
$new = $_POST['new_pass'];
$user = $_SESSION['user'];
$x = 0;
$mysql = new mysqli("localhost","root",NULL, "trupendb");
if ($mysql -> connect_errno) 
{
  echo "Failed to connect to MySQL: " . $mysql -> connect_error;
  exit();
}
$command = "SELECT username,passcode FROM user WHERE username LIKE '$user'";
$data = $mysql -> query($command);
while($row = $data->fetch_assoc())
      {
        $userdata = $row["username"];
        $passworddata = $row["passcode"]; 
        if($userdata === $user && $passworddata != $curr)
		{
            $x = 1;
        }
      }
if($x==1)
{
	echo "Old password does not match!";
	echo '<a href="change_pass.php">Back</a>';
}
elseif($new == $curr)
{
	echo "New password same as old password!!";
	echo '<a href="change_pass.php">Back</a>';
}
else{
$sql = "UPDATE user
			SET passcode = '$new'
			WHERE username = '$user';";
		$mysql->query($sql);
			echo "Success!!";
		echo '<a href="index.php">Login</a>';
}
?>
</body>
</html>
 
