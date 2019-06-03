var isAdding = 0;

$(document).on('click','.btnAddToCart', function () {
  addToCart($(this))
});
$(document).on('click','.btnRemoveItemInCart', function () {
  if(confirm('Bạn có chắc chắn muốn xoá không?'))
    addToCart($(this));
  else
    return false
});

function addToCart(obj) {
  if(isAdding === 0){
    isAdding = 1;
    var data = {};
    if(obj.attr('data-target')){
      data.quantity = $(obj.attr('data-target')).val()
    }
    $.ajax({
      url: obj.attr('data-url'),
      type: 'post',
      data: data,
      success: function (response) {
        isAdding = 0;
        alert(response.message);
        if(response.errorCode === 0){
          $('#site-header-cart').html(response.template);
          if(response.templateCartPage){
            $('.cart-wrapper').html(response.templateCartPage)
          }
        }
      },
      error: function (request, status, err) {
        isAdding = 0;
      }
    });
  }
}