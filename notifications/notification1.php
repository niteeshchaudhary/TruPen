<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>
    <form action="notification2.php" method="POST">
        <h3>To Student or Teacher or Print Office</h3>
        <select name="s_t" required>
		<option value="user">Student</option>
		<option value="admin">Teacher</option>
        <option value="office">Print Ofiice</option>
		</select>
        <h3>To *(Type "all" to send it to every person in the above category)</h3>
        <input type="text" name="to" required>
        <h3>Note</h3>
        <input type="text" name="note" required>
        <input type="submit" value="Notify">
    </form>
</body>
</html>