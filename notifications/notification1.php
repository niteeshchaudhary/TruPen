<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form action="../notifications/notification2.php" method="POST">
        <h3>To Student or Teacher or Print Office</h3>
        <select name="s_t" required>
		<option value="user">Student</option>
		<option value="teacher">Teacher</option>
        <option value="office">Print Ofiice</option>
		</select>
        <h3>To *(Type "all" to send it to every person in the above category)</h3>
        <input type="text" name="to" required>
        <h3>Note</h3>
        <input type="text" name="note" required></br></br>
        <input type="submit" value="Notify">
    </form>
    <h3 style="color: red">The "Notify" Button works instantly Please Dont Spam ;)"</h3>
</body>
</html>