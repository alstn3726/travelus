<?php
    include '../core/db.php';
    include '../core/write_session.php';
    session_start();
    
    $num = $_REQUEST['num'];

    $sql = "DELETE FROM riple2 WHERE num = '$num'";
    $res = mysqli_query($conn,$sql);
    if($res){
        ?>  <script>
            alert("댓글이 삭제 되었습니다.");
            history.back();
            </script>
    <?php   }
    ?>


?>