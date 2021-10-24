<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Quizzes</title>
</head>
<link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
<style>
	body
	{
		color:orange;
        background: #f4ffff;
        font-family: 'Poppins', sans-serif;
	}
	table, th, td 
	{
		border: 1px solid black;
	}
</style>
<body>
        <div class="topnav">
                <a class="active gradient-text" href="../loggedin.php"><img src="../Image_Components/truPen Better Logo.png" style="width: 25pt;">
                    <div style="display:inline-block;" class="gradient">truPen</div>
                </a>
                &nbsp;
                <a href="select.php">Quizzes</a>
                <a href="create.php">Create Quiz</a>
                <a href="#contact">Contact</a>
                <a href="#about">About</a>
            </div>
        <div id="mySidenav" class="sidenav">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <a href="#">About</a>
            <a href="#">Services</a>
            <a href="#">Clients</a>
            <a href="#">Contact</a>
        </div>
	<h1>SELECT QUIZ</h1>
	<?php
	$user = 'root';
$pass = '';
$con = new mysqli('localhost', $user, $pass, 'trupendb');
$sql = "SELECT * FROM quiz";
$result = $con->query($sql) or die("Error: ". $con->error);
?>
<table>
<tr>
 <th>Name</th>
 <th>Subject</th>
 <th>Time Limit</th>
 <th>Quetions</th>
 <th>Marks</th>
 </tr>
<?php
if($result->num_rows > 0)
{
 while($row = $result->fetch_assoc())
 {
	 $sql = "SELECT * FROM ".$row['subject']."_".$row['name']."_result"." WHERE user like '".$_SESSION["user"]."'";
	$result2 = $con->query($sql) or die("Error: ". $con->error);
	if($result2->num_rows > 0)
	{
		continue;
	}
 ?>
 <tr>

 <td><a href="<?php echo 'quiz.php?quiz_name='.$row['name'].'&quiz_subject='.$row['subject'].'&time='.$row['time_limit']; ?>"><?php echo $row['name']; ?></a></td>
 <td><?php echo $row['subject']; ?></td>
 <td><?php echo $row['time_limit']; ?></td>
 <?php $_SESSION["TIME_LIMIT"]=$row['time_limit'];?>
 <td><?php echo $row['no_questions']; ?></td>
 <td><?php echo $row['total']; ?></td>
 </tr>
 <?php
 }
}
?>
<h1>Not-Attempted</h1>
<table>
<tr>
 <th>Name</th>
 <th>Subject</th>
 <th>Marks Obtained</th>
 <th>Total Marks</th>
 <th>Time Taken</th>
 </tr>
<?php
$sql = "SELECT * FROM quiz";
$result = $con->query($sql) or die("Error: ". $con->error);
if($result->num_rows > 0)
{
 while($row = $result->fetch_assoc())
 {
	 $sql = "SELECT * FROM ".$row['subject']."_".$row['name']."_result"." WHERE user like '".$_SESSION["user"]."'";
	$result2 = $con->query($sql) or die("Error: ". $con->error);
	if($result2->num_rows > 0)
	{
		while($row2 = $result2->fetch_assoc()){
?>
	<tr>
	<td><?php echo $row['name']; ?></td>
	<td><?php echo $row['subject']; ?></td>
	<td><?php echo $row2['marks']; ?></td>
	<td><?php echo $row['total']; ?></td>
	<td><?php echo $row2['time']; ?></td>
	</tr>
 <?php
		}}
 }
}
?>
<h1>Attempted</h1>
</body>
</html>