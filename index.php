<?php
    include './include/session.php';
?>
<!DOCTYPE html>
<html lang="ko">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>TravelUs</title>

    <link rel="icon" href="./images/favicon.ico" />
    <link rel="stylesheet" href="./style/style.css" />
    <link rel="stylesheet" href="./style/search.css" />
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" /> 


    <script src="./scripts/search_script.js" defer></script>
    <script src="./scripts/weather.js" defer></script>
  </head>

  <body>
    <header>
      <h1><img src="./images/logo.jpg" onclick="location.href='./index.php'" /></h1>
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

        <span><a href="./signup/signUp.php">Sign Up</a></span>
      </nav>
    </header>

    <main>
      <div class="wrapper">
        <div class="input-data">
          <input type="text" id="searchFields" required />
          <div class="underline"></div>
          <label>Search</label>
        </div>
      </div>
      <div class="weather">
        <div class="js-weather"></div>
      </div>
    </main>
    <!-- <ul class="js-tour"></ul> -->
    <div class="swiper-container">
      <div class="swiper-wrapper">
        <div class="swiper-slide"><img src="./images/1.jpg"></div>
        <div class="swiper-slide"><img src="./images/2.jpg"></div>
        <div class="swiper-slide"><img src="./images/3.jpg"></div>
        <div class="swiper-slide"><img src="./images/4.jpg"></div>
        <div class="swiper-slide"><img src="./images/5.jpg"></div>
        <div class="swiper-slide"><img src="./images/6.jpg"></div>
        <div class="swiper-slide"><img src="./images/7.jpg"></div>
        <div class="swiper-slide"><img src="./images/8.jpg"></div>
        <div class="swiper-slide"><img src="./images/9.jpg"></div>
        <div class="swiper-slide"><img src="./images/10.jpg"></div>
        <div class="swiper-slide"><img src="./images/11.jpg"></div>
        <div class="swiper-slide"><img src="./images/12.jpg"></div>
        <div class="swiper-slide"><img src="./images/13.jpg"></div>
        <div class="swiper-slide"><img src="./images/14.jpg"></div>
        <div class="swiper-slide"><img src="./images/15.jpg"></div>
        <div class="swiper-slide"><img src="./images/16.jpg"></div>
      </div>
      <div class="swiper-pagination"></div>
    </div>

    <footer>
		<p>
        Copyright (C) 2021.Travel Us. All right reserved 
		</p>
	</footer>
    

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="./scripts/swiper.js"></script>
  </body>
</html>