/* Contact Form */

/*global $, jQuery*/
(function ($) {
    "use strict";
	
	$(document).ready(function () {
		var contactForm = {
			initialized: false,
			initialize: function () {
				if (this.initialized) {
					return;
				}
				this.initialized = true;
				this.build();
				this.events();
			},
			build: function () {
				this.validations();
			},
			events: function () {},
			validations: function () {
				var contactform = $("#contact-form"),
					url = contactform.attr("action"),
					alW = $(".alerts-wrap"),
					alS = $("#contact-success"),
					alD = $("#contact-error");
				contactform.validate({
					submitHandler: function (form) {
						// Loading State
						var submitButton = $(":submit");
						submitButton.buttonLoader('start');
						// Ajax Submit
						$.ajax({
							type: "POST",
							url: url,
							data: {
								"name": $("#contact-form #name").val(),
								"email": $("#contact-form #email").val(),
								"message": $("#contact-form #message").val()
							},
							dataType: "json",
							success: function (data) {
								if (data.response === "success") {
									alW.removeClass("hidden-xs-up");
									alS.addClass("show");
									alD.removeClass("show");
									setTimeout(function () {
										alS.fadeOut(7000, function () {
											alW.addClass("hidden-xs-up");
										});
									}, 6000);
									// Reset Form
									$("#contact-form .form-control")
										.removeClass("form-control-success")
										.val("")
										.blur()
										.parent()
										.removeClass("has-success")
										.removeClass("has-danger")
										.find("span.error")
										.remove();
								} else {
									alW.removeClass("hidden-xs-up");
									alD.addClass("show");
									alS.removeClass("show");
									setTimeout(function () {
										alD.fadeOut(7000, function () {
											alW.addClass("hidden-xs-up");
										});
									}, 6000);
								}
							},
							complete: function () {
								submitButton.buttonLoader('stop');
								$("#contact-form")[0].reset();
							}
						});
					},
					rules: {
						name: {
							required: true
						},
						email: {
							required: true,
							email: true,
							minlength: 8
						},
						message: {
							required: true,
							minlength: 20
						}
					},
					highlight: function (element) {
						$(element)
							.parent()
							.removeClass("has-success")
							.addClass("has-danger")
							.find("input, textarea")
							.addClass("form-control-danger");
					},
					success: function (element) {
						$(element)
							.parent()
							.removeClass("has-danger")
							.addClass("has-success")
							.find("input, textarea")
							.removeClass("form-control-danger")
							.addClass("form-control-success")
							.find("span.error")
							.remove();
					},
					errorElement: "span",
					errorClass: 'form-control-feedback error',
					validClass: 'form-control-feedback success'
				});
			}
		};
		contactForm.initialize();
		
	});
	
}(jQuery));