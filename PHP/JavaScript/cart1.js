$('.remove button').click(function () {
    removeItem(this);
  });
 
  $('.quantity input').change(function () {
    updateQuantity(this);
  });
  $('.subtotal').change(function () {
      alert("asfa");
    updateQuantity(this);
  });
  document.addEventListener('DOMContentLoaded',function(){
     recalculate();
  });
  

  
  $(document).ready(function () {
    updateSumItems();
    
  });
  
  
  var fadeTime = 300;
  var total=0;
  function updateQuantity(quantityInput) {
    //Line calc
    
    var productRow = $(quantityInput).parent().parent();
    var price = parseFloat(productRow.children('.price').text());
    var quantity = $(quantityInput).val();
    var linePrice = price * quantity;
  
    /* Update line price display and recalc cart totals */
    productRow.children('.subtotal').each(function () {
      $(this).fadeOut(fadeTime, function () {
        $(this).text(linePrice.toFixed(2));
        recalculate();
        $(this).fadeIn(fadeTime);
      });
    });
  
    productRow.find('.item-quantity').text(quantity);
    updateSumItems();
  }
  function recalculate() {
    var subtotal = 0;
  
  
    $('.cart-product').each(function () {
      subtotal += parseFloat($(this).children('.subtotal').text());
    });
    total = subtotal;
    
    $('.total-value').fadeOut(fadeTime, function () {
      $('#basket-total').html(total.toFixed(2));
      $('.total-value').fadeIn(fadeTime);
    });
  }
  
  function updateSumItems() {
    var sumItems = 0;
    $('.quantity input').each(function () {
      sumItems += parseInt($(this).val());
    });
    $('.total-items').text(sumItems);
  }
  function removeItem(removeButton) {
  
    var productRow = $(removeButton).parent().parent();
    productRow.slideUp(fadeTime, function () {
      productRow.remove();
      recalculate();
      updateSumItems();
    });
  }
  