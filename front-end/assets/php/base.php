<?php
// Dependencies
include("queries.php");



/* INITIALISATION FUNCTIONS */



/** 
 * Function to check if the basket array is initialised and if not then initialise it
 */
function basketInit() {
    if(!isset($_SESSION['basket'])){
        // If not then initialise the array
        $_SESSION['basket'] = array();
    }
}



/* HELPER/MISC FUNCTIONS */

/**
 * Function to return all the characters that are not alphanumeric and their count
 * 
 * @param[in] $arg The variable to be tested
 * 
 * @return $arr An associative array of the character to the number of times counted
 */
function getNonAlphaNumeric($arg) {
    // Initialise an array to hold results
    $arr = array();
    if (isset($arg)) {
        if (is_string($arg)) {
            if (strlen($arg) > 0) {
                // Split the string into an array
                $string = str_split($arg);
                // Iterate through the array
                foreach ($string as $char) {
                    if (!ctype_alnum($char)) {
                        if (isset($arr[$char])) {
                            $arr[$char] = $arr[$char] + 1;
                        } else {
                            $arr[$char] = 1;
                        }
                    }
                }
            }
        }
    }
    return $arr;
}



/* VALIDATION FUNCTIONS */



/**
 * Function to check if a product ID is valid based on the following conditions: is not null, is all digits (numeric), exists in the product DB
 * 
 * @param[in] $productId The product ID to be tested
 * 
 * @return TRUE|FALSE based on where the product ID is valid or not 
 */
function isValidProductId($productId) {
    if (isset($productId)) {
        $value = ctype_digit($productId) ? intval($productId) : null;
        if (is_int($value)) {
            // Check if productId exists in the product table
            if(productExists($value)) {
                return TRUE;
            }
        }
    }
    return FALSE;
}

/**
 * Function to check if a variable is an unsigned integer
 * 
 * @param[in] $arg The variable to test if unsigned integer
 * 
 * @return TRUE|FALSE based on where the variable is an unsigned integer
 */
function isUnsignedInt($arg) {
    if (isset($arg)) {
        $value = ctype_digit($arg) ? intval($arg) : null;
        if (is_int($value)) {
            // Check if the value is 0 or more (unsigned)
            if ($value >= 0) {
                return TRUE;
            }
        }
    }
    return FALSE;
}

/**
 * Function to check if a variable consists of only alphabetical characters
 * 
 * @param[in] $arg The variable to test if consists of all alphabetical characters
 * 
 * @return TRUE|FALSE based on the result of test on variable
 */
function isAlpha($arg) {
    if (isset($arg)) {
        if (ctype_alpha($arg)) {
            return TRUE;
        }
    }
    return FALSE;
}

/**
 * Function to check if a variable consists of only numerical characters
 * 
 * @param[in] $arg The variable to test
 * 
 * @return TRUE|FALSE based on the results of the test
 */
function isNumeric($arg) {
    if (isset($arg)) {
        if (ctype_digit($arg)) {
            return TRUE;
        }
    }
    return FALSE;
}

/**
 * Function to check if a variable consists of only alpha-numerical characters
 * 
 * @param[in] $arg The variable to test
 * 
 * @return TRUE|FALSE based on the results of the test
 */
function isAlphaNumeric($arg) {
    //Checking if arg is not null
    if (isset($arg)) {
        //checking if arg is alpha numeric
        if (ctype_alnum($arg)) {
            return TRUE;
        }
    }
    return FALSE;
}

/** 
 * Function to check if a name is valid meeting the following conditons: is not null, consists of only alphabetical characters, has a length between 1 & 100
 * 
 * @param[in] $name The name to be tested
 * 
 * @return TRUE|FALSE depending on if the name is valid
 */
function isValidName($name) {
    // Check if not null
    if (isset($name)) {
        // Check if name is alphabetical only
        if (isAlpha($name)) {
            // Check if length of name is less than 100 characters and more than zero
            if ((strlen($name) > 0) && (strlen($name) <= 100)) {
                // Valid name
                return TRUE;
            }
        }
    }
    return FALSE;
}

