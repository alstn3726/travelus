<?php
    include '../core/db.php';
    include '../core/write_session.php';
    session_start();
    
    $num = $_REQUEST['num'];
    $riple_content = $_REQUEST['riple_content'];
    $riple_date = date('Y-m-d H:i:s');
    $sql = "
    INSERT INTO riple (parent, id, content, date)
    VALUES ('$num','$_SESSION[username]','$riple_content', now())";
    
    $res = mysqli_query($conn,$sql) or die(mysqli_error($conn));
    if($res){
        ?>  <script>
            alert("댓글이 등록되었습니다.");
            history.back();
            </script>
    <?php   }
    ?>