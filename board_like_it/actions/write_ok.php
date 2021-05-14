<?php
include '../core/db.php';

$id = $_POST['name'];
$pw = $_POST['pw'];
$subject = $_POST['subject'];
$content = $_POST['content'];
$date = date('Y-m-d H:i:s');
$sql = "
INSERT INTO board2 (num,subject,content,date,hit,id,password)
VALUES (null, '$subject','$content','$date',0,'$id', '$pw')";

$res = mysqli_query($conn,$sql);
if($res){
?>  <script>
        alert("게시글이 등록되었습니다.");
        location.replace("../pages/list.php");
    </script>
<?php   }
?>