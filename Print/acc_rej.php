<!DOCTYPE html>
<html lang="en">
<head>
<link rel = "icon" href ="../Image_Components/truPen Better Logo.png"  type = "image/x-icon">
<style>
table, th, td {
  border: 1px solid black;
}
</style>
<script type="text/javascript">
function openPdf(s)
{
var omyFrame = document.getElementById("myFrame");
omyFrame.style.display="block";
omyFrame.src = s;
}
</script>
</head>
<body>
<h1>Pending Requests</h1>
<h3 style="color: red;">Please "Accept only after printing is successful!"</h3>
<table>
<tr>
 <th>User</th>
 <th>File</th>
 <th>Copies</th>
 <th>Type</th>
 <th>Comment</th>
 <th>Cost</th>
 <th>Accept</th>
 <th>Reason for Rejection</th>
 <th>Reject</th>
 </tr>
<?php
$con = new mysqli('localhost', 'root', NULL, 'trupendb');
$sql = "SELECT * FROM print WHERE status = '1'";
$result = $con->query($sql) or die("Error: ". $con->error);
if($result->num_rows > 0)
{
 while($row = $result->fetch_assoc())
 {
 ?>
 <tr>
 <td><?php echo $row['user']; ?></td>
 <td><input type="button" value="Preview/Print" onclick = "openPdf('<?php echo $row['location']; ?>')" /></td>
 <td><?php echo $row['copies']; ?></td>
 <td><?php echo $row['type']; ?></td>
 <td><?php echo $row['comment']; ?></td>
 <form method="POST" action="accept.php" id="accept">
	<input type="hidden" name="id" value="<?php echo $row['location']; ?>">
	<td><input type="number" min="1" name="cost" required><td>
 </form>
 <td><input type="button" onclick="begQ('accept')">Accept</td>
 <form method="POST" action="reject.php" id="reject">
	<input type="hidden" name="id" value="<?php echo $row['location']; ?>">
	<td><input type="text" name="reason" value="<?php echo $row['location']; ?>" required><td>
 </form>
 <td><input type="button" onclick="begQ('reject')">Reject</td>
 </tr>
 <?php
 }
}
?>
</table>
<iframe id="myFrame" style="display:none" width="1000" height="700"></iframe>
</body>
<script>
function begQ(data){
				document.getElementById(data).submit();
			}
</script>
</html>