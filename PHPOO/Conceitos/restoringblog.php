<?php
$mysqli = new mysqli("localhost", "username", "password", "test");
if (mysqli_connect_errno()) {
	echo("Failed to connect, the error message is : ".
	mysqli_connect_error());
	exit();
}

$stmt = $mysqli->prepare("select image from images where id=?");
$stmt->bind_param("i",$id);
$id = $_GET['id'];
$stmt->execute();
$image=NULL;
$stmt->bind_result($image);
$stmt->fetch();
header("Content-type: image/jpeg");
echo $image;
?>
