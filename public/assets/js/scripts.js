jQuery(document).ready(function($) {

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

/*$('.add-to-cart').on('click', function(e) {
  e.preventDefault();

  let id = $(this).data('id'); 

  $.ajax({
    url: "/cart-add",
    type: "POST",
    data: {
        id:id,
        _token: $('meta[name="csrf-token"]').attr('content'),
    },
    success:function(response){
        //console.log(response);
      $('.offcanvas-body').html(response);
    },
    error: function(xhr) {
      alert('Error!')
    }
  });

});*/

});