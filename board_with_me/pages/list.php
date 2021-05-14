<?php
    include '../core/db.php';
	include '../core/session_check.php';
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
	<div class="board_list_wrap">
		<table class="board_list">
			<caption>
			게시판 목록
			</caption>
			<thead class="table_head">
				<tr>
					<th>번호</th>
					<th>제목</th>
					<th>작성자</th>
					<th>작성일</th>
					<th>조회수</th>
				</tr>
			</thead>
				<tbody>
				<?php $sql = "SELECT * FROM board order by num desc";
				$res = mysqli_query($conn,$sql);
				$total = mysqli_num_rows($res);
				while($rows = mysqli_fetch_array($res)){
					if($total%2==0){
					?>	<tr class = "even">
						
					<?php	}
					else{
			  ?><tr>
				  <?php } ?>
					<td class="num"><?php echo $total ?></td>
					<td class="title">
					<a href="./view.php?num=<?php echo $rows['num']?>" class="title_link">
					<?php echo $rows['subject'] ?></a></td>
					<td><?php echo $rows['id']; ?></td>
					<td><?php echo $rows['date'] ?></td>
					<td><?php echo $rows['hit'] ?></td>
				</tr>
				<?php $total--;} 
				?>
			</tbody>
		</table>
			<p>
				<a href="./write.php"><button class="list_write_bt">글쓰기</button></a>
			</p>
			<div class="paging">
				<a href="#" class="page_btn">첫 페이지</a>
				<!-- <a href="#" class="page_btn">이전 페이지</a> -->
				<a href="#" class="page_num active">1</a>
				<a href="#" class="page_num">2</a>
				<a href="#" class="page_num">3</a>
				<a href="#" class="page_num">4</a>
				<!-- <a href="#" class="page_btn">다음 페이지</a> -->
				<a href="#" class="page_btn">마지막 페이지</a>
			</div>
		</div>
	<footer>
		<p>
			Copyright (C) 2021.Travel Us. All right reserved 
		</p>
	</footer>
</body>
</html>

