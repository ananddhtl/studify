<!DOCTYPE html>
<html>

<head>
    <title>Studify</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <style type="text/css">
        .panel-title {
            display: inline;
            font-weight: bold;
        }

        .display-table {
            display: table;
        }

        .display-tr {
            display: table-row;
        }

        .display-td {
            display: table-cell;
            vertical-align: middle;
            width: 61%;
        }
    </style>
</head>

<body>

    <div class="container">

        <h1></h1>

        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-default credit-card-box">
                    <div class="panel-heading display-table">
                        <div class="row display-tr">
                            <h3 class="panel-title display-td">Payment Details</h3>
                            <div class="display-td">
                                <img class="img-responsive pull-right"
                                    src="https://studify.au/assets/images/7C217B53-4E1D-4469-83DB-24C59D5F0C1A1.png">
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">

                        @if (Session::has('success'))
                            <div class="alert alert-success text-center">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                                <p>{{ Session::get('success') }}</p>
                            </div>
                        @endif

                        <form role="form" action="{{ route('/agent/stripe.post') }}" method="post"
                            class="require-validation" data-cc-on-file="false"
                            data-stripe-publishable-key="pk_test_51MfxwqICtr57ZGkoexllBLzNTot2X2Y34Qwx4xSeEL9Cc2ZI0Q0VWwkIH4fP7EDjEEVlhjIsPkPeM1KKHpGS3Ls300HhUxzipP"
                            id="payment-form">
                            @csrf

                            <div class='form-row row'>
                                <div class='col-xs-12 form-group required'>
                                    <label class='control-label'>Name on Card</label> <input class='form-control'
                                        size='4' type='text'>
                                </div>
                            </div>
                            <input type="hidden" value="{{ $package_id }}" name="package_id">
                            <input type="hidden" value="{{ $duration }}" name="duration">

                            @php
                                $package = App\Models\addPackage::where(['id' => $package_id])->first();

                            @endphp

                            @if ($duration == 'Monthly')
                                <input type="hidden" value="{{ $package->package_monthly }}" name="price">
                            @else
                                <input type="hidden" value="{{ $package->package_yearly }}" name="price">
                            @endif




                            <div class='form-row row'>
                                <div class='col-xs-12 form-group card required'>
                                    <label class='control-label'>Card Number</label> <input autocomplete='off'
                                        class='form-control card-number' size='20' type='text'>
                                </div>
                            </div>

                            <div class='form-row row'>
                                <div class='col-xs-12 col-md-4 form-group cvc required'>
                                    <label class='control-label'>CVC</label> <input autocomplete='off'
                                        class='form-control card-cvc' placeholder='ex. 311' size='4'
                                        type='text'>
                                </div>
                                <div class='col-xs-12 col-md-4 form-group expiration required'>
                                    <label class='control-label'>Expiration Month</label> <input
                                        class='form-control card-expiry-month' placeholder='MM' size='2'
                                        type='text'>
                                </div>
                                <div class='col-xs-12 col-md-4 form-group expiration required'>
                                    <label class='control-label'>Expiration Year</label> <input
                                        class='form-control card-expiry-year' placeholder='YYYY' size='4'
                                        type='text'>
                                </div>
                            </div>

                            <div class='form-row row'>
                                <div class='col-md-12 error form-group hide'>
                                    <div class='alert-danger alert'>Please correct the errors and try
                                        again.</div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xs-12">
                                    @if ($duration == 'Monthly')
                                        @if ($coupondiscount)
                                            @if ($coupondiscount->coupon_discount_type == 'Percentage(%)')
                                                @php$couponprize =
                                                        ($package->package_monthly * $coupondiscount->coupon_amount) /
                                                        100;
                                                $amount = $package->package_monthly - $couponprize; @endphp
                                            @else
                                                @php $amount = $package->package_monthly - $coupondiscount->coupon_amount; @endphp
                                            @endif
                                        @else
                                            @php $amount = $package->package_monthly; @endphp
                                        @endif
                                        <button class="btn btn-primary btn-lg btn-block" type="submit">Pay Now
                                            (${{ $amount }})</button>
                                    @else
                                        @if ($coupondiscount)
                                            @if ($coupondiscount->coupon_discount_type == 'Percentage(%)')
                                                @php$couponprize =
                                                        ($package->package_yearly * $coupondiscount->coupon_amount) /
                                                        100;
                                                $amount = $package->package_yearly - $couponprize; @endphp
                                            @else
                                                @php $amount = $package->package_yearly - $coupondiscount->coupon_amount; @endphp
                                            @endif
                                        @else
                                            @php $amount = $package->package_yearly; @endphp
                                        @endif
                                        <button class="btn btn-primary btn-lg btn-block" type="submit">Pay Now
                                            (${{ $amount }})</button>

                                    @endif
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

</body>

<script type="text/javascript" src="https://js.stripe.com/v2/"></script>

<script type="text/javascript">
    $(function() {

        var $form = $(".require-validation");

        $('form.require-validation').bind('submit', function(e) {
            var $form = $(".require-validation"),
                inputSelector = ['input[type=email]', 'input[type=password]',
                    'input[type=text]', 'input[type=file]',
                    'textarea'
                ].join(', '),
                $inputs = $form.find('.required').find(inputSelector),
                $errorMessage = $form.find('div.error'),
                valid = true;
            $errorMessage.addClass('hide');

            $('.has-error').removeClass('has-error');
            $inputs.each(function(i, el) {
                var $input = $(el);
                if ($input.val() === '') {
                    $input.parent().addClass('has-error');
                    $errorMessage.removeClass('hide');
                    e.preventDefault();
                }
            });

            if (!$form.data('cc-on-file')) {
                e.preventDefault();
                Stripe.setPublishableKey($form.data('stripe-publishable-key'));
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
                /* token contains id, last4, and card type */
                var token = response['id'];

                $form.find('input[type=text]').empty();
                $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
                $form.get(0).submit();
            }
        }

    });
</script>

</html>
