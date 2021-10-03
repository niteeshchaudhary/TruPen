<!DOCTYPE html>
<html lang="en">
<body>
<?php
session_start();
?>
<h1>Create Quiz</h1>
<form align = "center" action="QnA.php" method="post">
Name: <input type="text" name="name" required /><br>
Subject: <input type="text" name="subject" required /><br>
No of Questions: <input type="number" name="no" required /><br>
Time limit: <input type="number" name="time" required /><br>
<input type="submit" value="Submit">
</form>
</body>
</html>