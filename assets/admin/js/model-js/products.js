$(()=>{
  // alert();
  $('#productsAddForm').submit(function(e){
    e.preventDefault();
    // alert();
    var form = $(this);
    var submit_button = form.find('button[type="submit"]');

    var default_button_text = 'Save';
    var before_send_button_text = '<i class="fas fa-spinner-third fa-spin m-r-10"></i> Please wait ...';
    var after_send_button_text = '<i class="fas fa-check-circle m-r-10"></i> Saved';

    var url = 'admin/products/create';

    var formdata = new FormData(this);
    form.find('.msg').hide();
    $.ajax({
      type: 'POST',
      url: url,
      data: formdata,
      dataType: 'json',
      cache: false,
      contentType: false,
      processData: false,
      context: this,
      beforeSend: function() {
        submit_button.attr('disabled', true).html(before_send_button_text);
      },
      error: function(xhr) {
        console.log('Error Message: '+xhr.status);
        submit_button.attr('disabled', false).html(default_button_text);
      },
      success: function(response) {
        console.log('Success Message: '+response);

        if (response.success) {
          submit_button.html(after_send_button_text);
          setTimeout(function() {
            window.location = 'admin/products';
          }, 1000);

          // $('#buyer_address').html(customer_type);
          return;
        }
        submit_button.attr('disabled', false).html(default_button_text);
        form.find('.alert-danger').html(response.message).show();
        // alert(response.message);
      } // end success
    }); // end ajax
  });
  $('.product_row').click(function(e){
    var curThis = $(this);
    var dataSet = curThis[0].dataset;
    console.log(dataSet);
    for( var d in dataSet){
      $('#productsEditForm').find('input[name="'+d+'"]').val(dataSet[d]);
      $('#productsEditForm').find('select[name="'+d+'"]').val(dataSet[d]);
    }
    $('#product_id').val(dataSet['pm_id']);
  });
  $('#productsEditForm').submit(function(e){
    e.preventDefault();
    // alert();
    var form = $(this);
    var product_id = $('#product_id').val();
    var submit_button = form.find('button[type="submit"]');

    var default_button_text = 'Save';
    var before_send_button_text = '<i class="fas fa-spinner-third fa-spin m-r-10"></i> Please wait ...';
    var after_send_button_text = '<i class="fas fa-check-circle m-r-10"></i> Updated';

    var url = 'admin/products/update/'+product_id;
    var formdata = new FormData(this);
    form.find('.msg').hide();
    $.ajax({
      type: 'POST',
      url: url,
      data: formdata,
      dataType: 'json',
      cache: false,
      contentType: false,
      processData: false,
      context: this,
      beforeSend: function() {
        submit_button.attr('disabled', true).html(before_send_button_text);
      },
      error: function(xhr) {
        console.log('Error Message: '+xhr.status);
        submit_button.attr('disabled', false).html(default_button_text);
      },
      success: function(response) {
        // console.log('Success Message: '+response.success);
        if (response.success) {
          // submit_button.attr('disabled', false).html(default_button_text);
          submit_button.html(after_send_button_text);


          setTimeout(function() {
            location.reload(true);
          }, 1000);

          // $('#buyer_address').html(customer_type);
          return;
        }
        submit_button.attr('disabled', false).html(default_button_text);
        response = JSON.parse(response);
        console.log(response.message);
        alert(response.message)

        // form.find('.alert-danger').html(response.message).show();
      } // end success
    }); // end ajax
  });
  $('.delete_row').click(function(e){
    e.preventDefault();
    // alert();
    var form = $(this);
    var product_id = form.data('pm_id');
    var submit_button = '';
    // console.log(product_id);
    // return false;
    var delete_confirm = confirm('Confirm delete product?');
    if(!delete_confirm){
      return;
    }
    var default_button_text = '';
    var before_send_button_text = '';
    var after_send_button_text = '';

    var url = 'admin/products/delete/'+product_id;
    // var formdata = new FormData(this);
    form.find('.msg').hide();
    $.ajax({
      type: 'GET',
      url: url,
      // data: formdata,
      dataType: 'json',
      cache: false,
      contentType: false,
      processData: false,
      context: this,
      beforeSend: function() {
        // submit_button.attr('disabled', true).html(before_send_button_text);
      },
      error: function(xhr) {
        console.log('Error Message: '+xhr.status);
        // submit_button.attr('disabled', false).html(default_button_text);
      },
      success: function(response) {
        // console.log('Success Message: '+response.success);
        if (response.success) {
          // submit_button.attr('disabled', false).html(default_button_text);
          // submit_button.html(after_send_button_text);


          setTimeout(function() {
            location.reload(true);
          }, 1000);

          // $('#buyer_address').html(customer_type);
          return;
        }
        // submit_button.attr('disabled', false).html(default_button_text);
        response = JSON.parse(response);
        console.log(response.message);
        alert(response.message)

        // form.find('.alert-danger').html(response.message).show();
      } // end success
    }); // end ajax
  });
  $('#productsUploadForm').submit(function(e){
    e.preventDefault();
    // alert();
    var form = $(this);
    var submit_button = form.find('button[type="submit"]');

    var default_button_text = 'Save';
    var before_send_button_text = '<i class="fas fa-spinner-third fa-spin m-r-10"></i> Please wait ...';
    var after_send_button_text = '<i class="fas fa-check-circle m-r-10"></i> Saved';

    var url = 'admin/products/upload';

    var formdata = new FormData(this);
    form.find('.msg').hide();
    $.ajax({
      type: 'POST',
      url: url,
      data: formdata,
      dataType: 'json',
      cache: false,
      contentType: false,
      processData: false,
      context: this,
      beforeSend: function() {
        submit_button.attr('disabled', true).html(before_send_button_text);
      },
      error: function(xhr) {
        console.log('Error Message: '+xhr.status);
        submit_button.attr('disabled', false).html(default_button_text);
      },
      success: function(response) {
        console.log('Success Message: '+response);

        if (response.success) {
          submit_button.html(after_send_button_text);
          setTimeout(function() {
            window.location = 'admin/products';
          }, 1000);

          // $('#buyer_address').html(customer_type);
          return;
        }
        submit_button.attr('disabled', false).html(default_button_text);
        form.find('.alert-danger').html(response.message).show();
        // alert(response.message);
      } // end success
    }); // end ajax
  });
});
