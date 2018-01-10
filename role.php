<?php
session_start(); $user = $_SESSION['login_user'];
include 'db.php';

if($role = "SELECT * FROM user WHERE cname='$user'")
{
$query = mysqli_query($conn,$role);
 

if (mysqli_num_rows($query) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($query)) {
        if($row['Role'] == 1){
        header('location:view.php');
        	
        }else{
        	echo "string";
        }

    }
} else {
    echo "0 results";
}
     
}

else { 
	echo "FAIL";




}
?>
