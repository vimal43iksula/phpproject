
<?php
session_start();
?>
<html>
    <head>
    </head>
    <a href="login.php">Login Page</a><br><br>
    <a href="first_page.php">Home Page</a><br><br>
    <form method="get" action=""> 
        <input name="phone" type ="text" id="text"><br><br>
        <button name="search">Search</button><br><br>
    </form>
    <?php
    print_r($_GET['phone']);
    if(isset($_GET['phone']) && is_numeric($_GET['phone'])){
        
    }
    if ($select = "SELECT * FROM user WHERE cname='$user'") {
        $query = mysqli_query($conn, $select);
        while ($result = mysqli_fetch_array($query)) {
            ?>  
            <tr>
                <td><?php echo $result['id']; ?></td>
                <td><?php echo $result['cname']; ?></td>
                <td><?php echo $result['email']; ?></td>
                <td><?php echo $result['password']; ?></td>
                <td><?php echo $result['mobile']; ?></td>
                <td><?php echo $result['address']; ?></td>
                <td><?php echo $result['pin']; ?></td>
                <td><a href="edit.php?id=<?php echo $result['id']; ?>">Edit</a></td>


            </tr>

            <?php
        }
    }
    ?>

    <table cellspacing="20">
        <thead>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th> Email </th>
                <th> Password </th>
                <th> Mobile </th>
                <th> Address </th>
                <th> Pin </th>
                <th>EDIT</th>
                <?php
                $user = $_SESSION['login_user'];
                include 'db.php';
                $select = "SELECT * FROM user WHERE cname='$user'";
                $query = mysqli_query($conn, $select);
                $result = mysqli_fetch_array($query);
                if ($result['Role'] == 1) {
                    ?>
                    <th>DELETE</th>
                    <th>MAKE ADMIN</th>
                    <th>REMOVE ADMIN</th>
            </thead>
        </tr>
        <tbody>
            <?php
            $select = "SELECT * FROM user";
            $query = mysqli_query($conn, $select);
            /* $result = mysqli_fetch_array($query); */
            while ($result = mysqli_fetch_array($query)) {
                ?>  
                <tr> 
                    <td><?php echo $result['id']; ?></td>
                    <td><?php echo $result['cname']; ?></td>
                    <td><?php echo $result['email']; ?></td>
                    <td><?php echo $result['password']; ?></td>
                    <td><?php echo $result['mobile']; ?></td>
                    <td><?php echo $result['address']; ?></td>
                    <td><?php echo $result['pin']; ?></td>
                    <td><a href="edit.php?id=<?php echo $result['id']; ?>">Edit</a></td>
                    <td><a href="delete.php?id=<?php echo $result['id']; ?>">Delete</a></td>
                    <td><a href="makeadmin.php?id=<?php echo $result['id']; ?>">Make Admin</a></td>
                    <td><a href="removeadmin.php?id=<?php echo $result['id']; ?>">Remove Admin</a></td>
                </tr>
                <?php
            }
        } else {
            ?></thead>
            </tr><?php
            $select = "SELECT * FROM user WHERE cname='$user'";
            $query = mysqli_query($conn, $select);
            while ($result = mysqli_fetch_array($query)) {
                ?>  
                <tr>
                    <td><?php echo $result['id']; ?></td>
                    <td><?php echo $result['cname']; ?></td>
                    <td><?php echo $result['email']; ?></td>
                    <td><?php echo $result['password']; ?></td>
                    <td><?php echo $result['mobile']; ?></td>
                    <td><?php echo $result['address']; ?></td>
                    <td><?php echo $result['pin']; ?></td>
                    <td><a href="edit.php?id=<?php echo $result['id']; ?>">Edit</a></td>


                </tr>

                <?php
            }
        }
        ?>
    </tbody>
</table>




</body>