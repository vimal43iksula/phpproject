<?php
include 'db.php';
$select = "SELECT * FROM user";
$query = mysqli_query($conn,$select); 
?>
<html>
<head>
  </head>
<body>
 <a href="login.php">Login Page</a>
  <table>
    <thead>
    <tr>
        <th>ID</th>
        <th>Username</th>
        <th>Email</th>
        <th>Password</th>
        <th>Mobile</th>
        <th>Address</th>
        <th>Pin</th>
      </thead>

    <tbody>
      <tr>
        <?php
          while ($result = mysqli_fetch_array($query)) {
            ?>                      
                      <td><?php echo $result['id'];?></td>
                      <td><?php echo $result['cname'];?></td>
                      <td><?php echo $result['email'];?></td>
                      <td><?php echo $result['password'];?></td>
                      <td><?php echo $result['mobile'];?></td>
                      <td><?php echo $result['address'];?></td>
                      <td><?php echo $result['pin'];?></td>
                      
      </tr>
      <?php } ?>
    </tbody>
  </table>