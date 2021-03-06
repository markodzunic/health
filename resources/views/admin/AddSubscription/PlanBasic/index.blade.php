@extends('admin.layouts.default-admin-template')
@section('AditionalHead')
<style>
#page-wrapper,
body {
	background-color: #f9f9f9;
}
</style>
@stop

@section('MainContent')
@include('admin.AddSubscription.PlanBasic.title')
@include('admin.AddSubscription.PlanBasic.content')
@stop




@section('AditionalFoot')
<script>
		$(function() {
				$('form.require-validation').bind('submit', function(e) {
					var $form         = $(e.target).closest('form'),
							inputSelector = ['input[type=email]', 'input[type=password]',
															 'input[type=text]', 'input[type=file]',
															 'textarea'].join(', '),
							$inputs       = $form.find('.required').find(inputSelector),
							$errorMessage = $form.find('div.error'),
							valid         = true;
					$errorMessage.addClass('hide');
					$('.has-error').removeClass('has-error');
					$inputs.each(function(i, el) {
						var $input = $(el);
						if ($input.val() === '') {
							$input.parent().addClass('has-error');
							$errorMessage.removeClass('hide');
							e.preventDefault(); // cancel on first error
						}
					});
				});
			});
			$(function() {
				var $form = $("#payment-form");
				$form.on('submit', function(e) {
					if (!$form.data('cc-on-file')) {
						e.preventDefault();
						Stripe.setPublishableKey("pk_test_0BuXu9yvZt0Vko5RUCVCMvBd");
						Stripe.createToken({
							number: $('.card-number').val(),
							cvc: $('.card-cvc').val(),
							exp_month: $('.card-expiry-month').val(),
							exp_year: $('.card-expiry-year').val()
						}, stripeResponseHandler);
					}
				});
				function stripeResponseHandler(status, response) {
					if (response.error) {
						$('.error')
							.removeClass('hide')
							.find('.alert')
							.text(response.error.message);
					} else {
						// token contains id, last4, and card type
						var token = response['id'];
						// insert the token into the form so it gets submitted to the server
						$form.find('input[type=text]').empty();
						$form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
						$form.get(0).submit();
					}
				}
			});
</script>
@stop
