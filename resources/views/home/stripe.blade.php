<!DOCTYPE html>
<html lang="en">

<head>
    @include('home.css')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
    <style>
        .container {
            display: flex;
            justify-content: center;
            padding: 20px;
        }

        form {
            width: 60%;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            margin-right: 20px;
        }

        form h2 {
            font-size: 18px;
            margin-top: 0;
        }

        form label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        form input[type="text"],
        form input[type="email"],
        form input[type="tel"],
        form input[type="password"],
        form textarea {
            width: calc(100% - 20px);
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        form .phone-input {
            display: flex;
            align-items: center;
        }

        form .phone-input select,
        form .phone-input input {
            margin-right: 10px;
        }

        form .phone-input select {
            width: 60px;
        }

        form .phone-input input {
            flex: 1;
        }

        form .enter-manually {
            font-size: 14px;
            color: #007BFF;
            cursor: pointer;
        }

        form .form-section {
            margin-bottom: 30px;
        }

        form .payment-method {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }

        form .payment-method img {
            margin-right: 10px;
        }

        form .credit-card-info {
            display: flex;
            flex-wrap: wrap;
        }

        form .credit-card-info label,
        form .credit-card-info input {
            width: calc(50% - 10px);
            margin-right: 20px;
            margin-bottom: 10px;
        }

        form .credit-card-info input[type="text"] {
            width: calc(50% - 20px);
        }

        form .credit-card-info input:last-child {
            margin-right: 0;
        }

        form button.complete-payment {
            width: 100%;
            padding: 15px;
            background-color: #007BFF;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            font-weight: bold;
        }

        form button.complete-payment:hover {
            background-color: #0056b3;
        }

        form .note {
            margin-top: 10px;
            font-size: 14px;
            color: #555;
        }

        aside.order-summary {
            width: 35%;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        aside.order-summary h3 {
            font-size: 18px;
            margin-top: 0;
        }

        aside.order-summary p {
            margin: 5px 0;
        }

        aside.order-summary .order-items {
            border-top: 1px solid #ddd;
            padding-top: 10px;
            margin-top: 10px;
        }

        aside.order-summary .order-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
        }

        aside.order-summary .order-item img {
            max-width: 50px;
            margin-right: 10px;
        }

        aside.order-summary .order-item p {
            margin: 0;
            flex: 1;
        }

        aside.order-summary .order-item a {
            color: #007BFF;
            text-decoration: none;
        }

        aside.order-summary .order-summary-total {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 10px;
            font-weight: bold;
        }

        aside.order-summary .order-summary-total input[type="text"] {
            flex: 1;
            padding: 5px;
            margin-left: 10px;
        }

        section.customer-reviews {
            width: 100%;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }

        section.customer-reviews h3 {
            font-size: 18px;
            margin-top: 0;
        }

        section.customer-reviews .reviews {
            border-top: 1px solid #ddd;
            padding-top: 10px;
            margin-top: 10px;
        }

        section.customer-reviews .review {
            margin-bottom: 10px;
        }

        section.customer-reviews .review p {
            margin: 5px 0;
        }

        section.customer-reviews .review strong {
            font-size: 16px;
        }
    </style>
</head>

<body>
    <header>
        <div class="header-main" style="height: 90px; border-bottom: 1px solid grey;">
            <div class="container" style="display: flex; justify-content: center; transform: translateY(35%);">
                <a href="/" class="header-logo" style="margin: 0;">
                    <div class="brand-text brand-big visible text-uppercase"><strong class="text-primary" style="font-size: 25px;">Flower</strong><strong>shop</strong></div>
                </a>
            </div>
            <div class="header-search-container" style="margin-left: 90px; transform: translateY(-55%);">
                <a href="{{url('/mycart')}}"><button class="search-btn">Go back</button></a>
            </div>
        </div>
    </header>
    <div class="container">
        @if (Session::has('success'))
        <div class="alert alert-success text-center">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
            <p>{{ Session::get('success') }}</p>
        </div>
        @endif
        <form action="{{ route('stripe.post', $value) }}" method="post" class="require-validation" data-cc-on-file="false" data-stripe-publishable-key="{{ env('STRIPE_KEY') }}" id="payment-form">
            @csrf
            <div class="form-section">
                <h2>1. Who do you want to send the gift to?</h2>
                <label for="recipientName">Recipient's Full Name *</label>
                <input type="text" id="recipientName" name="recipientName" required>
                <label for="recipientPhone">Recipient's Phone No. *</label>
                <input type="tel" id="recipientPhone" name="recipientPhone" required>
                <label for="deliveryAddress">Delivery address *</label>
                <input type="text" id="deliveryAddress" name="deliveryAddress" placeholder="Address (street, number and city)" required>
            </div>
            <div class="form-section">
                <h2>2. Add a message</h2>
                <textarea id="message" name="message" placeholder="Write a message to your loved one here"></textarea>
            </div>

            <div class="form-section">
                <h2>3. Your billing information</h2>
                <label for="billingName">Your Name and Surname *</label>
                <input type="text" id="billingName" name="billingName" required>
            </div>
            <div class='form-row row'>
                <h2>4. Your Payment information</h2>  
                <div class='col-xs-12 form-group required'>

                    <label class='control-label'>Name on Card</label> <input class='form-control' size='4' type='text'>

                </div>

            </div>
            <div class='form-row row'>

                <div class='col-xs-12 form-group card required'>

                    <label class='control-label'>Card Number</label> <input autocomplete='off' class='form-control card-number' size='20' type='text'>

                </div>

            </div>
            <div class='form-row row'>

                <div class='col-xs-12 col-md-4 form-group cvc required'>

                    <label class='control-label'>CVC</label> <input autocomplete='off' class='form-control card-cvc' placeholder='ex. 311' size='4' type='text'>

                </div>

                <div class='col-xs-12 col-md-4 form-group expiration required'>

                    <label class='control-label'>Expiration Month</label> <input class='form-control card-expiry-month' placeholder='MM' size='2' type='text'>

                </div>

                <div class='col-xs-12 col-md-4 form-group expiration required'>

                    <label class='control-label'>Expiration Year</label> <input class='form-control card-expiry-year' placeholder='YYYY' size='4' type='text'>

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

                    <button class="btn btn-primary btn-lg btn-block" type="submit">Complete payment</button>

                </div>

            </div>
        </form>
        <aside class="order-summary">
            <h3>Review your order</h3>
            @foreach($cart as $carts)
            <p>Delivery date: <span>5 July 2024</span></p>
            <div class="order-items">
                <div class="order-item">
                    <img src="/products/{{$carts->product->image}}" alt="Pink Bloom">
                    <p>{{$carts->product->title}}</p>
                    <p>{{$carts->product->price}}Dhs</p>
                </div>
                @if($carts->accessory)
                <div class="order-item">
                    <img src="/products/{{$carts->accessory->image}}" alt="">
                    <p>{{$carts->accessory->title}}</p>
                    <p>{{$carts->accessory->price}}Dhs</p>
                </div>
                @endif
                @if($carts->greeting_card)
                <div class="order-item">
                    <img src="/products/{{$carts->greeting_card->image}}" alt="">
                    <p>{{$carts->greeting_card->title}}</p>
                    <p>{{$carts->greeting_card->price}}Dhs</p>
                </div>
                @endif
                <div class="order-summary-total">
                    <p>Shipping costs</p>
                    <p>0Dhs</p>
                </div>
                <div class="order-summary-total">
                    <p>Total</p>
                    <p>{{$value}}Dhs</p>
                </div>
            </div>
            @endforeach
        </aside>
    </div>
</body>
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
<script type="text/javascript">
    $(function() {



        /*------------------------------------------

        --------------------------------------------

        Stripe Payment Code

        --------------------------------------------

        --------------------------------------------*/



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



        /*------------------------------------------

        --------------------------------------------

        Stripe Response Handler

        --------------------------------------------

        --------------------------------------------*/

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