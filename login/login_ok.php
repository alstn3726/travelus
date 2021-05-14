<?php 
  include '../include/session.php';
  include '../include/db.php';
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TravelUs</title>
    <link rel="icon" href="../images/favicon.ico" />
    <link rel="stylesheet" href="../style/user.css">
</head>

<body>
    <?php
        if($login_bool) {
    ?>
            <script>
                alert("ERROR : Already Login");
                history.back();
            </script>
    <?php
        }
        if(!$login_bool) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $pw_md5 = md5($password);

            $sql = "SELECT * from user_table where id='{$username}' and pw='{$pw_md5}'";
            // $res = $mysqli->query($sql);
            $res = mysqli_query($mysqli, $sql);
            $exist = mysqli_num_rows($res);

            if($exist > 0) {
                $_SESSION['username'] = $username;
                echo "<script>alert('SUCCESS : Login');</script>";
                echo "<script>location.replace('../index.php');</script>"; 
            }
            else { 
    ?>
                <script>
                    alert("ERROR : Username or Password is Incorrect");
                    history.back();
                </script>
    <?php
            }
        }
    ?>
</body>
</html>