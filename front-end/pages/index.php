<?php
// Dependencies
require_once("assets/php/base.php");

// Start or continue a PHP session
session_start();
basketInit();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="copyright" content="MACode ID, https://macodeid.com/">
  <title>ShopRight</title>
  <link rel="stylesheet" href="assets/css/bootstrap.css">
  <link rel="stylesheet" href="assets/css/maicons.css">
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/vendor/animate/animate.css">
  <link rel="stylesheet" href="assets/vendor/owl-carousel/css/owl.carousel.css">
  <link rel="stylesheet" href="assets/vendor/fancybox/css/jquery.fancybox.css">
  <link rel="stylesheet" href="assets/css/theme.css">
  <script src="https://kit.fontawesome.com/d8f16ae167.js" crossorigin="anonymous"></script>
  <script src="assets/js/jquery-3.5.1.min.js"></script>
  <script src="assets/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/owl-carousel/js/owl.carousel.min.js"></script>
  <script src="assets/vendor/isotope/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/wow/wow.min.js"></script>
  <script src="assets/js/theme.js"></script>

</head>
<body>

  <!-- Back to top button -->
  <div class="back-to-top"></div>

  <header>
    <div class="top-bar">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-md-8">
            <div class="d-inline-block">
              <span class="mai-mail fg-primary"></span> <a href="mailto:shop-right@mail.com">shop-right@mail.com</a>
            </div>
          </div>
          <div class="col-md-4 text-right d-none d-md-block">
            <div class="social-mini-button">
              <a href="store"><span class="mai-walk"></span><?php echo ((basketCount() <= 0) ? "Start" : "Continue"); ?> Shopping</a>
              <a href="basket"><span class="mai-cart"></span>Basket<?php echo ((basketCount() <= 0) ? "" : "(".basketCount().")"); ?></a>
            </div>
          </div>
        </div>
      </div> <!-- .container -->
    </div> <!-- .top-bar -->

    <nav class="navbar navbar-expand-lg navbar-light" style="margin:0">
     <div class="container">
      <div class="logo">
          <a href="/">
            <img src="assets/img/shopright.jpg" alt="ShopRight">
          </a>
      </div>

      <div class="wrapper">
          <input type="text" placeholder="Search.." name="search">
          <div class ="searchbtn">
            <i class="fas fa-search"></i>
          </div>
      </div>
      </div> <!-- .container -->
    </nav> <!-- .navbar -->

    <div class="page-banner home-banner mb-5">
      <div class="slider-wrapper">
        <div class="owl-carousel hero-carousel">
          <div class="hero-carousel-item">
            <img src="assets/img/bg_image_1.jpg" alt="">
            <div class="img-caption">
              <div class="subhead">The leading grocery store </div>
              <h1 class="mb-4">Amazing quality food at amazing prices</h1>
              <a href="store" class="btn btn-primary">View our products</a>
            </div>
          </div>
          <div class="hero-carousel-item">
            <img src="assets/img/bg_image_2.jpg" alt="">
            <div class="img-caption">
              <h1 class="mb-4">Sourcing our foods from reputable farmers</h1>
              
            </div>
          </div>
          <div class="hero-carousel-item">
            <img src="assets/img/bg_image_3.jpg" alt="">
            <div class="img-caption">
              <div class="subhead">Shopping has never been easier!</div>
              <h1 class="mb-4">Find your favourite products at ShopRight.</h1>
              
            </div>
          </div>
        </div>
      </div> <!-- .slider-wrapper -->
    </div> <!-- .page-banner -->
  </header>

  <main>
    <div class="page-section">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-6 py-3">
            <div class="subhead">About Us</div>
            <h2 class="title-section">We are<span class="fg-primary"> the best local</span> grocery store</h2>

            <p>We strive to give you the best products at the best prices. Our foods are sourced locally from the best reputable farmers in order to give you that sweet quality.</p>
            
          </div>
          <div class="col-lg-6 py-3">
            <div class="about-img">
              <img src="assets/img/about.jpg" alt="">
            </div>
          </div>
        </div>
      </div>
    </div> <!-- .page-section -->
  </main>

<!-- <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAIA_zqjFMsJM_sxP9-6Pde5vVCTyJmUHM&callback=initMap"></script> -->

</body>
</html>