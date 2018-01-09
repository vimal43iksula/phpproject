<?php
include 'db.php';
$id = $_GET['id'];
$delete = "DELETE FROM user WHERE id=".$id;

$query = mysqli_query($conn,$delete);
header('location:view.php');
?>