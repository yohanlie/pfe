<!DOCTYPE html>
<html>

<head>
    @include('home.css')
</head>

<body>
    <div class="hero_area">
        <!-- header section strats -->
        @include('home.header')
        <!-- end header section -->
    </div>
    <!-- end hero area -->
    <div style="display: flex; justify-content: center; transform: translateY(-90%);">
        <h1>Fresh flowers and unique gifts for spring!</h1>
    </div>
    <div class="container" style="margin: 0; display: flex; justify-content: start;">
        <div class="sidebar" style="width: 240px; border-right: 1px solid black; margin-bottom: 2rem;">
            <div class="occasions">
                <div style="border: 1px solid black; width: 150px; margin-left: 4rem; height: 40px; display: flex; justify-content: center; align-items: center; border-radius: 5px; margin-bottom: 1.5rem;">
                    <h2 style="font-size: 1rem;">Occasions</h2>
                </div>
                <ul style="text-align: start; margin-left: 4rem;">
                    @foreach($categories as $category)
                    <li style="font-size: 1rem; font-weight: lighter; margin-bottom: 0.5rem;">
                        <a href="{{url('bycategory', $category->category_name)}}" style="color: black;">
                            {{$category->category_name}}
                        </a>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="product-container" style="width: 1100px;margin-left: 2rem; gap: 20px;">
            @foreach($products as $product)
            <div class="product" style="width: 305px; border-radius: 10px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">
                <div class="product-banner">
                    <img src="/products/{{$product->image}}" alt="Subtle Freshness" style="height: 247px; width: 247px; border-radius: 10px;">
                    <p class="product-badge">15%</p>
                </div>
                <div class="product-details">
                    <div class="product-name">
                        <h3>{{$product->title}}</h3>
                        <p class="product-desc">{{$product->description}}</p>
                    </div>
                    <a href="{{url('product_details',$product->id)}}">
                        <button class="details-btn">View Details</button>
                    </a>
                </div>
                <div class="product-rating">
                    <ion-icon name="star"></ion-icon>
                    <ion-icon name="star"></ion-icon>
                    <ion-icon name="star"></ion-icon>
                    <ion-icon name="star"></ion-icon>
                    <ion-icon name="star"></ion-icon>
                </div>
                <div class="price-box">
                    <del>{{$product->price + 80}}Dhs</del>
                    <p class="price">{{$product->price}}Dhs</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <!-- info section -->

    @include('home.footer')

</body>

</html>