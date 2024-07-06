<h2 class="products-title">Our Favorite Flowers For Summer</h2>
<div class="product-container">
    @foreach($product as $products)
    <div class="product">
        <div class="product-banner">
            <img src="products/{{$products->image}}" alt="">
            <p class="product-badge">15%</p>
        </div>
        <div class="product-details">
            <div class="product-name">
                <h3>{{$products->title}}</h3>
                <p class="product-desc">{{$products->description}}</p>
            </div>
            <a href="{{url('product_details',$products->id)}}"><button class="details-btn">View Details</button></a>
        </div>
        <div class="product-rating">
            <ion-icon name="star"></ion-icon>
            <ion-icon name="star"></ion-icon>
            <ion-icon name="star"></ion-icon>
            <ion-icon name="star"></ion-icon>
            <ion-icon name="star"></ion-icon>
        </div>
        <div class="price-box">
            <del>DH750.00</del>
            <p class="price">DH{{$products->price}}</p>
        </div>
    </div>
    @endforeach
    <!-- Add more products as needed -->
</div>