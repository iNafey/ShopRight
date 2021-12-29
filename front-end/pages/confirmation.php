<?php
  // Dependencies
  require_once("../assets/php/base.php");

  // Start or continue a PHP session
  session_start();
  basketInit();

  /*function validateParams() {
    if (!isAlpha($_POST["firstName"])) {

    }

    if (!isAlpha($_POST["lastName"])) {
      
    }

    if (!) {

    }
  }*/

  function showConfirmation(){
    addCustomer();
    addDeliverAddress();
    addOrder();
    foreach($_SESSION['basket'] as $pid => $quantity){
      addProductList();
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <meta name="copyright" content="MACode ID, https://macodeid.com/">

  <title>ShopRight - Online grocery shop</title>

  <!-- CSS -->

  <link rel="stylesheet" href="../assets/css/bootstrap.css">

  <link rel="stylesheet" href="../assets/css/maicons.css">

  <link rel="stylesheet" href="../assets/vendor/animate/animate.css">

  <link rel="stylesheet" href="../assets/vendor/owl-carousel/css/owl.carousel.css">

  <link rel="stylesheet" href="../assets/vendor/fancybox/css/jquery.fancybox.css">

  <link rel="stylesheet" href="../assets/css/nafey.css">

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
  </header>

  <nav class="navbar navbar-expand-lg navbar-light">
    <div class="container">
      <div class="logo">
        <a href="/">
          <img src="../assets/img/shopright.jpg" alt="ShopRight">
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

  <!-- Order Section -->
  <section>
    <div class="container productwrap shadow-lg my-5 py-5">
      <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6 p-2 my-5 border rounded text-center">
          <div class="center-block tick m-2">
            <img src="../assets/img/green-tick.jpg">
          </div>
          <h2 class="pt-3 font-weight-bold fg-success">Order Confirmed!</h2>
          <p class="m-3"><strong>Order ID: </strong>10001</p>
          <p class="m-3"><strong>Order Date: </strong>11/12/2021</p>
          <p class="m-3"><strong>Subtotal: </strong>£22</p>
          <p class="m-3"><strong>Delivery Charges: </strong>£3</p>
          <p class="m-3"><strong>Order Total: </strong>£25</p>
        </div>
        <div class="col-md-3"></div>
      </div>
    </div>
  </section>

  <!-- JavaScript -->

  <script src="../assets/js/jquery-3.5.1.min.js"></script>

  <script src="../assets/js/bootstrap.bundle.min.js"></script>

  <script src="../assets/vendor/owl-carousel/js/owl.carousel.min.js"></script>

  <script src="../assets/vendor/wow/wow.min.js"></script>

  <script src="../assets/vendor/fancybox/js/jquery.fancybox.min.js"></script>

  <script src="../assets/vendor/isotope/isotope.pkgd.min.js"></script>

  <script src="../assets/js/theme.js"></script>

</body>

</html>
