<!DOCTYPE html>
<html>

<head>
    @include('home.css')
    <style>
        .cart-container {
            width: 85%;
            margin: auto;
        }

        .section {
            width: 80%;
            height: 75px;
            margin: 25px 10px;
            text-transform: uppercase;
        }

        .cart-header,
        .cart-item {
            display: flex;
            justify-content: space-between;
            align-items: right;
            padding: 10px 0;
        }

        .cart-header {
            font-weight: lighter;
        }

        .cart-header .item-title {
            margin-left: 30%;
        }

        .cart-header .item-price {
            margin-left: 80px;
        }

        .cart-item {
            border-top: 1px solid #000;
            padding-bottom: 20px;
        }

        .item-info {
            width: 500px;
            display: flex;
        }

        .item-image {
            width: 150px;
            height: 150px;
            margin-right: 20px;
        }

        .item-details {
            display: flex;
            flex-direction: column;
        }

        .item-title {
            font-size: 18px;
        }

        .item-stems {
            color: #666;
            font-size: 14px;
        }

        .edit-btn {
            width: 100%;
            margin-top: 20px;
            background-color: #ff1493;
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            font-size: 14px;
        }

        .quantity {
            display: flex;
            align-items: baseline;
            border: 1px solid #666;
            margin-bottom: 180px;
        }

        .quantity input {
            padding: 3px 10px;
            border: none;
        }

        .quantity button {
            background-color: #ddd;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
        }

        .quantity button:hover {
            background-color: #c9c6c6;
        }

        .quantity input {
            width: 40px;
            text-align: center;
        }


        /* Basic styles */
        .containerr {
            width: 85%;
            margin: 0 auto;
        }

        /* Subtotal and Price */

        /*.total-savings {

       .totale {
           display: flex;
           text-transform: uppercase;
       }

       .tot {
           margin-left: 80%;
           text-align: center;
       }

       .tttt {
           display: flex;

       }

       .notes {
           display: flex;
           flex-direction: column;
       }

       /* Order Notes */
        .order-notes {
            width: 750px;
            height: 70px;
            margin-right: 10px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            resize: vertical;
        }

        /* Checkbox and Text */
        .checkbox-label {
            width: 750px;
            margin: 10px 0;
            font-size: 0.9em;
            color: #666;
        }

        .checkbox-label input {
            margin-right: 5px;
        }

        /* Terms and Conditions */
        .terms {
            font-size: 0.9em;
            color: #000;
        }

        .terms a {
            color: #E91E63;
            text-decoration: none;
            margin-left: 5px;
        }

        .check {
            width: 240px;
            margin-left: 100px;
            border-top: 2px solid black;
            /* Change the color and thickness as needed */
            padding-top: 15px;
            flex-direction: column;
        }

        .out {
            text-align: center;
            margin: 10px 0;
        }

        /* Buttons */
        .button {
            width: 240px;
            padding: 15px 20px;
            margin: 10px 0;
            background-color: #E91E63;
            color: #fff;
            text-align: center;
            border: none;
            cursor: pointer;
            text-decoration: none;
            font-size: 1em;
        }

        .button:hover {
            background-color: #D81B60;
        }

        .continue-shopping {
            width: 240px;
            padding: 20px 20px;
            margin: 10px 0;
            background-color: white;
            border-top: 1px solid gray;
            border-bottom: 1px solid gray;
            border-left: none;
            border-right: none;
            font-size: 0.9em;
            color: #E91E63;
            text-decoration: none;
        }

        .continue-shopping:hover {
            color: #C2185B;
        }

        .checkout-container {
            width: 100%;
            max-width: 1150px;
            margin: 0 auto;
            padding: 20px;
        }

        /* Order summary styling */
        .order-summary h2 {
            display: inline;
            font-size: 1.5rem;
            margin-bottom: 10px;
        }

        /* Order notes styling */
        .order-notes {
            margin-top: 10px;
            border: none;
            padding: 0;
        }

        .order-notes label {
            font-weight: bold;
            font-size: 14px !important;
            margin-bottom: 5px;
        }

        #order-notes-textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        /* Checkbox container styling */
        .checkbox-container {
            margin-top: 90px;
        }

        .checkbox-container label,
        .terms-container label {
            font-size: 0.9rem;
            color: #333;
        }

        /* Link styling */
        .terms-container a {
            color: #ff1493;
            /* Hot pink color */
            text-decoration: none;
        }

        .terms-container a:hover {
            text-decoration: underline;
        }

        /* Buttons container styling */
        .buttons-container {
            margin-top: 20px;
        }

        .checkout-button {
            background-color: #ff1493;
            /* Hot pink color */
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 1rem;
            cursor: pointer;
            border-radius: 4px;
            margin-right: 10px;
        }

        .checkout-button:hover {
            background-color: #e01382;
            /* Slightly darker pink */
        }

        .continue-shopping-button {
            background-color: #f5f5f5;
            color: #aaa;
            border: none;
            padding: 10px 20px;
            font-size: 1rem;
            border-radius: 4px;
        }

        .form-group {
            margin-bottom: 25px;
        }

        #card-type {
            background-color: white;
        }

        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 15px;
        }

        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #787474;
            border-radius: 5px;
        }

        .form-group input::placeholder,
        .form-group select::placeholder,
        .form-group textarea::placeholder {
            color: rgb(84, 83, 83);
        }

        .form-group input[type="date"] {
            padding: 10px;
            background: left 10px center;
            background-size: 20px 20px;
        }

        .form-row {
            display: flex;
            justify-content: space-between;
        }

        .form-row .form-group {
            flex: 0 0 48%;
        }

        .div_deg {
            align-items: center;
            margin-top: 20px;
        }

        th {
            background-color: skyblue;
            color: white;
            font-size: 19px;
            font-weight: bold;
            padding: 15px;
        }

        td {
            text-align: center;
            color: white;
        }

        input[type='search'] {
            width: 500px;
            height: 40px;
            margin-left: 50px;
        }

        .add-to-cart {
            text-align: center;
            font-size: 24px;
            background-color: #f93aa3;
            color: white;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
            font-size: 12px;
            display: block;
            width: 120px;
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <div class="hero_area">
        <!-- header section strats -->
        @include('home.header')
        <!-- end header section -->
    </div>

    <div class="cart-container" style="transform: translateY(-5%);">
        <div class="section clearfix">
            <div class="sixteen columns">
                <h1>Shopping Cart</h1>
                <div class="feature_divider"></div>
            </div>
        </div>
        <div class="cart-header">
            <div class="item-title">ITEM</div>
            <div class="item-price">PRICE</div>
        </div>
        <?php
        $value = 0;
        ?>
        @foreach($cart as $cart)
        <div class="cart-item">
            <div class="item-info">
                <img src="/products/{{$cart->product->image}}" alt="Pink Paradise Tulip Bouquet" class="item-image">
                <div class="item-details">
                    <div class="item-title">{{$cart->product->title}}</div>
                    <div class="item-stems"></div>
                    <a href="{{url('remove_cart',$cart->id)}}"><button class="edit-btn">REMOVE ITEM</button></a>
                </div>
            </div>
            <div class="item-price">{{$cart->product->price}}Dhs</div>
        </div>
        @if($cart->accessory)
        <div class="cart-item" style="border-top: 0;">
            <div class="item-info">
                <img src="/products/{{$cart->accessory->image}}" alt="Pink Paradise Tulip Bouquet" class="item-image">
                <div class="item-details">
                    <div class="item-title">{{$cart->accessory->title}}</div>
                    <div class="item-stems"></div>
                    <a href="{{url('remove_accessory',$cart->id)}}"><button class="edit-btn">REMOVE ITEM</button></a>
                </div>
            </div>
            <div class="item-price">{{$cart->accessory->price}}Dhs</div>
        </div>
        <?php
        $value = $value + $cart->accessory->price; ?>
        @endif
        @if($cart->greeting_card)
        <div class="cart-item" style="border-top: 0;">
            <div class="item-info">
                <img src="/products/{{$cart->greeting_card->image}}" alt="" class="item-image">
                <div class="item-details">
                    <div class="item-title">{{$cart->greeting_card->title}}</div>
                    <div class="item-stems"></div>
                    <a href="{{url('remove_gcard',$cart->id)}}"><button class="edit-btn">REMOVE ITEM</button></a>
                </div>
            </div>
            <div class="item-price">{{$cart->greeting_card->price}}Dhs</div>
        </div>
        <?php
        $value = $value + $cart->greeting_card->price; ?>
        @endif
        <?php
        $value = $value + $cart->product->price;
        ?>
        @endforeach
    </div>
    <div class="checkout-container">
        @if($count > 0)
        <div class="buttons-container">
            <a href="{{url('stripe', $value)}}"><button class="checkout-button" type="submit">Continue</button></a>
        </div>
        @endif
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const selectElement = document.getElementById('categorySelect');
            const displayElement = document.getElementById('itemDisplay');

            selectElement.addEventListener('change', function() {
                const categoryId = selectElement.value;

                if (categoryId) {
                    fetch(`/category/${categoryName}/items`, {
                            headers: {
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                            }
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.message) {
                                displayElement.textContent = data.message;
                            } else {
                                let itemList = '<ul>';
                                data.forEach(item => {
                                    itemList += `<li>${item.name}: ${item.description}</li>`;
                                });
                                itemList += '</ul>';
                                displayElement.innerHTML = itemList;
                            }
                        })
                        .catch(error => {
                            console.error('Error fetching items:', error);
                            displayElement.textContent = 'Error fetching items.';
                        });
                } else {
                    displayElement.textContent = 'Please select a category to view items.';
                }
            });
        });
    </script>


    <!-- info section -->

    @include('home.footer')

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