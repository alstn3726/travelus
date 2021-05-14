<?php
    include '../include/db.php';

    $id = $_POST['user_id'];

    $id_sql = "SELECT * FROM user_table WHERE id='{$id}'";
    // $id_res = $mysqli->query($id_sql);
    $id_res = mysqli_query($mysqli, $id_sql);
    $id_exist = mysqli_num_rows($id_res);

    if($id_exist > 0) {
        echo "duply";
    }
    else {
        echo "ok";
    }
?>