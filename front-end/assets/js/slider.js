// VERSION TWO
$(document).ready(function(){
  // Check for all input with an id that starts with "quantityFor"
  jQuery( 'input[id*=quantityFor]' ).each(function(element){
    $(this).css("width", "80%");

    // Get the productId for the slider
    var sliderOutputElement = $(this).attr('id').replace('quantityFor', 'quantityOutFor') // do something with the input here.

    // On the input bar changing update the value
    $(this).on('input change', function () {
      $('#'+sliderOutputElement).html(this.value);
    });
    
    $('#'+sliderOutputElement).each(function () {
      let value = $(this).prev().attr('value');
      $(this).html(value);
    });

    // Set the value of the slider output element (default)
    $('#'+sliderOutputElement).html($(this).val());
  })
});
