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
    <link rel="stylesheet" href="../style/user.css">
</head>
<body> 
<?php
if(isset($login_bool)) {
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
            <span><a href="#">Sign Up</a></span>
        </nav>
    </header>
    <div id="container">
    <section id="sign_contain">
        <h1>Sign Up</h1>
        <form action="./signUp_ok.php" method="POST" id="signUpForm" name="signUp">
            <div class="inp_section">
                <label>ID</label>
                <input type="text" id="user_id" name="user_id" maxlength="15" autocomplete="off" required>
                <span class="msg" id="id_check"></span>
            </div>
            <div class="inp_section">
                <label>PASSWORD</label>
                <input type="password" id="user_pw" name="user_pw" maxlength="20" autocomplete="off" required>
                <span class="msg" id="pw_check"></span>
            </div>
            <div class="inp_section">
                <label>RE-ENTER</label>
                <input type="password" id="re_pw" name="re_pw" maxlength="20" autocomplete="off" required>
                <span class="msg" id="re_pw_check"></span>
            </div>
            <div class="inp_section">
                <label>NAME</label>
                <input type="text" id="user_name" name="user_name" maxlength="15" autocomplete="off" required>
                <span class="msg" id="name_check"></span>
            </div>
            <div class="inp_section">
                <label>DATE-of-BIRTH</label>
                <input type="text" id="birth" name="birth" maxlength="8" autocomplete="off" required placeholder="ex) 19980803">
                <span class="msg" id="birth_check"></span>
            </div>
            <div class="inp_section">
                <label>E-MAIL</label>
                <input type="text" id="user_email" name="user_email" maxlength="30" autocomplete="off" required placeholder="ex) abcd123@naver.com">
                <span class="msg" id="email_check"></span>
            </div>
            <div class="signUp_btn">
                <button type="submit" id="signUp">SIGN UP</button>
                <button type="reset" id="reset">RESET</button>
            </div>
        </form>
    </section>
    </div>
<?php
}
?>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="../scripts/signUp.js"></script>
</body>
</html>