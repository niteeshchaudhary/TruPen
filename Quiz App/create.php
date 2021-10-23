<?php
session_start();
date_default_timezone_set('Asia/Kolkata');
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
                <a class="active gradient-text" href="../loggedin.php"><img src="../Image_Components/truPen Better Logo.png" style="width: 25pt;">
                    <div style="display:inline-block;" class="gradient">truPen</div>
                </a>
                &nbsp;
                <a href="select.php">Quizzes</a>
                <a href="create.php">Create Quiz</a>
                <a href="#contact">Contact</a>
                <a href="#about">About</a>
            </div>
<h1>Create Quiz</h1>
<form align = "center" action="QnA.php" method="post">
Name: <input type="text" name="name" required /><br>
Subject: <input type="text" name="subject" value="<?php echo $_SESSION["subject"]; ?>" disabled /><br>
No of Questions: <input type="number" name="no" required /><br>
Time limit: <input type="datetime-local" name="time" min="<?php echo date('Y-m-d').'T'.date('H:i:s'); ?>" step="any" required /><br>
Time limit(min): <input type="number" name="duration" required /><br>
<input type="submit" value="Submit">
</form>
</body>
</html>