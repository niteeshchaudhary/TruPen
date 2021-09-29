<html>
<head>
    <title>
        User Login Page
    </title>
    <link rel="stylesheet" href="globalstyles.css">  
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

</style> 
<body class="bgstyle">

<font style="font-size: xx-large"> <center>Welcome !</center>
</font>
<br>

<?php
$mysql = new mysqli("localhost","root",NULL);

if ($mysql -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysql -> connect_error;
  exit();
}

$user_id= $_POST["LoginID"];
$password = $_POST["password"];

$database ="CREATE database users";
$mysql->query($database);
$mysql->query("USE users");

$table="CREATE TABLE user(
    username varchar(120) NULL, 
    passcode varchar(50)  NULL )";

$mysql->query($table);

echo "<br><br><br>";
?>

<br>
<div style="margin-top: 20pt; font-size:x-large" align="center">

<?php 
if($user_id && $password){
    $command = "INSERT INTO user(username,passcode) VALUES('$user_id','$password')";
    if ($mysql -> query($command)){
    echo '
    <audio id="sound" autoplay>
    <source src="Login Sound Effect (No copyright sound effects) Sounds.mp3">
    </audio> 
    You Have Successfully Signed Up '; 
    }
    else {
        echo '
    <audio id="sound" autoplay>
    <source src="Error.mp3">
    </audio> 
    ERROR : Sign-Up failed.'. mysqli_error($mysql); 
    }
}
else{
    echo '
    <audio id="sound" autoplay>
    <source src="Error.mp3">
    </audio> 
    ERROR : Sign-Up failed.'; 
}
mysqli_close($mysql);
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
header( "refresh:5 ; url = index.php" );
?>

<script>
    x = document.getElementById("print");
    x.innerHTML = "<div class='loader'></div> ";
</script>    
</body>
</html>
