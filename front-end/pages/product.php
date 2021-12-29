<?php
// Dependencies
require_once("../assets/php/base.php");
require_once("../assets/php/queries.php");

// Start or continue a PHP session
session_start();
basketInit();

// See if user has tried to add to basket
addToBasket($_GET['operation']);

// Function to output product information or an error message
function outputProductInfo() {
  // Declare/initialise a variable
  $pid = $_GET['productId'];
  // Check if the product ID is set in the URL
  if (isValidProductId($pid)) {
    $pid = intval($pid);
    // If valid then get the information
    $product = getProductInfo($pid);
    // Create a string html template
    // pid ptitle ptitle price pid pid check(Quantity) pid check(In-Stock) pdesc
    $productInfoHtml = '
    <div id="none-shall-float" class="col-lg-6 py-3">
      <div id="product-information" class="col-lg-6 py-3">
        <div class="il65productImage">
          <img src="../assets/img/products/%s.png" alt="%s">
        </div>
  
        <form class="text-center" action="store?operation=addToBasket" method="POST">
          <div class="il65productName">%s</div>
          <div class="il65productPrice">Price: £%.2f</div>
          <div class="il65productQuantity">
          <input type="range" name="quantityFor%d" value=1 id="quantityFor%d" min="1" max="%s"><p>Quantity: <span id="quantityOutFor%d"></span></p>
          </div>
          <div class="il65productStock">%s
        </form>
      </div>
      <h2 class="il65title-section text-center">Product Description</h2>
      <p>%s</p>
    </div>';
    // Set the variables
		$pname = $product[1];
    $desc = $product[8];
		$price = $product[4];
    $stock = $product[7];
    printf($productInfoHtml, $pid, $pname, $pname, $price, $pid, $pid, (string) (($stock >= 20) ? 20 : $stock), $pid, (string) (($stock > 0) ? 'IN STOCK ('.$stock.')</div><div class="il65sumbmitButton"><button type="submit" class="btn btn-default add-to-cart" name="productId" value="'.$pid.'">Add to Basket</button></div>' : 'OUT OF STOCK</div>'), $desc);
  } else {
    echo '<div id="none-shall-float" class="col-lg-6 py-3"><div id="product-information" class="col-lg-6 py-3"><p class="text-center">An error occured. The product could not be found.</p></div></div>';
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="copyright" content="MACode ID, https://macodeid.com/">
  <title>ShopRight - Product Information</title>
  <link rel="stylesheet" href="../assets/css/bootstrap.css">
  <link rel="stylesheet" href="../assets/css/maicons.css">
  <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="../assets/vendor/animate/animate.css">
  <link rel="stylesheet" href="../assets/vendor/owl-carousel/css/owl.carousel.css">
  <link rel="stylesheet" href="../assets/vendor/fancybox/css/jquery.fancybox.css">
  <link rel="stylesheet" href="../assets/css/theme.css">
  <link rel="stylesheet" href="../assets/css/override-i.css">

  <script src="../assets/js/jquery-3.5.1.min.js"></script>
  <script src="../assets/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/owl-carousel/js/owl.carousel.min.js"></script>
  <script src="../assets/vendor/wow/wow.min.js"></script>
  <script src="../assets/vendor/fancybox/js/jquery.fancybox.min.js"></script>
  <script src="../assets/vendor/isotope/isotope.pkgd.min.js"></script>
  <script src="../assets/js/google-maps.js"></script>
  <script src="../assets/js/theme.js"></script>
  <script src="../assets/js/slider.js"></script>

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

  <main>
    <div class="page-section">
      <div class="container">
        <div class="row align-items-center">
          <?php
          outputProductInfo();
          ?>
        </div>
      </div> <!-- .container -->
    </div> <!-- .page-section -->
  </main>

</body>
</html>