$(() => {
	$("#signin-form").submit(function (e) {
		e.preventDefault();
		// define Uri
		var functionUrl = "admin/login";

		// ajax utilitys
		var before_send_button_text =
			'<i class="fa fa-spinner fa-spin fa-fw"></i> Please Wait ...';
		var after_send_button_text =
			"<i class='fas fa-check-circle m-r-10'></i> Logged In.";
		var default_button_text = "Log In";

		// get form and button
		var submit_button = $("#signin-form button");
		var form = $("#signin-form");
		var data = new FormData(this);
		$.ajax({
			type: "POST",
			url: functionUrl,
			data: data,
			dataType: 'json',
      cache: false,
      contentType: false,
      processData: false,
      context: this,
			beforeSend: function () {
				submit_button.attr("disabled", true).html(before_send_button_text);
			},
			error: function (xhr) {
				console.log("Error Message: " + xhr.status);
        submit_button.attr("disabled", false).html(default_button_text);
			},
			success: function (response) {
				console.log(response);
				// return;

				var {success, message} = response;

				if (success) {
					// Success msg
					var success_msg = `<div class="alert alert-success alert-dismissible fade show">
                            <button type="button" class="close" data-dismiss="alert">×</button> <strong>Well done!</strong>
                            ${message}
                        </div>`;
					submit_button.html(after_send_button_text);
					$(".err_msg").remove();
					$(".success_msg").html(success_msg);

					setTimeout(function () {
						window.location = "admin/dashboard";
					}, 1000);
					return;
				}
				// Error msg
				var err_msg = `<div class="alert alert-warning has-icon" role="alert">
                        <div class="alert-icon">
                            <span class="fa fa-bullhorn"></span>
                        </div>
                        ${message}
                    </div>`;
				submit_button.attr("disabled", false).html(default_button_text);
				$(".err_msg").html(err_msg);
			}, // end success
		}); // end ajax
	});
	$("#signup-form").submit(function (e) {
		e.preventDefault();
		// define Uri
		var functionUrl = "admin/register";

		// ajax utilitys
		var before_send_button_text =
			'<i class="fa fa-spinner fa-spin fa-fw"></i> Please Wait ...';
		var after_send_button_text =
			"<i class='fas fa-check-circle m-r-10'></i> Registered.";
		var default_button_text = "Register";

		// get form and button
		var submit_button = $("#signup-form button");
		var form = $("#signup-form");
		var data = new FormData(this);
		$.ajax({
			type: "POST",
			url: functionUrl,
			data: data,
			dataType: 'json',
      cache: false,
      contentType: false,
      processData: false,
      context: this,
			beforeSend: function () {
				submit_button.attr("disabled", true).html(before_send_button_text);
			},
			error: function (xhr) {
				console.log("Error Message: " + xhr.status);
        submit_button.attr("disabled", false).html(default_button_text);
			},
			success: function (response) {
				console.log(response);
				// return;

				var {success, message} = response;

				if (success) {
					// Success msg
					var success_msg = `<div class="alert alert-success alert-dismissible fade show">
                            <button type="button" class="close" data-dismiss="alert">×</button> <strong>Well done!</strong>
                            ${message}
                        </div>`;
					submit_button.html(after_send_button_text);
					$(".err_msg").remove();
					$(".success_msg").html(success_msg);

					setTimeout(function () {
						window.location = "admin/dashboard";
					}, 1000);
					return;
				}
				// Error msg
				var err_msg = `<div class="alert alert-warning has-icon" role="alert">
                        <div class="alert-icon">
                            <span class="fa fa-bullhorn"></span>
                        </div>
                        ${message}
                    </div>`;
				submit_button.attr("disabled", false).html(default_button_text);
				$(".err_msg").html(err_msg);
			}, // end success
		}); // end ajax
	});
});
