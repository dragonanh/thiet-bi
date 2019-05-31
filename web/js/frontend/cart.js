var isAdding = 0;
$(document).ready(function () {
  $('.btnAddToCart').on('click', function () {
    addToCart($(this))
  })
});

function addToCart(obj) {
  if(isAdding === 0){
    isAdding = 1;
    $.ajax({
      url: obj.attr('data-url'),
      type: 'post',
      success: function (response) {
        isAdding = 0;
        alert(response.message);
        if(response.errorCode === 0){
          $('#site-header-cart').html(response.template)
        }
      },
      error: function (request, status, err) {
        isAdding = 0;
      }
    });
  }
}