<?php
// Dependencies
require_once("assets/php/base.php");
require_once("assets/php/queries.php");

// Start or continue a php session
session_start();
basketInit();

// See if user has tried to add to basket
addToBasket($_GET['operation']);

// Function to output all the products from the database
function showProducts()  {
	// Get all the products
	$products = getProducts();
	// Create a string template for a single product
	$singleProductHtml = '<div class="col-sm-4"><div class="product-image-wrapper"><div class="single-products"><div class="productinfo text-center"><a href="product?productId=%d"><img src="assets/img/products/%d.png" class="product-img-size" alt="" /><h2>%s</h2></a><p>£%.2f</p><input type="range" name="quantityFor%d" value=1 id="quantityFor%d" min="1" max="%s"><p>Quantity: <span id="quantityOutFor%d"></span></p><button type="submit" name="productId" value="%d" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button></div></div></div></div>';
	// Store the current value in row
	$rowIndex = 1;
	foreach ($products as $product) {
		// Set variables
		$pid = $product['product_id'];
		$pname = $product['product_name'];
		$price = $product['price'];
		// Check if first or last item in a row
		switch ($rowIndex) {
			case 1:
				echo '<div class="features_items">';
			case 2:
				printf($singleProductHtml, $pid, $pid, $pname, $price, $pid, $pid, (string) (($product['stock'] >= 20) ? 20 : ($product['stock'])), $pid, $pid);
				break;
			case 3:
				printf($singleProductHtml."</div>", $pid, $pid, $pname, $price, $pid, $pid, (string) (($product['stock'] >= 20) ? 20 : ($product['stock'])), $pid, $pid);
				$rowIndex = 0;
				break;
		}
		// Increment row index
		$rowIndex++;
	}
	// Check if final row is not a complete row
	if (!($products->num_rows % 3) == 0) {
		// If not then add </div>
		echo "</div>";
	}
}

?>

<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="copyright" content="MACode ID, https://macodeid.com/">
    <title>ShopRight - Products</title>
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/css/maicons.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
	<link rel="stylesheet" href="assets/css/responsive.css">
	<link rel="stylesheet" href="assets/css/theme.css">
	<script src="https://kit.fontawesome.com/d8f16ae167.js" crossorigin="anonymous"></script>
	<script src="assets/js/jquery-3.5.1.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/jquery.scrollUp.min.js"></script>
    <script src="assets/js/main.js"></script>
	<script src="assets/js/slider.js"></script>
</head><!--/head-->

<body>
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

	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
						<h2>Category</h2>
						<div class="panel-group category-products" id="accordian"><!--category-productsr-->
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="#">Fresh Food</a></h4>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="#">Fruit</a></h4>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="#">Bakery</a></h4>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="#">Frozen Food</a></h4>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="#">Drinks</a></h4>
								</div>
							</div>
						</div><!--/category-products-->
					</div>
				</div>
				<form class="col-sm-9 padding-right" action="?operation=addToBasket" method="POST" >
					<?php
					// Call function to show products
					showProducts();
					?>				
				</form>
			</div>
		</div>
	</section>

</body>
</html>