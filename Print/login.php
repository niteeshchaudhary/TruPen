<?php
session_start();
?>
<html>
<head>
    <title>
        User Login Page
    </title>
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

$x = 0;

$_SESSION['user'] = $_POST["LoginID"];
$_SESSION['password'] = $_POST["password"];

$mysql = new mysqli("localhost","root",NULL,"trupendb");
if ($mysql -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysql -> connect_error;
  exit();
}

$user_id= $_POST["LoginID"];
$password = $_POST["password"];


    if($user_id)
    {
      $command = "SELECT username,passcode FROM office WHERE username LIKE '$user_id'";
      $data = $mysql -> query($command);
      while($row = $data->fetch_assoc())
      {
        $userdata = $row["username"];
        $passworddata = $row["passcode"]; 
        if($userdata === $user_id && $passworddata === $password){
            global $x;
            $x = 1;
        }
      }
    }
    else{
      echo"Error : Username and Password not matched .";
    }
?>

<br>
<div style="margin-top: 20pt; font-size:x-large" align="center">

<?php
if($x==1){
    echo '
    <audio id="sound" autoplay>
    <source src="Sound_FX\Login Sound Effect (No copyright sound effects) Sounds.mp3">
    </audio> 
    You Have Successfully Logged In '; 
}
else{
    echo '
    <audio id="sound" autoplay>
    <source src="Sound_FX\Error.mp3">
    </audio> 
    ERROR : Login Credentials not matched.'; 
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
if($x===1){
    header( "refresh:2 ; url = pri_dashboard.php" );
}
else{
    // remove all session variables
session_unset();

// destroy the session
session_destroy();

    header( "refresh:2 ; url = pri_login.php" );
}
?>

<script>
    x = document.getElementById("print");
    x.innerHTML = "<div class='loader'></div> ";
</script>    

</body>
</html>
