<?php
    session_start(); 
    $result = 0;
    if($_POST['username']){
        $user = 'root';
        $pass = ''; 
        $con = new mysqli('localhost', $user, $pass);
        $con = new mysqli('localhost', $user, $pass, 'trupendb');
        if($con->connect_error)
        {
        die("Connection Error: " . $con->connect_error);
        }
        $sql = "SELECT * FROM user where username='".$_POST['username']."';";
        $result = $con->query($sql) or die("Error: ". $con->error);
        if($result->num_rows == 0){
            $result=1;
        }
        else{
            $result=2;
        } 
        $con->close();
    }
    echo $result;
?>