/**
 * Function to check if a phone number is valid by meeting these conditions: is not null, consists of only numbers or one '+' at the start of the number, has a length of 11
 * 
 * @param[in] $number The phone number to be tested
 * 
 * @return TRUE|FALSE depending on if the phone number is valid
 */
function isValidPhoneNumber($number) {
    if (isset($number)) {
        if ((isNumeric($number)) or ((isNumeric(substr($number, 1)) && (substr($number,0,1) === '+')))) {
            if ((strlen($number) == 11) or ((strlen($number) == 12) && (substr($number,0,1) === '+'))) {
                return TRUE;
            }
        }
    }
    return FALSE;
}

/**
 * Function to check if an email is valid be meeting the following conditions: is not null, consisting of only alphanumeric characters except for and @ symbol, has a length between 4 and 256
 * 
 * @param[in] $email The email variable to test
 * 
 * @return TRUE|FALSE based on the result of the test
 */
function isValidEmail($email) {
    if (isset($email)) {
        $arr = (array)getNonAlphaNumeric($email);
        if (count($arr) == 1) {
            if (isset($arr['@'])) {
                if ($arr['@'] === 1) {
                    if ((strlen($email) >= 4) && (strlen($email <= 256))) {
                        return TRUE;
                    }
                }
            }
        } 
    }
    return FALSE;
}

/**
 * Function to check if address is valid based of the following conditions: is not null, only alpha-numeric, has a length less than or equal to 100 and more than 5
 * 
 * @param[in] $address The address variable to test
 * 
 * @return TRUE|FALSE based on result of test
 */
function isValidAddress($address) {

}

/**
 * Function to check if postcode valid based on the following conditions: is not null, 6 or 7 characters long, alphanumeric, following correct UK format
 * 
 * @param[in] $ postcode The postcode to test
 * 
 * @return TRUE|FALSE based on result from test
 */
function isValidPostcode($postcode) {
    
}



/* BASKET FUNCTIONALITY */



/**
 * Function to get the number of items in the basket
 * 
 * @return int The number of items currently in the basket
 */ 
function basketCount() {
	if (isset($_SESSION['basket'])) {
		return count($_SESSION['basket']);
	}
}

/**
 * Function to add to basket, based on if the addToBasket operation is set.
 */ 
function addToBasket($operation) {
    if (isset($operation)) {                                            // Check if operation is not null
        if (is_string($operation)) {                                    // Check if operation is of type string
            if (strcmp($operation, "addToBasket") == 0) {               // Check if operation has the EXACT (case sensitive) content "addToBasket"
                // Set the parameter variable for product ID
                $productId = $_POST['productId'];
                if (isValidProductID($productId)) {                     // Check the the validity of the product ID
                    // Get the quantity value for the product
                    $quantity = $_POST['quantityFor'.intval($productId)];
                    if (isUnsignedInt($quantity)) {                     // Check then check if quantity is valid
                        if(isset($_SESSION['basket'][$productId])){     // Check if product exists in the basket
                            $_SESSION['basket'][$productId] = (int) $_SESSION['basket'][$productId] + $quantity;
                        } else {
                            $_SESSION['basket'][$productId] = (int) $quantity;
                        }
                    }
                    
                }
            }
        }
    }
}

/** 
 * Function to check if the operation paramater value is set & to add product
 */
function removeFromBasket($operation) {
    if (isset($operation)) {
        if (is_string($operation)) {
            if (strcmp($operation, "removeFromBasket") == 0) {
                // Set the parameter variable for product ID
                $productId = $_POST['productId'];
    
                // Check the the validity of the product ID
                if (isValidProductID($productId)) {
                    // Delete item from basket
                    unset($_SESSION['basket'][$productId]);
                }
                
            }
        }
    }
}


?>