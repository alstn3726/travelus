<?php
include './include/session.php'
?>
<!DOCTYPE html>
<html lang="ko">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>TravelUs</title>
    <link rel="icon" href="./images/favicon.ico" />
    <link rel="stylesheet" href="./style/style.css" />
    <link rel="stylesheet" href="./style/tourinfo.css" />
    <script
      src="https://kit.fontawesome.com/bfe6613ba5.js"
      crossorigin="anonymous"
    ></script>

    <script src="./scripts/search_script.js" defer></script>
    <script src="./scripts/weather.js" defer></script>
    <script src="./scripts/tourInfo.js" defer></script>
  </head>
  <body>
    <header>
      <h1><img src="./images/logo.jpg" onclick="location.replace('./index.php')" /></h1>
      <nav>
        <span><a href="./board_like_it/pages/list.php">Like It!</a></span>
        <span><a href="./board_with_me/pages/list.php">With Me</a></span>

        <?php
              if($login_bool) {
        ?>
        <span><a href="./login/logout.php">Logout</a></span>
        <?php
              } 
              else {
        ?>
        <span><a href="./login/login.php">Login</a></span>
        <?php
              }
        ?>

        <span><a href="./signUp/signUp.php">Sign Up</a></span>
      </nav>
    </header>

    <main>
      <div class="wrapper-wrapper-wrapper"></div>
      <div class="wrapper-wrapper">
        <div class="inner-wrapper">
          <div class="wrapper">
            <div class="input-data">
              <input type="text" id="searchFields" required />
              <div class="underline"></div>
              <label>Search</label>
            </div>
          </div>
        </div>
      </div>
      
      <div class="weather">
        <div class="js-weather"></div>
      </div>
    </main>
    <ul class="js-tourInfo"></ul>

    <footer>
		<p>
        Copyright (C) 2021.Travel Us. All right reserved 
		</p>
	</footer>
  </body>
</html>
