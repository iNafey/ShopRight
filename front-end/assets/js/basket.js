// VERSION TWO
function updatePrice(productId, quantity) {

    // Query API
    $.getJSON( `/api/productPrice?productId=${productId}`, function( data ) {
        // Set the price for this item
        $( `#priceFor${productId}` ).html(`${(parseFloat(data) * parseFloat(quantity)).toFixed(2)}`);
    });

    
}

function updateTotal() {
    var total = 0;
    jQuery( 'input[id*=quantityFor]' ).each(function(element){
        total += parseFloat($(`#${$(this).attr('id').replace('quantityFor', 'priceFor')}`).html());
    });
    $('.il65orderTotalPriceText').html(`£${total.toFixed(2)}`);
}

$(document).ready(function(){

    // Individual basket items
    // Check for all input with an id that starts with "quantityFor"
    jQuery( 'input[id*=quantityFor]' ).each(function(element){
        $(this).css("width", "80%");

        // Get the element ID for the slider output
        var sliderOutputElement = $(this).attr('id').replace('quantityFor', 'quantityOutFor');

        // Get the product ID
        var productId = $(this).attr('id').replace('quantityFor', '');

        // On the input bar changing value
        $(this).on('input change', function () {
        $(`#${sliderOutputElement}`).html(this.value);
        // Update price
        updatePrice(productId, this.value);
        updateTotal();
        });
        
        /*
        $( `#${sliderOutputElement}` ).each(function () {
        let value = $(this).prev().attr('value');
        $(this).html(value);
        });
        */

        // Set the value of the slider output element (default)
        $( `#${sliderOutputElement}` ).html($(this).val());
    })
  });
  