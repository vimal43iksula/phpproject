
<?php
include 'db.php';
$id = $_GET['id'];
$select = "SELECT * FROM user WHERE id=".$id;
$query = mysqli_query($conn, $select);
$result= mysqli_fetch_array($query);
  

$sql = "UPDATE user SET Role='1' WHERE id=".$id;


if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}
?>
                           
    