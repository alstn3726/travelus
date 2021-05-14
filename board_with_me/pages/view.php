<?php
    include '../core/db.php';
    include '../core/session_check.php';
	session_start();
?>
<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TravelUs</title>
    <link rel="icon" href="../../images/favicon.ico">
    <link rel="stylesheet" href="../../style/board.css"/>
</head>
<body>
    <header>
        <h1><a href="../../index.php">
            <img src="../../images/logo.jpg" alt="logo"></a></h1>
            <nav>
                <span><a href="../../board_like_it/pages/list.php">Like It!</a></span>
                <span><a href="./list.php">With Me</a></span>
                <?php
                if($like_bool) {
                ?>
                <span><a href="../../login/logout.php">Logout</a></span>
                <?php
                } 
                else {
                ?>
                <span><a href="../../login/login.php">Login</a></span>
                <?php
                }
                ?>
                <span><a href="../../signup/signUp.php">Sign Up</a></span>
            </nav>
	</header>
    <h3 class="board_title">커뮤니티 게시판</h3>
    <?php
        $num = $_GET['num'];
        $sql ="SELECT subject, content, date, hit, id FROM board WHERE num = $num";
        $res = mysqli_query($conn,$sql);
        $rows = mysqli_fetch_array($res);
        $content = str_replace("\n","<br>",$rows['content']);  
        $content = str_replace("","&nbsp;",$content);
        $hit="UPDATE board SET hit=hit+1 WHERE num=$num";
        mysqli_query($conn,$hit);
    ?>
    <form class="view_wrap" method="post">
        <table class="view_list">
            <caption>
            게시글 읽기
            </caption>
            <tr class="view_subject">
                <td><?php echo $rows['subject'] ?></td>
            </tr>
            <tr class="view_writer">
                <td><?php echo $rows['id'] ?>&nbsp;&nbsp;&nbsp;<?php echo $rows['date'] ?>&nbsp;&nbsp;&nbsp;<?php echo $rows['hit'] ?></td>
            </tr>
            <tr class="view_content">
                <td id="content"><?=$content?></td>
            </tr>
        </table>
    </form>
<p class="view_bt">
	<button onclick="location.href='./list.php'">목록</button>
	<button onclick="location.href='./update.php?num=<?=$num?>&id=<?=$_SESSION['username'] ?>'">수정</button>
	<button onclick="return confirm('삭제하시겠습니까?')" ><a href="./delete.php?num=<?=$num?>&id=<?=$_SESSION['username'] ?>">삭제</a></button>
	<button onclick="location.href='./write.php'">글쓰기</button>
</p>
<div class="riple_wrap">
    <div class="riple_container">
    <h3 class="riple_title">댓글</h3>
    <?php $sql = "SELECT * FROM riple2 WHERE parent='$num'order by num desc";
        $res2 = mysqli_query($conn, $sql);
        while($rows2 = mysqli_fetch_array($res2)){
            $riple_num = $rows2['num'];
            $riple_id = $rows2['id'];
            $riple_content = str_replace("\n","<br>",$rows2['content']);  
            $riple_content = str_replace("","&nbsp;",$riple_content);
            $riple_date = $rows2['date'];
    ?>
    <form class="riple_view_wrap" method="post">
        <table class="reple_view_list">
            <tr class="reple_view_writer">
                <td><?=$riple_id?> &nbsp;&nbsp;&nbsp;<?=$riple_date?></td>
            </tr>
        <?php
            if(isset($_SESSION['username'])){
                if($_SESSION['username']==$riple_id)
            ?><button class="riple_del_bt"><a href="../actions/riple_delete.php?num=<?=$riple_num?>">삭제</a></button>
        <?php    }
        ?>
            <tr class="riple_view_content">
                <td id="riple_content"><?=$riple_content?></td>
            </tr>
        </table>
    </form>
    <?php   }
    ?>
    <?php
        if(isset($_SESSION['username'])){
    ?>
    <form class="riple_form" name="riple_form" action="../actions/riple_write_ok.php" method="post">
        <input type="hidden" name="num" value="<?=$num?>">
        <div class="riple_write">
            <div>
                <textarea class="riple_textarea" name="riple_content" cols="100" rows="5" required></textarea>
            <div class="riple_write_bt">
                <button type="button" onclick="history.back();">취소</button>
                <button type="submit" onclick="return confirm('등록하시겠습니까?')">등록</button>
            </div>
        </div>
    </form>
    <?php
        }
    ?>
    </div>
</div>
<footer>
		<p>
        Copyright (C) 2021.Travel Us. All right reserved 
		</p>
	</footer>
</body>
</html>
