<?php
include '../include/db.php';
include '../include/session.php';
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TravelUs</title>
    <link rel="icon" href="../images/favicon.ico">
    <link rel="stylesheet" href="../style/forgot.css">
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
    } else {
?>
    <header>
        <h1><img src="../images/logo.jpg" onclick="location.replace('../index.php')"></h1>
        <nav>
            <span><a href="../board_like_it/pages/list.php">Like It!</a></span>
            <span><a href="../board_with_me/pages/list.php">With Me</a></span>
            <span><a href="../login/login.php">Login</a></span>
            <span><a href="../signUp/signUp.php">Sign Up</a></span>
        </nav>
    </header>
<?php
        $inp_name = $_POST['inp_name'];
        $inp_email = $_POST['inp_email'];
        
        $sql = "SELECT * FROM user_table WHERE name='{$inp_name}' and email='{$inp_email}'";
        // $res = mysqli_query($mysqli, $sql);
        $res = $mysqli->query($sql);
        $exist = mysqli_fetch_array($res);

        if(($exist['name'] == $inp_name) && ($exist['email'] == $inp_email)) {
?>
    <div id="find_account">
        <h1>Found your ID!</h1>
<?php
        echo "<h2>".$exist['id']."</h2>";
?>
        <button type="button" id="login_btn" onclick="location.href='../login/login.php'">Login</button>
        <div class="caption">
            Forgot your <a href="./pw_forgot.php" id="forgot_pw">PASSWORD</a> ?
        </div>
    </div>
<?php
        } else {
            echo "<script>alert(\"ERROR : This account does not exist\"); history.back();</script>";
        }
    }
?>
</body>
</html>