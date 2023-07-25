$('#btn-add-cart').click(function (e) {
  e.preventDefault();

  let formData = $('#product_form').serialize();

  $.ajax({
    method: 'POST',
    url: 'process.php',
    data: formData,
    success: function (response) {
      let res = JSON.parse(response);
      console.log(res);
    },
    error: function (response) {
      console.log(response);
    },
  });
});

$('.btn-remove-item').click(function (e) {
  e.preventDefault();

  var _id = $(this).attr('data-id');

  $.ajax({
    method: 'DELETE',
    url: 'process.php',
    data: {
      id: _id
    },
    success: function (response) {
      let res = JSON.parse(response);
      console.log(res);
      location.reload();
    },
    error: function (response) {
      console.log(response);
    },
  });
});