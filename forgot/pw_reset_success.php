<?php
    include '../include/db.php';

    $idForPw = $_POST['idForPw'];
    $reset_pw = $_POST['reset_pw'];
    $reset_pw2 = $_POST['reset_pw2'];


    if($reset_pw !== $reset_pw2) {
        echo "<script>alert(\"ERROR : Is not same PASSWORD\");</script>";
    }
    else {
        $reset_pw = md5($reset_pw);
    }

    $update_sql = "UPDATE user_table SET pw='{$reset_pw}' WHERE id='{$idForPw}'";
    $update_res = $mysqli->query($update_sql);

    if($update_res) {

?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TravelUs</title>
    <link rel="icon" href="../images/favicon.ico">
    <link rel="stylesheet" href="../style/forgot.css">
</head>
<body>
    <header>
        <h1><img src="../images/logo.jpg" onclick="location.replace('../index.php')"></h1>
        <nav>
            <span><a href="../board_like_it/pages/list.php">Like It!</a></span>
            <span><a href="../board_with_me/pages/list.php">With Me</a></span>
            <span><a href="../login/login.php">Login</a></span>
            <span><a href="../signUp/signUp.php">Sign Up</a></span>
        </nav>
    </header>
    <div id="reset_password">
        <h1>SUCCESS</h1>
        <button type="button" id="login_btn" onclick="location.href='../login/login.php'">Login</button>
        <button type="button" id="home_btn" onclick="location.href='../inde.php'">HOME</button>
    </div>
<?php
    } else {
        echo "<script>alert(\"ERROR : Failure\"); history.back();</script>";  
    }
?>
</body>
</html>