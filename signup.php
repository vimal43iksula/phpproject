
<html>
    <head>
        <script src="jquery-3.2.1.js"></script>
        <script type="text/javascript"></script>
        <script src="ajax.js"></script>
        <script>
            $(document).ready(function () {

                $(".second").hide();
                $("#ch1").click(function () {
                    $(".second").show();
                });
                //    function sync()
                //{
                //  var add = document.getElementById('add');
                //  var second = document.getElementById('second');
                //  second.value = add.value;
                //}
            });
        </script>
    </head>
    <body>
        <form method="post" action="#">
            <a href="first_page.php">Home Page</a><br><br>
            Username: <input type="text" name="user"><br><br>
            Email: <input type="text" name="email"><br><br>
            Password: <input type="password" name="pass"><br><br>
            Mobile: <input type="tel" name="mobile"><br><br>
            Address: <input type="text" name="add"><br><br>
            <input type="checkbox" id="ch1" name="check">Click here to Add Secondary Address<br><br>
            <div class="second">
                <label>Secondary Address: <input type="text" name="second"><br><br></label>
            </div>
            Pin Code :<input type="number" name="pin"><br><br>
            <input type="submit" name="submit" value="signup">
        </form>


        <?php
        include 'db.php';


        if (!empty($_POST)) {

            $cname = isset($_POST['user']) ? $_POST['user'] : "";
            $usrname = filter_var($cname, FILTER_SANITIZE_STRING);
            echo $usrname;

            $email = isset($_POST['email']) ? $_POST['email'] : "";
            $newemail = filter_var($email, FILTER_SANITIZE_EMAIL);
            if (!filter_var($newemail, FILTER_VALIDATE_EMAIL) === false) {
                /* echo("$newemail is a valid email address"); */
                echo "<br>";
            } else {
                echo("$newemail is not a valid email address");
                echo "<br>";
            }
            $password = isset($_POST['pass']) ? $_POST['pass'] : "";
            $mobile = isset($_POST['mobile']) ? $_POST['mobile'] : "";
            if (filter_var($mobile, FILTER_VALIDATE_INT)) {
                /* echo("$mobile is an integer"); */
            } else {
                echo("$mobile is not an integer");
            }
            $address = isset($_POST['add']) ? $_POST['add'] : "";
            $second_add = isset($_POST['second']) ? $_POST['second'] : "";

            $pin = isset($_POST['pin']) ? $_POST['pin'] : "";

//   if(!isset($_POST['check'])) {
//        $sql = "INSERT INTO user(email,mobile,address,secondary_add,pin)
//VALUES('$newemail','$mobile','$address','$address','$pin')";
//    } else {
//        $sql = "INSERT INTO user(email,mobile,address,secondary_add,pin)
//VALUES('$newemail','$mobile','$address','$second_add','$pin')";
//    }

            $sql = "INSERT INTO user11(cname,password)
                                             VALUES ('$usrname', '$password')";
            if (mysqli_query($conn, $sql)) {
                $last_id = $conn->insert_id;
                //echo $last_id;
                //var_dump($_POST['check']);
                if(!empty($_POST['check'])){
                    echo '1' . '<br>';
                    $sql = "INSERT INTO user(id,email,mobile,address,secondary_add,pin)
                        VALUES('$last_id','$newemail','$mobile','$address','$second_add','$pin')";
                }
                else{
                    //echo '2'  . '<br>';
                    $sql = "INSERT INTO user(id,email,mobile,address,secondary_add,pin)
                        VALUES('$last_id','$newemail','$mobile','$address','$address','$pin')";
                }
                
                mysqli_query($conn, $sql); 
//                else {
//                    echo "Error: " . $sql1 . "<br>" . mysqli_error($conn);
//                }
            }
        } /* else {
          echo "Error: " . $sql . "<br>" . mysqli_error($conn);
          } */
        ?>
    </body>
</html>

