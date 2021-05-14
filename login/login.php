<?php 
  include '../include/session.php';
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
        alert ("ERROR : Already Login");
        history.back();
      </script>

    <?php
      } 
      else {
    ?>
    <header>
        <h1><img src="../images/logo.jpg" onclick="location.replace('../index.php')"></h1>
        <nav>
            <span><a href="../board_like_it/pages/list.php">Like It!</a></span>
            <span><a href="../board_with_me/pages/list.php">With Me</a></span>
            <span><a href="#">Login</a></span>
            <span><a href="../signUp/signUp.php">Sign Up</a></span>
        </nav>
    </header>

    <div id="container">
    <section id="log_contain">
          <h1>Login</h1>
        <form action="./login_ok.php" method="post" id="loginForm" name="login">
            <div class="inp_section">
                <label for="log_id">ID</label>
                <input type="text" id="username" name="username" maxlength="15" autocomplete="off" required>
            </div>

            <div class="inp_section">
                <label for="log_pw">PASSWORD</label>
                <input type="password" id="password" name="password" maxlength="20" autocomplete="off" required>
            </div>

            <div class="login_btn">
                <!-- <span class="check_msg" id="login_check"></span> -->
                <button type="submit" id="login">LOGIN</button>
            </div>
            
            <span class="find">
                Forgot your
                <a href="../forgot/id_forgot.php" id="forgot_id">ID</a> /
                <a href="../forgot/pw_forgot.php" id="forgot_pw">PASSWORD</a> ?
            </span>
        </form>
    </section>
    </div>
    <?php
      }
    ?>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</body>
</html>