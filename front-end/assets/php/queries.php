<?php

function getProductsSimilar($arg) {
    return NULL;
}

//returns product information for a product with id = productID
function getProductInfo($productID) {
    // Open a new connection to the SQL server
    $db = mysqli_connect();

    // Check if any errors with SQL server connection
    if (mysqli_connect_errno()) {
        return NULL;
    } 

    // Query the database server
    $result = mysqli_query($db, "SELECT * FROM miniproject.product WHERE product_id = $productID");

    // Fetch single row results
    $result = mysqli_fetch_row($result);

    // Close connection to SQL server
    mysqli_close($db);

    // Return all 
    return $result;
}

// Returns all the products in product table (Using Procedural MySQLI)
function getProducts() {
    // Open a new connection to the SQL server
    $db = mysqli_connect();

    // Check if any errors with SQL server connection
    if (mysqli_connect_errno()) {
        return NULL;
    } 

    // Query the database server
    $result = mysqli_query($db, "SELECT * FROM miniproject.product");

    // Fetch all results
    mysqli_fetch_all($result, MYSQLI_ASSOC);

    // Close connection to SQL server
    mysqli_close($db);

    // Return all 
    return $result;
}

//returns true if product exists in product table and false otherwise
function productExists($productID) {
    return (getProductInfo($productID) == null) ? FALSE : TRUE;
}

function addCustomer($firstName, $lastName, $mobileNumber, $otherNumber, $lastAccess) {
    $db = mysqli_connect();

    // Check if any errors with SQL server connection
    if (mysqli_connect_errno()) {
        return FALSE;
    } 

    // Query the database server
    $result = mysqli_query($db, "INSERT INTO miniproject.customer VALUES (NULL, $firstName, $lastName, $mobileNumber, $otherNumber, $lastAccess);");

    $db->close();

    return $result;
}

function addDeliverAddress($addressLine1, $addressLine2, $City, $County, $PostalCode) {
    $db = mysqli_connect();

    // Check if any errors with SQL server connection
    if (mysqli_connect_errno()) {
        return FALSE;
    } 

    // Query the database server
    $result = mysqli_query($db, "INSERT INTO miniproject.deliver_address VALUES (NULL, $addressLine1, $addressLine2, $City, $County, $PostalCode);");

    $db->close();

    return $result;
}

function addOrder($orderId, $customerId) {
    $db = mysqli_connect();

    // Check if any errors with SQL server connection
    if (mysqli_connect_errno()) {
        return FALSE;
    } 

    // Query the database server
    $result = mysqli_query($db, "INSERT INTO miniproject.order VALUES ($orderId, $customerId);");

    $db->close();

    return $result;
}

function addProductList($orderId, $productId) {
    $db = mysqli_connect();

    // Check if any errors with SQL server connection
    if (mysqli_connect_errno()) {
        return FALSE;
    } 

    // Query the database server
    $result = mysqli_query($db, "INSERT INTO miniproject.productlist VALUES ($orderId, $productId);");

    $db->close();

    return $result;
}
?>