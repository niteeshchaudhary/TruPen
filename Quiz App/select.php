<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>
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
 ?>
 <tr>

 <td><a href="<?php echo 'qz.php?quiz_choosed='.$row['name']; ?>"><?php echo $row['name']; ?></a></td>
 <td><?php echo $row['subject']; ?></td>
 <td><?php echo $row['time_limit']; ?></td>
 <td><?php echo $row['no_questions']; ?></td>
 <td><?php echo $row['total']; ?></td>
 </tr>
 <?php
 }
}
?>
</body>
</html>