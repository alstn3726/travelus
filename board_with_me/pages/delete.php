<?php
    include '../core/db.php';
    include '../core/write_session.php';
    session_start();
    
    $id = $_GET['id'];
    $num = $_GET['num'];
    $sql = "SELECT * FROM board WHERE num='$num'";
    $res = mysqli_query($conn,$sql);
    $rows = mysqli_fetch_array($res);
    $delete = "DELETE FROM board WHERE num='$rows[num]'";
   
    if($rows['id'] !=$_SESSION['username']){
?>
        <script>
            alert("권한이 없습니다.");
            history.back();
        </script>
<?php   } else {
        mysqli_query($conn,$delete);
?>      <script>
            alert("삭제되었습니다.");
            location.replace("./list.php");
        </script>    
<?php   }
?>   