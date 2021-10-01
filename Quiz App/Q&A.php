<?php
session_start();
$_SESSION["quiz_name"] = $_POST["name"];
$_SESSION["quetion_no"] = $_POST["no"];
$n = $_POST["no"];
$i = 0;
$con = new mysqli('localhost', 'root', NULL, 'trupendb');
$sql = "INSERT INTO quiz(name, subject, time_limit, no_questions)
			VALUES ('".$_POST["name"]."', '".$_POST["subject"]."', '".$_POST["time"]."', '$n')";
	$con->query($sql);
$sql = 'CREATE TABLE IF NOT EXISTS '.$_POST["name"].'
		(question varchar(800) PRIMARY KEY UNIQUE,
		 option_a varchar(120),
		 option_b varchar(120),
		 option_c varchar(120),
		 option_d varchar(120),
		 answer varchar(120),
		 marks smallint(6)
		)';
if ($con->query($sql) === FALSE)
{
	die("Error creating table: " . $con->error);
}
?>
<form method="POST" action="Add_Q.php" id="quiz">
<?php
 while($i<$n)
{
 ?>
<h2><?php echo 'Question '.($i+1) ?></h2>
<textarea id=<?php echo 'question'.$i ?>" class="text" cols="20" rows ="5" name="<?php echo 'question'.$i ?>" form="quiz"></textarea><br>
Option A<input type="text" name = "<?php echo 'a'.$i ?>" required /><br>
Option B<input type="text" name = "<?php echo 'b'.$i ?>" required /><br>
Option C<input type="text" name = "<?php echo 'c'.$i ?>" required /><br>
Option D<input type="text" name = "<?php echo 'd'.$i ?>" required /><br>
Answer<input type="text" name = "<?php echo 'answer'.$i ?>" required /><br>
Marks<input type="number" name = "<?php echo 'marks'.$i ?>" required /><br>
 <?php
 $i++;
 }
?>
<input type="submit" value="Create">
</form>