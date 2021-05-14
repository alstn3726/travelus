<?php
    include '../include/db.php';

    $email = $_POST['user_email'];

    $email_sql = "SELECT * FROM user_table WHERE email='{$email}'";
    // $email_res = $mysqli->query($email_sql);
    $email_res = mysqli_query($mysqli, $email_sql);
    $email_exist = mysqli_num_rows($email_res);

    if($email_exist > 0) {
        echo "duply";
    }
    else {
        echo "ok";
    }
?>