<?php
  session_start();
  if(!isset($_SESSION['username'] ) ) {
    $like_bool = FALSE;
?>
  <script>
    alert("로그인이 필요합니다.");
    location.replace("../../login/login.php");
  </script>
<?php }
      else {
        $like_bool = TRUE;
      }
?>