<?php
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
    <div id="container">
    <section id="pw_contain">
        <h1>Forgot your PW?</h1>
        <form action="./pw_find.php" method="POST" id="pwForgot" name="pwForgot">
            <div class="inp_section">    
                <label for="inp_id">ID</label>
                <input type="text" id="inp_id" name="inp_id" maxlength="15" autocomplete="off" required>
                <span class="msg" id="inpId_check"></span>
            </div>
            <div class="inp_section">
                <label for="inp_email">E-MAIL</label>
                <input type="text" id="inp_email" name="inp_email" maxlength="30" autocomplete="off" required>
                <span class="msg" id="inpEmail_check"></span>
            </div>
            <div class="find_btn">
                <button type="submit" id="find_pw">FIND</button>
                <button type="reset" id="reset">RESET</button>
            </div>
            <div class="caption">
                <p>Forgot your <a href="./id_forgot.php" id="forgot_id">ID</a> ?</p>
            </div>
        </form>
    </section>
    </div>
<?php
    }
?>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="../scripts/forgot.js"></script>
</body>
</html>