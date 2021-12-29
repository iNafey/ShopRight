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
        echo json_encode((float)$product[4]);
    }
}

?>