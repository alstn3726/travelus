
<?php
  session_start();
  if( isset( $_SESSION['username'] ) ) {
    $like_bool = TRUE;
  }
?>