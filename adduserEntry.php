<html>
<head>
    <title>
        User Login Page
    </title>
    <link rel = "icon" href ="Image_Components/truPen Better Logo.png"  type = "image/x-icon">
    <link rel="stylesheet" href="globalstyles.css?v=<?php echo time(); ?>">
</head>     
<style> 
.loader {
    border: 8px solid #f3f3f3;
    border-top: 8px solid cyan;
    border-radius: 50%;
    width: 20px;
    height: 20px;
    animation-name: turn;
    animation-duration: 1s;
    animation-iteration-count: infinite;
}

@keyframes turn {
    0% {
        transform: rotate(0deg);
    }
    100% {
        transform: rotate(360deg);
    }
}

body {
    background: linear-gradient(-45deg, #ee7752, #e73c7e, #23a6d5, #23d5ab);
    background-size: 400% 400%;
    animation: gradient 10s ease infinite;
}

@keyframes gradient {
    0% {
        background-position: 0% 50%;
    }
    50% {
        background-position: 100% 50%;
    }
    100% {
        background-position: 0% 50%;
    }
}
</style> 
<body translate="no" style="color:purple;font: weight 1000px;">

<font style="font-size: xx-large"> <center>Welcome !</center>
</font>
<br>

<?php
session_start();
$mysql = new mysqli("localhost","root",NULL, "trupendb");

if ($mysql -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysql -> connect_error;
  exit();
}

$user_id= $_POST["LoginID"];
$password = $_POST["password"];
echo "<br><br><br>";
?>

<br>
<div style="margin-top: 20pt; font-size:x-large" align="center">

<?php 
$x=0;
if($user_id && $password){
    $command = "INSERT INTO user(username,passcode,cost) VALUES('$user_id','$password', '0')";
    if ($mysql -> query($command)){
        $_SESSION["table"] = "user";
        global $x;
        $x=1;
    }
    else{
        $error="Could not add new user to database";
    }
}
else{
    $error ="Null value detected for username or password";
}

mysqli_close($mysql);
?>

<?php
if($x==1){
	$_SESSION["user"] = $user_id;
	$filePath = 'Image_Components/default.jpg';
	$destinationFilePath = 'profile_pic/student/'.$user_id.'.jpg';
	copy($filePath, $destinationFilePath);
    echo '
    <audio id="sound" autoplay>
    <source src="Sound_FX\Login Sound Effect (No copyright sound effects) Sounds.mp3">
    </audio> 
    You Have Successfully Signed-Up '; 
}
else{
    echo '
    <audio id="sound" autoplay>
    <source src="Sound_FX\Error.mp3">
    </audio> 
    ERROR : Sign-Up failed :'.$error; 
}
?>
<br>
</div>
<br>
<br>
<br>
<div align="center" style="color:red;">
    Redirecting</br>
</div>
<div align="center" id="print">
</div>    

<?php
header( "refresh:3 ; url = student_dashboard/student_profile.php" );
?>

<script>
    x = document.getElementById("print");
    x.innerHTML = "<div class='loader'></div> ";
</script>    
</body>
</html>
