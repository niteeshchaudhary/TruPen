<!DOCTYPE html>
<html lang="en">
<head>
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
 <th>Accept</th>
 <th>Reject</th>
 </tr>
<?php
$con = new mysqli('localhost', 'root', NULL, 'trupendb');
$sql = "SELECT * FROM print WHERE status LIKE '1'";
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
 <td><a href="accept.php?id=<?php echo $row['location']; ?>">Accept</a></td>
 <td><a href="reject.php?id=<?php echo $row['location']; ?>">Reject</a></td>
 </tr>
 <?php
 }
}
?>
</table>
<iframe id="myFrame" style="display:none" width="1000" height="700"></iframe>
<form action="../loggedin.php">
<input type="submit" value="Back">
</form>
</body>
</html>