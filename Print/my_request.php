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
<table>
<tr>
 <th>File</th>
 <th>Copies</th>
 <th>Type</th>
 <th>Comment</th>
 <th>Delete</th>
 </tr>
<?php
session_start();
$user = $_SESSION["user"];
$con = new mysqli('localhost', 'root', NULL, 'trupendb');
$sql = "SELECT * FROM print WHERE status LIKE '1' AND user LIKE '$user'";
$result = $con->query($sql) or die("Error: ". $con->error);
if($result->num_rows > 0)
{
 while($row = $result->fetch_assoc())
 {
 ?>
 <tr>
 <td><input type="button" value="Preview" onclick = "openPdf('<?php echo $row['location']; ?>')" /></td>
 <td><?php echo $row['copies']; ?></td>
 <td><?php echo $row['type']; ?></td>
 <td><?php echo $row['comment']; ?></td>
 <td><a href="delete.php?id=<?php echo $row['location']; ?>">Delete</a></td>
 </tr>
 <?php
 }
}
?>
</table><br>
<h1>Accepted Requests</h1>
<table>
<tr>
 <th>File</th>
 <th>Copies</th>
 <th>Type</th>
 <th>Comment</th>
 </tr>
<?php
$sql = "SELECT * FROM print WHERE status LIKE '2' AND user LIKE '$user'";
$result = $con->query($sql) or die("Error: ". $con->error);
if($result->num_rows > 0)
{
 while($row = $result->fetch_assoc())
 {
 ?>
 <tr>
 <td><input type="button" value="Preview" onclick = "openPdf('<?php echo $row['location']; ?>')" /></td>
 <td><?php echo $row['copies']; ?></td>
 <td><?php echo $row['type']; ?></td>
 <td><?php echo $row['comment']; ?></td>
 </tr>
 <?php
 }
}
?>
</table><br>
<h1>Rejected Requests</h1>
<table>
<tr>
 <th>File</th>
 <th>Copies</th>
 <th>Type</th>
 <th>Comment</th>
 </tr>
<?php
$sql = "SELECT * FROM print WHERE status LIKE '0' AND user LIKE '$user'";
$result = $con->query($sql) or die("Error: ". $con->error);
if($result->num_rows > 0)
{
 while($row = $result->fetch_assoc())
 {
 ?>
 <tr>
 <td><input type="button" value="Preview" onclick = "openPdf('<?php echo $row['location']; ?>')" /></td>
 <td><?php echo $row['copies']; ?></td>
 <td><?php echo $row['type']; ?></td>
 <td><?php echo $row['comment']; ?></td>
 </tr>
 <?php
 }
}
?>
</table><br>
<h1>Preview</h1>
<iframe id="myFrame" style="display:none" width="1000" height="700"></iframe>
</body>
<form action="../loggedin.php">
<input type="submit" value="Back">
</form>
</html>