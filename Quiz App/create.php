<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Create Quiz</title>
</head>
<link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
<style>
            body {
                color: orange;
                background: #f4ffff;
            }
</style>
<body>
<div class="topnav">
                <a class="active gradient-text" href="http://localhost/assperl/loggedin.php"><img src="../Image_Components/truPen Better Logo.png" style="width: 25pt;">
                    <div style="display:inline-block;" class="gradient">truPen</div>
                </a>
                &nbsp;
                <a href="Quiz App/select.php">Quizzes</a>
                <a href="Quiz App/create.php">Create Quiz</a>
                <a href="#contact">Contact</a>
                <a href="#about">About</a>
            </div>
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