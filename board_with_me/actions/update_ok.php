<?php
include '../core/db.php';
$num = $_POST['num'];
$subject = $_POST['subject'];
$content = $_POST['content'];
$date = date('Y-m-d H:i:s');
$sql = "
UPDATE board set subject='$subject', content='$content', date='$date' WHERE num='$num'
";
$res = mysqli_query($conn,$sql);
if($res){
?>  <script>
        alert("수정되었습니다.");
        location.replace("../pages/view.php?num=<?=$num?>");
    </script>    
<?php   }
?>