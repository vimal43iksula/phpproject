<?php
session_start();

?>
<html>
<head>
	</head>
<body>
	<form method="post" action="">
    <a href="first_page.php">Home Page</a><br><br>
		Username: <input type="text" name="user"><br><br>
		Password: <input type="password" name="pass"><br><br>
		<input type="submit" name="submit" value="login">
	</form>

<?php
 
    
   include 'db.php';

  $user = $_POST['user'];
  // Store Session Data
$_SESSION['login_user']= $user;  // Initializing Session with value of PHP Variable
echo $_SESSION['login_user'];
    $password = $_POST['pass'];
  $sql = "SELECT * FROM user11 WHERE cname='$user' AND password='$password'";
  $result = mysqli_query($conn, $sql);

  if ($row = mysqli_fetch_assoc($result)) {
    echo "You are logged in!";
    if($_SESSION['login_user']){
    	header('location:view.php');
    }
  } 
  	else {
    echo "Your username or password is incorrect!";
  }
  

?>
