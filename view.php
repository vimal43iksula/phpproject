
<?php
session_start();
?>
<html>
    <head>
        <script src="jquery-3.2.1.js"></script>
        <script type="text/javascript"></script>
        <script src="ajax.js"></script>

    </head>
    <a href="login.php">Login Page</a><br><br>
    <a href="first_page.php">Home Page</a><br><br>

    <?php
    $user = $_SESSION['login_user'];
    include 'db.php';
    $select = "SELECT * FROM user11 WHERE cname='$user'";
    $query = mysqli_query($conn, $select);
    $result = mysqli_fetch_array($query);
    //print_r($_POST['phone']);
    if ($result['role'] == 1) {
        if (isset($_POST['phone']) && is_numeric($_POST['phone'])) {
            $select = "SELECT * FROM user WHERE mobile = '" . $_POST['phone'] . "'";
        } else {
            echo 'not Found';
            $select = "SELECT * FROM user";
        }
        ?><form method="post"> 
            <input name="phone" type ="text" id="keyword"><br><br>
            <button id ="search">Search</button><br><br>
        </form><?php
    }
    ?>

    <div class="search">  
        <table cellspacing="10">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th> Email </th>
                    <th> Password </th>
                    <th> Mobile </th>
                    <th> Address </th>
                    <th> Secondary Address </th>
                    <th> Pin </th>
                    <th>EDIT</th>
                    <?php
                    if ($result['role'] == 1) {
                        ?>
                        <th>DELETE</th>
                        <th>MAKE ADMIN</th>
                        <th>REMOVE ADMIN</th>
                       
                
                </tr></thead>
                <tbody class="resultDiv">
                    <?php
                    $query = mysqli_query($conn, $select);
                    /* $result = mysqli_fetch_array($query); */
                    while ($result = mysqli_fetch_array($query)) {
                        ?>  
                        <tr> 
                            <?php
                            $se .= "<td>" . $result['id'] . "</td>
                            <td> " . $result['cname'] . "</td>
                            <td> " . $result['email'] . "</td>
                            <td> " . $result['password'] . "</td>
                            <td> " . $result['mobile'] . "</td>
                            <td> " . $result['address'] . "</td>
                            <td> " . $result['secondary_add'] . "</td>
                            <td> " . $result['pin'] . "</td>
                            <td><a href=edit.php?id=" . $result['id'] . ">Edit</a></td>
                            <td><a href=delete.php?id=" . $result['id'] . ">Delete</a></td>
                            <td><a href=makeadmin.php?id=" . $result['id'] . ">Make Admin</a></td>
                            <td><a href=removeadmin.php?id=" . $result['id'] . ">Remove Admin</a></td>
                                 
                       </tr>";
                            if ($_POST['phone']) {
                                echo $se;
                            }
                            echo $se;
                        }
                    } else {
                        ?></thead>
                    </tr><?php
                    $select = "SELECT * FROM user11 WHERE cname='$user'";
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
                            <td><?php echo $result['secondary_add'];?></td>
                            <td><?php echo $result['pin']; ?></td>
                            <td><a href="edit.php?id=<?php echo $result['id']; ?>">Edit</a></td>


                        </tr>

                        <?php
                    }
                }
                ?>

            </tbody>
        </table>
    </div>


</body>