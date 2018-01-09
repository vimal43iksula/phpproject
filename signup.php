
<html>
<head>
	</head>
<body>
	<form method="post" action="#">
		<a href="first_page.php">Home Page</a><br><br>
		Username: <input type="text" name="user"><br><br>
		Email: <input type="text" name="email"><br><br>
		Password: <input type="password" name="pass"><br><br>
		Mobile: <input type="tel" name="mobile"><br><br>
		Address: <input type="text" name="add"><br><br>
		Pin Code :<input type="number" name="pin"><br><br>
		<input type="submit" name="submit" value="signup">
	</form>


<?php
   include 'db.php';

 
   if(!empty($_POST)){

   $cname = isset($_POST['user']) ? $_POST['user'] : "";
   $usrname  = filter_var($cname, FILTER_SANITIZE_STRING);
	echo $usrname;
	

   $email = isset($_POST['email']) ? $_POST['email'] : "";
   	$newemail = filter_var($email, FILTER_SANITIZE_EMAIL);
if (!filter_var($newemail, FILTER_VALIDATE_EMAIL) === false) {
    echo("$newemail is a valid email address");
    echo "<br>";
} else {
    echo("$newemail is not a valid email address");
    echo "<br>";
}


   $password = isset($_POST['pass']) ? $_POST['pass'] : "";
   $mobile = isset($_POST['mobile']) ? $_POST['mobile'] : "";
   $address = isset($_POST['add']) ? $_POST['add'] : "";
   $pin = isset($_POST['pin']) ? $_POST['pin'] : "";

        
   $sql = "INSERT INTO user(cname,email,password,mobile,address,pin)
VALUES('$usrname','$newemail','$password','$mobile','$address','$pin')";

if(mysqli_query($conn, $sql)) {
    
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
}


	
?>
</body>
</html>

