<!DOCTYPE html>
<html>

<head>
    @include('home.css')
    <style>
        .ccontainer {
            text-align: center;
            margin: 0;
            width: 900px;
            transform: translateY(-15%);
        }

        h1 {
            font-size: 24px;
            margin-bottom: 20px;
        }

        .items {
            display: flex;
            justify-content: start;
            gap: 20px;
            margin-left: 80px;
            margin-top: 30px;
        }

        .item {
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 10px;
            width: 150px;
        }

        .item img {
            max-width: 100%;
            height: auto;
            border-bottom: 1px solid #ddd;
            margin-bottom: 10px;
        }

        .item p {
            margin: 5px 0;
        }

        button {
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 4px;
            padding: 5px 10px;
            cursor: pointer;
        }

        button.selected {
            background-color: #ff6961;
            color: #fff;
            border: none;
        }

        button:hover {
            background-color: #ddd;
        }

        .produit-container {
            display: flex;
            justify-content: center;
            background-color: white;
            padding: 20px;
            transform: translateY(-5%);
        }

        .product-page {
            display: flex;
            justify-content: center;
            background-color: white;
            padding: 20px;

        }

        .product-info {
            margin-left: 30px;
            display: flex;
            flex-direction: column;
        }

        .custom-checkbox input[type="checkbox"] {
            display: none;
        }

        .custom-checkbox {
            display: inline-flex;
            align-items: center;
            cursor: pointer;
            font-size: 25px;

        }

        .custom-checkbox .custom-checkmark {
            width: 16px;
            /* Change this value to set the width */
            height: 16px;
            /* Change this value to set the height */
            background-color: #ccc;
            border-radius: 4px;
            margin-right: 10px;
            position: relative;
            margin-left: 5px;
        }

        .custom-checkbox input[type="checkbox"]:checked+.custom-checkmark {
            background-color: #f93aa3;
        }


        .product-image img {
            max-width: 400px;
            margin-right: 20px;
            margin-left: 15px;
        }

        .product-details {
            display: block;
            width: 800px;
        }

        .addchoklat {
            display: none;
            width: 200px;
            height: 100px;
        }

        .addvas {
            display: none;
            width: 200px;
            height: 100px;

        }

        .addfruits {
            display: none;
            width: 200px;
            height: 100px;

        }

        .addanimal {
            display: none;
            width: 200px;
            height: 100px;

        }

        .slid {
            margin: 10px;
        }

        h1 {
            font-size: 34px;
            margin-bottom: 10px;
            font-weight: lighter;
        }

        .reviews {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }

        .stars {
            color: #f39c12;
            margin-right: 5px;
        }

        .review-count {
            color: #888;
        }

        .price {
            font-size: 24px;
            color: red;
            margin-bottom: 20px;
        }

        .description {
            font-size: 16px;
            color: #555;
            margin-bottom: 20px;
        }

        .size-chart {
            background-color: #f93aa3;
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            font-size: 16px;
        }

        .add-item {
            display: flex;
            flex-direction: column;
            ;
        }

        .form-container {
            width: 90%;
            margin: 20px 0;
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

        .add-to-cart {
            text-align: center;
            font-size: 24px;
            background-color: #f93aa3;
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            font-size: 16px;
            display: block;
            width: 250px;
            margin-top: 10px;
        }

        .additional-options h2 {
            font-size: 18px;
        }

        .additional-options label {
            font-size: 16px;
        }
    </style>
</head>

<body>
    <div class="hero_area">
        <!-- header section strats -->
        @include('home.header')
        <!-- end header section -->
    </div>
    <div class="produit-container">
        <div class="product-page">
            <div class="product-image">
                <img src="/products/{{$data->image}}" alt="">
            </div>
            <div class="product-info">
                <div class="product-details">
                    <h1>{{$data->title}} </h1>
                    <div class="reviews">
                        <span class="stars">★★★★★</span>
                        <span class="review-count">7 reviews</span>
                    </div>
                    <div class="price">{{$data->price}}Dhs</div>
                    <div class="description">
                        <p>Indulge the senses with the <strong>{{$data->title}}</strong> from X. This magnificent gift is
                            guaranteed to captivate anyone lucky enough to receive it. The perfect blend of exquisite flowers,
                            it effortlessly enhances any setting. With a stunning arrangement featuring the elegance of roses
                            and gerbera, your recipient can unwind and enjoy the included champagne, which can be customized or
                            upgraded from our extensive selection. To create an even more unforgettable experience, don't forget
                            to include your recipient's favorite gourmet treats.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div style="display: flex; justify-content: end;">
        <form action="{{url('add_cart', $data->id)}}" method="post">
            @csrf
            <div class="ccontainer">
                <h1>Choose the perfect match for your bouquet</h1>
                <div class="items">
                    @foreach($accessory as $accessory)
                    <div class="item">
                        <img src="/products/{{$accessory->image}}" alt="">
                        <p>{{$accessory->title}}</p>
                        <p>{{$accessory->price}}Dhs</p>
                        <input class="selected" type="radio" value="{{$accessory->id}}" name="accessory">
                    </div>
                    @endforeach
                </div>
                <div class="items">
                    @foreach($gcard as $gcard)
                    <div class="item">
                        <img src="/products/{{$gcard->image}}" alt="">
                        <p>{{$gcard->title}}</p>
                        <p>{{$gcard->price}}Dhs</p>
                        <input class="selected" type="radio" value="{{$gcard->id}}" name="gcard">
                    </div>
                    @endforeach
                </div>
                <div class="form-group" style="margin-left: 80px; margin-top: 30px;">
                    <input type="submit" class="add-to-cart" value="Add to Cart" style="width: 150px;">
                </div>
            </div>
        </form>
    </div>
    <script>
        var checkboxes = [{
                checkbox: document.getElementById("choklat"),
                element: document.getElementById("addchoklat")
            },
            {
                checkbox: document.getElementById("fruits"),
                element: document.getElementById("addfruits")
            },
            {
                checkbox: document.getElementById("balloon"),
                element: document.getElementById("addvas")
            },
            {
                checkbox: document.getElementById("stuffed"),
                element: document.getElementById("addanimal")
            }
        ];

        // Function to toggle the visibility of an element based on the checkbox state
        function toggleVisibility(checkbox, element) {
            if (checkbox.checked) {
                element.style.display = "flex";
            } else {
                element.style.display = "none";
            }
        }

        // Add event listeners to each checkbox
        checkboxes.forEach(function(item) {
            item.checkbox.addEventListener("change", function() {
                toggleVisibility(item.checkbox, item.element);
            });
        });
    </script>

    <!-- info section -->

    @include('home.footer')

</body>

</html>