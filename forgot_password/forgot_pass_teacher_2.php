<?php
session_start();
//echo $_POST["mailid"]."  ";
$user = 'root';
$pass = '';
$con = new mysqli('localhost', $user, $pass, 'trupendb');
$sql = "SELECT * FROM teacher";
$result = $con->query($sql) or die("Error: ". $con->error);
$rs = 0;
while($row = $result->fetch_assoc()) 
{
     if($row["email"] == $_POST["mailid"])
	 {
		 $rand = rand(1000000, 9999999);
		 $_SESSION["otp"] = $rand;
		 $_SESSION["mail"] = $_POST["mailid"];
		 $_SESSION['user'] = $row["username"];
			$subject = "OTP to reset TruPen Login Password";
			$body = "Hello ".$row["username"].", your OTP to reset password is: $rand
			We hope everything goes smoothly.
			Thank you.";
			$headers = "From: ".$_POST["mailid"];
		if (mail($row["email"], $subject, $body, $headers)) 
		{
			//header("location: forgot_pass_teacher_3.php");
			$rs=1;
		} else 
		{
			//	echo "Email sending failed...";
				$rs=2;
		}
	 }
}
if($rs==0){
	//echo "Email Not in database<br>";
}
echo $rs;
?>