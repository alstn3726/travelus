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
            session_destroy();
            echo "<script>alert('SUCCESS : Logout');</script>";
            echo "<script>location.replace('../index.php');</script>"; 
        } 
        else {
    ?>
        <script>
            alert("ERROR : Not Signed in");
            history.back();
        </script>
    <?php
        }
    ?>
</body>
</html>

