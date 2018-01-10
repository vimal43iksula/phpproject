<?php
include 'db.php';
$id = $_GET['id'];
$select = "SELECT * FROM user WHERE id=".$id;
$query = mysqli_query($conn, $select);
$result= mysqli_fetch_array($query);
?>
<html>
<head>
	</head>
<body>
	<form method="post" action="">
		<a href="view.php">Back</a><br><br>
    <a href="first_page.php">Home Page</a><br><br>
		Username: <input type="text" name="user" value="<?php echo $result['cname'];?>"><br><br>
		Email: <input type="text" name="email" value="<?php echo $result['email'];?>"><br><br>
		Password: <input type="password" name="pass" value="<?php echo $result['password'];?>"><br><br>
		Mobile: <input type="tel" name="mobile" value="<?php echo $result['mobile'];?>"><br><br>
		Address: <input type="text" name="add" value="<?php echo $result['address'];?>"><br><br>
		Pin Code :<input type="number" name="pin" value="<?php echo $result['pin'];?>"><br><br>
		<input type="submit" name="submit" value="Update">
	</form>

<?php 

      

   $cname = isset($_POST['user']) ? $_POST['user'] : "";
   $email = isset($_POST['email']) ? $_POST['email'] : "";
   $password = isset($_POST['pass']) ? $_POST['pass'] : "";
   $mobile = isset($_POST['mobile']) ? $_POST['mobile'] : "";
   $address = isset($_POST['add']) ? $_POST['add'] : "";
   $pin = isset($_POST['pin']) ? $_POST['pin'] : "";
 
 $sql = "UPDATE user SET cname='$cname', email='$email', password='$password', mobile='$mobile', address='$address', pin='$pin' WHERE id=$id";

     $query = mysqli_query($conn,$sql);
      
          

?>
   

</body>
</html>

