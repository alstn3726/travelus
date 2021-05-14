<?php
include '../include/db.php';
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
    $id = $_POST['user_id'];
    $pw = $_POST['user_pw'];
    $re_pw = $_POST['re_pw'];
    $name = $_POST['user_name'];
    $birth = $_POST['birth'];
    $email = $_POST['user_email'];

    $sql = "SELECT * FROM user_table WHERE id='{$id}'";
    $res = $mysqli->query($sql);
    $exist = mysqli_num_rows($res);

    if($exist > 0) {
        echo "<script>alert(\"ERROR : Duplicate USER NAME\");</script>";
        // exit;
    }
    if($pw !== $re_pw) {
        echo "<script>alert(\"ERROR : Is not same PASSWORD\");</script>";
        // exit;
    }
    else {
        $pw = md5($pw);
    }

    $sql = "INSERT INTO user_table (id,pw,name,birth,email) VALUES ('$id','$pw','$name',$birth,'$email')";

    if($mysqli->query($sql)) {
        header('Location: ./signUp_success.html');
        // exit;
    }
    else {
        echo "<script>alert(\"ERROR : Query Error\");</script>";
    }

    // mysqli_close($mysqli);
?>
</body>
</html>