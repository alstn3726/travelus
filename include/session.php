<?php
  session_start();
  if( isset( $_SESSION['username'] ) ) {
    $login_bool = TRUE;
  }
?>