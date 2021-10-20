<?php
session_start();
$user = 'root';
$pass = '';
$con = new mysqli('localhost', $user, $pass, 'trupendb');
$sql = "SELECT * FROM user";
$result = $con->query($sql) or die("Error: ". $con->error);
while($row = $result->fetch_assoc()) 
{
     if($row["email"] == $_POST["mailid"])
	 {
		 $rand = rand(1000000, 9999999);
		 $_SESSION["otp"] = $rand;
		 $_SESSION["mail"] = $_POST["mailid"];
		 $_SESSION['user'] = $row["username"];
			$subject = "OTP to reset TruPen Login Password";
			$body = "Hello ".$row["user"].", your OTP to reset password is: $rand
			We hope everything goes smoothly.
			Thank you.";
			$headers = "From: ".$_POST["mailid"];
		if (mail($row["email"], $subject, $body, $headers)) 
		{
			header("location: forgot_pass_stu_3.php");
			exit();
		} else 
		{
				echo "Email sending failed...";
				echo '<form action="forgot_pass_stu_1.php">
					<input type="submit" value="Back">
					</form>';
					exit();
		}
	 }
}
echo "Email Not in database<br>";
echo '<form action="forgot_pass_stu_1.php">
					<input type="submit" value="Back">
					</form>';
					exit();
?>