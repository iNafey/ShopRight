<?php
// Dependencies
require_once("assets/php/base.php");
require_once("assets/php/queries.php");

// Start or continue a php session
session_start();
basketInit();

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="copyright" content="MACode ID, https://macodeid.com/">
  <title>ShopRight - Basket</title>
  <link rel="stylesheet" href="assets/css/bootstrap.css">
  <link rel="stylesheet" href="assets/css/maicons.css">
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/vendor/animate/animate.css">
  <link rel="stylesheet" href="assets/vendor/owl-carousel/css/owl.carousel.css">
  <link rel="stylesheet" href="assets/vendor/fancybox/css/jquery.fancybox.css">
  <link rel="stylesheet" href="assets/css/theme.css">

  <script src="assets/js/jquery-3.5.1.min.js"></script>
  <script src="assets/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/owl-carousel/js/owl.carousel.min.js"></script>
  <script src="assets/vendor/wow/wow.min.js"></script>
  <script src="assets/vendor/fancybox/js/jquery.fancybox.min.js"></script>
  <script src="assets/vendor/isotope/isotope.pkgd.min.js"></script>
  <script src="assets/js/google-maps.js"></script>
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
              <a href="store"><span class="mai-walk"></span>Continue Shopping</a>
              <a href="basket"><span class="mai-cart"></span>Basket<?php echo ((basketCount() <= 0) ? "" : "(".basketCount().")"); ?></a>
            </div>
          </div>
        </div>
      </div> <!-- .container -->
    </div> <!-- .top-bar -->

    <nav class="navbar navbar-expand-lg navbar-light">
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
  </header>

  <main>
    <div class="page-section">
      <div class="container">
        <div class="row justify-content-center mt-5">
          <div class="col-lg-8">
            <form action="confirmation" class="form-contact" method="POST">
            <hr>
            <div class="text-center">
              <h2 class="title-section mb-3">Customer Details</h2>
              <p>We want to know you better so we can deliver to the right person!</p>
            </div>
            <hr>
              <div class="row">
                <div class="col-sm-6 py-2">
                  <label for="name" class="fg-grey">First name</label>
                  <input type="text" class="form-control" name="firstName" placeholder="Enter first name">
                </div>
                <div class="col-sm-6 py-2">
                  <label for="email" class="fg-grey">Last name</label>
                  <input type="text" class="form-control" name="lastName" placeholder="Email last name">
                </div>
                <div class="col-12 py-2">
                  <label for="subject" class="fg-grey">Mobile number</label>
                  <input type="text" class="form-control" name="mobileNumber" placeholder="Enter mobile phone number">
                </div>
                <div class="col-12 py-2">
                  <label for="message" class="fg-grey">Other number (Optional)</label>
                  <input type="text" class="form-control" name="otherNumber" placeholder="Enter other phone number">
                </div>
                <div class="col-12 py-2">
                  <label for="email" class="fg-grey">Email</label>
                  <input type="text" class="form-control" name="email" placeholder="Enter email address..">
                </div>
              </div>
            <hr>
            <div class="text-center">
              <h2 class="title-section mb-3">Delivery Details</h2>
              <p>Where do you want us to deliver your order?</p>
              <i style="color:#6D728B;">*Delivery charge of £3 will be applied to orders under £50, otherwise deliver is free</i>
            </div>
            <hr>
            <div class="row">
                <div class="col-12 py-2">
                  <label for="name" class="fg-grey">Address Line 1</label>
                  <input type="text" class="form-control" name="addressLine1" placeholder="Enter first name">
                </div>
                <div class="col-12 py-2">
                  <label for="email" class="fg-grey">Address Line 2 (Optional)</label>
                  <input type="text" class="form-control" name="addressLine2" placeholder="Email last name">
                </div>
                <div class="col-12 py-2">
                  <label for="subject" class="fg-grey">Postal Code</label>
                  <input type="text" class="form-control" name="postcode" placeholder="Enter mobile phone number">
                </div>
                <div class="col-12 py-2">
                  <label for="message" class="fg-grey">City</label>
                  <input type="text" class="form-control" name="city" placeholder="Enter other phone number">
                </div>
                <div class="col-12 py-2">
                  <label for="email" class="fg-grey">County</label>
                  <input type="text" class="form-control" name="county" placeholder="Enter email address..">
                </div>
              </div>
              <hr>
              <div class="row">
                  <button type="submit" class="btn btn-primary px-5" style="margin:auto;">Submit</button>
              </div>
            </form>
          </div>
        </div>
      </div> <!-- .container -->
    </div> <!-- .page-section -->

  </main>

</body>
</html>