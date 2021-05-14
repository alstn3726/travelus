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
        $inp_id = $_POST['inp_id'];
        $inp_email = $_POST['inp_email'];
        
        $sql = "SELECT * FROM user_table WHERE id='{$inp_id}' and email='{$inp_email}'";
        $res = $mysqli->query($sql);
        $exist = mysqli_fetch_array($res);

        if(($exist['id'] == $inp_id) && ($exist['email'] == $inp_email)) {   
?>
    <form action="./pw_reset_success.php" method="POST" id="pwReset" name="pwReset">
        <div id="reset_pw_section">
            <h1>Password Reset</h1>
            <div class="inp_section">
                <?php echo "<input type=\"hidden\" id=\"idForPw\" name=\"idForPw\" value=\"$inp_id\">"; ?>
                <label>PASSWORD</label>
                <input type="password" id="reset_pw" name="reset_pw" maxlength="20" autocomplete="off" required>
                <span class="msg" id="reset_pw_check"></span>
            </div>
            <div class="inp_section">
                <label>RE-ENTER</label>
                <input type="password" id="reset_pw2" name="reset_pw2" maxlength="20" autocomplete="off" required>
                <span class="msg" id="reset_pw2_check"></span>
            </div>
            <div class="confirm_btn">
                <button type="submit" id="confirm">Confirm</button>
                <button type="reset" id="reset">RESET</button>
            </div>
        </div>
    </form>
<?php
        } else {
            echo "<script>alert(\"ERROR : This account does not exist\"); history.back();</script>";
        }
    }
?>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="../scripts/forgot.js"></script>
</body>
</html>