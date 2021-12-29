<?php
// Dependencies
require_once("../assets/php/base.php");

// Check if the parameter set
if(isset($_GET['productId'])) {
    // Set the PID
    $pid = $_GET['productId'];
    // If not null check if valid PID
    if (isValidProductId($pid)) {
        // Product information from DB
        $product = getProductInfo(intval($pid));
        // Create object to return
        $productInfo = array("product_id" => (int)$product[0], "product_name" => (string)$product[1], "category" => (string)$product[2], "country_of_origin" => (string)$product[3], "price" => (float)$product[4], "weight" => (float)$product[5], "calories" => (int)$product[6], "stock" => (int)$product[7], "description" => (string)$product[8]);
        echo json_encode($productInfo);
    }
}

?>