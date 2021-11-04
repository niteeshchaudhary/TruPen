<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>
    <form action="notification2.php" method="POST">
        <input type="hidden" name="from" value="user">
        <h3>To Student or Teacher</h3>
        <select name="s_t" required>
		<option value="user">Student</option>
		<option value="admin">Teacher</option>
        <option value="office">Print Ofiice</option>
		</select>
        <h3>To</h3>
        <input type="text" name="to" required>
        <h3>Note</h3>
        <input type="text" name="note" required>
        <input type="submit" value="Notify">
    </form>
</body>
</html>