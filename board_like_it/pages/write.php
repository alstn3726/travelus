<?php
    include '../core/db.php';
	include '../core/write_session.php';
	session_start();
?>
<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TravelUs</title>
	<!-- include libraries(jQuery, bootstrap) -->
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    
	<!-- include summernote css/js -->
	<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <link rel="icon" href="../../images/favicon.ico">
    <link rel="stylesheet" href="../../style/board.css"/>
</head>
<body>
    <header>
        <h1><a href="../../index.php">
            <img src="../../images/logo.jpg" alt="logo"></a></h1>
            <nav>
				<span><a href="./list.php">Like It!</a></span>
                <span><a href="../../board_with_me/pages/list.php">With Me</a></span>
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
	<h3 class="board_title">추천 게시판</h3>
	<form class="write_wrap" action="../actions/write_ok.php" method="post">
		<table class="write_list">
			<caption>
			게시글 작성
			</caption>
			<tr>
				<td>작성자</td>
				<td><input type="hidden" name="name" value="<?=$_SESSION['username']; ?>"><?=$_SESSION['username']; ?></td>
			</tr>
			<tr>
				<td>제목</td>
				<td><input type="text" name="subject" placeholder="제목을 입력하세요." required="필수입력사항입니다."/></td>
			</tr>
			<tr>
				<td>내용</td>
				<td><textarea class="write_content" type="text" name="content" placeholder="내용을 입력하세요." required="필수입력사항입니다."></textarea></td>
			</tr>
		</table>
			<p>
				<button type="button" onclick="history.back();">취소</button>
				<button type="submit" onclick="return confirm('저장하시겠습니까?')">저장</button>
			</p>
	</form>
<footer>
	<p>
	Copyright (C) 2021.Travel Us. All right reserved 
	</p>
</footer>
	<script>
		$(document).ready(function() {
			$('.write_content').summernote({
				height: 300,                 // 에디터 높이
				minHeight: null,             // 최소 높이
				maxHeight: null,             // 최대 높이
				focus: true,                  // 에디터 로딩후 포커스를 맞출지 여부
				lang: "ko-KR",					// 한글 설정
				placeholder: '최대 2048자까지 쓸 수 있습니다'	//placeholder 설정
				
		});
	});
	</script>
</body>
</html>
