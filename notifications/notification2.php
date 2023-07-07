<?php
session_start();

date_default_timezone_set('Asia/Kolkata');
$to = $_POST["s_t"]."_".$_POST["to"];
$from = $_SESSION["table"]."_".$_SESSION["user"];
$note = $_POST["note"];
$con = new mysqli('localhost', 'root', NULL, 'trupendb');
$date = date('Y-m-d H:i:s');
$sql = "INSERT INTO notifications(type_to, type_from, note, time)
			VALUES ('$to', '$from', '$note', '$date')";
if ($con->query($sql) === FALSE)
{
    die("Error " . $con->error);
}
echo '<script>window.parent.location.reload();con</script>';


exit();
?>