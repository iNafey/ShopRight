<?php
  // Dependencies
  require_once("../assets/php/base.php");

  // Start or continue a PHP session
  session_start();
  basketInit();

  // See if user has tried to add to basket
  removeFromBasket($_GET['operation']);

  function showBasket() {
    $basketItems = $_SESSION['basket'];
    //pid pid pname price pid min(20, stock) pid min(20, stock) pid
    /*$singleBasketItemHtml = '
    <div class="il65itemTemplate">
      <div class="il65templateImage">
        <button type="submit" value="%d" name="productId" class="btn btn-primary">Remove item</button>
        <img class="product-img-size" src="../assets/img/products/%d.png" alt="%s">
        <p>
          <input type="range" name="quantityFor%d" value=%d id="quantityFor%d" min="1" max="%s"/><br>
          Quantity: <span style="text-align:center" id="quantityOutFor%d"></span><br>
          £<span id="priceFor%d">%.2f</span><br>
        </p>
      </div>
    </div>';*/

    $singleBasketItemHtml ='
    <tr>
      <td class="basketProductColumn"> 
        <img class="basketProductImg" src="../assets/img/products/%d.png" alt="%s"></br>
        <button type="submit" value="%d" name="productId" class="btn btn-primary">Remove item</button>
      </td>
      <td class="basketPriceColumn">
        <h2>%s</h2>
        Price: £<span id="priceFor%d">%.2f</span><br>
      </td>
      <td class="basketQuantityColumn">
        <input type="range" name="quantityFor%d" value=%d id="quantityFor%d" min="1" max="%s"/><br>
        Quantity: <span style="text-align:center" id="quantityOutFor%d"></span><br>
      </td>
    </tr>';

    foreach($basketItems as $pid => $quantity) {
      $product = getProductInfo($pid);

      $pname = $product[1];
      $price = $product[4];
      $stock = $product[7];
      
      printf($singleBasketItemHtml, $pid, $pname, $pid, $pname, $pid, $price*$quantity, $pid, $quantity, $pid, (string) ($stock >= $quantity) ? $quantity: $stock, $pid);
      //printf($singleBasketItemHtml, $pid, $pid, $pname, $pid, $pid, $quantity, (string) ($stock >= $quantity) ? $quantity: $stock, $pid, $pid, $price*$quantity);
    }
  }

  function basketTotal() {
    $basketItems = $_SESSION['basket'];
    $sum = 0.0;
    foreach($basketItems as $pid => $quantity) {
      $product = getProductInfo($pid);
      $price = $product[4];
      $sum = $sum + $quantity*$price;
    }
    return $sum;
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="copyright" content="MACode ID, https://macodeid.com/">
  <title>ShopRight - Basket</title>
  <link rel="stylesheet" href="../../assets/css/bootstrap.css">
  <link rel="stylesheet" href="../../assets/css/maicons.css">
  <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="../../assets/vendor/animate/animate.css">
  <link rel="stylesheet" href="../../assets/vendor/owl-carousel/css/owl.carousel.css">
  <link rel="stylesheet" href="../../assets/vendor/fancybox/css/jquery.fancybox.css">
  <link rel="stylesheet" href="../../assets/css/theme.css">
  <link rel="stylesheet" href="../../assets/css/override-i.css">

  <script src="../../assets/js/jquery-3.5.1.min.js"></script>
  <script src="../../assets/js/bootstrap.bundle.min.js"></script>
  <script src="../../assets/vendor/owl-carousel/js/owl.carousel.min.js"></script>
  <script src="../../assets/vendor/wow/wow.min.js"></script>
  <script src="../../assets/vendor/fancybox/js/jquery.fancybox.min.js"></script>
  <script src="../../assets/vendor/isotope/isotope.pkgd.min.js"></script>
  <script src="../../assets/js/google-maps.js"></script>
  <script src="../../assets/js/theme.js"></script>
  <script src="../assets/js/basket.js"></script>

  <style>
    .basketTable {
      width: 96%; 
      margin: 4%;
      font-size: 150%;
      border-collapse: separate;
      border-spacing: 0 25px;
    }

    .basketProductColumn {
      white-space: nowrap; 
      display: inline-block; 
      padding-left:10%;
      width:30%;
    }

    .basketPriceColumn {
      white-space: nowrap; 
      display: inline-block; 
      padding-top: 2%; 
      padding-bottom: 2%;
      padding-left: 10%;
      width: 30%;
    }

    .basketQuantityColumn {
      white-space: nowrap; 
      display: inline-block; 
      padding-left: 10%;
      width: 40%;
    }

    .basketProductImg {
      max-width:100%;
      height:auto;
    }
  </style>

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

  <main>
    <div class="page-section">
      <div class="container">
        <div class="text-left">
          <h2 class="title-section mb-2 ">Welcome to your basket.</h2>
        </div>
        <table class="basketTable" >
          <!--
          <tr style="border: 1px solid black;">
            <th class="basketProductColumn"> PRODUCT </th>
            <th class="basketPriceColumn"> PRICE </th>
            <th class="basketQuantityColumn"> QUANTITY </th>
          </tr>
          -->
          <!--<tr>
            <td class="basketProductColumn"> 
              <img style="max-width:100%;height:auto;"  src="../assets/img/products/1.png" alt="banana">
            </td>
            <td class="basketPriceColumn">
              £<span id="priceFor1">0.0</span><br>
            </td>
            <td class="basketQuantityColumn">
              <input type="range" name="quantityFor1" value=5 id="quantityFor1" min="1" max="10"/><br>
              Quantity: <span style="text-align:center" id="quantityOutFor1"></span><br>
            </td>
          </tr>-->
          <form action="?operation=removeFromBasket" method="POST">
            <?php showBasket(); ?>
          </form>
        </table>
        
        <div class="il65confirmOrderBackContainer">
          <h5>TOTAL:</h5>
          <div class="il65orderTotalPriceText">
            £<?php printf("%.2f", basketTotal()); ?>
          </div>
          <div class="il65checkoutButton">
            <input type="submit" value="Proceed to checkout" onclick="location.href='delivery.php'">
          </div>
        </div>
      </div>
	  </div>
  </main>
</body>
</html>