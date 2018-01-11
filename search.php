<?php

$select = "SELECT * FROM user WHERE mobile = '" . $_POST['keyword'] . "'";
$query = mysqli_query($conn, $select);
while ($result = mysqli_fetch_array($query)) {
    ?>  
    <tr> 
          $se = '';
        <?php

        $se .= "<td>" . $result['id'] . "</td>
                            <td> " . $result['cname'] . "</td>
                            <td> " . $result['email'] . "</td>
                            <td> " . $result['password'] . "</td>
                            <td> " . $result['mobile'] . "</td>
                            <td> " . $result['address'] . "</td>
                            <td> " . $result['pin'] . "</td>
                            <td><a href=edit.php?id=" . $result['id'] . ">Edit</a></td>
                            <td><a href=delete.php?id=" . $result['id'] . ">Delete</a></td>
                            <td><a href=makeadmin.php?id=" . $result['id'] . ">Make Admin</a></td>
                            <td><a href=removeadmin.php?id=" . $result['id'] . ">Remove Admin</a></td>
                       </tr>";
//                if($_POST['keywords']){
//                        echo $se;        
//                 }
        echo $se;
    }

