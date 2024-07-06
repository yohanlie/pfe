<header>
    <div class="header-top">
      <div class="container">
        @if (Route::has('login'))
        @auth
        <ul class="header-social-container">
          <li>
            <a href="#" class="social-link" style="background-color: white">
              <ion-icon name="logo-facebook"></ion-icon>
            </a>
          </li>
          <li>
            <a href="#" class="social-link" style="background-color: white">
              <ion-icon name="logo-twitter"></ion-icon>
            </a>
          </li>
          <li>
            <a href="#" class="social-link" style="background-color: white">
              <ion-icon name="logo-instagram"></ion-icon>
            </a>
          </li>
          <li>
            <a href="https://wa.me/+212684018713" class="social-link" style="background-color: white">
              <ion-icon name="logo-whatsapp"></ion-icon>
            </a>
          </li>
        </ul>
        @else
        <ul class="header-social-container">
          <li>
            <a href="#" class="social-link" >
              <ion-icon name="logo-facebook"></ion-icon>
            </a>
          </li>
          <li>
            <a href="#" class="social-link">
              <ion-icon name="logo-twitter"></ion-icon>
            </a>
          </li>
          <li>
            <a href="#" class="social-link">
              <ion-icon name="logo-instagram"></ion-icon>
            </a>
          </li>
          <li>
            <a href="#" class="social-link">
              <ion-icon name="logo-whatsapp"></ion-icon>
            </a>
          </li>
        </ul>
        @endauth
        @endif
        <div class="header-alert-news">
          <p>
            <b>Discover</b>
            our special bouquet designed to pamper yourself!
          </p>
        </div>
        <div class="header-top-actions">
        </div>
      </div>
    </div>
    <div class="header-main">
      <div class="container">
        @if (Route::has('login'))
          @auth
          <div class="header-search-container">
            <a href="{{url('myorders')}}"><button class="search-btn">Track My Orders</button></a>
          </div>
          @else
          <div class="header-search-container">
            <button class="search-btn" style="visibility: hidden; margin-left: 180px;">Track My Orders</button>
          </div>
          @endauth
        @endif
        <a href="/" class="header-logo">
          <div class="brand-text brand-big visible text-uppercase"><strong class="text-primary" style="font-size: 25px;">Flower</strong><strong>shop</strong></div>
        </a>
        <div class="header-user-actions">
          <a class="action-a" href="{{url('support')}}">
            <img src="{{asset('images/headphone-svg.svg')}}" alt="" width="25" height="24">Get help fast
          </a>
          @if (Route::has('login'))
            @auth
            <form method="POST" action="{{ route('logout') }}">
              @csrf
              <button class="action-btn" type="submit">
                <ion-icon name="person-outline"></ion-icon>Logout
              </button>
                <div style="display: inline; position: absolute; top: 60px; right: 340px;">
                  <a href="{{url('mycart')}}" class="action-btn">
                    <ion-icon name="cart-outline" style="width: 30px; height: 30px;"></ion-icon>
                    <span style="background-color: hsl(353, 100%, 78%); color: white; border-radius: 50%; padding: 5px 10px; font-size: 0.8rem; font-weight: bold; text-align: center; line-height: 1;">{{$count}}</span>
                  </a>
                </div>
            </form>
            @else
            <a href="{{url('/login')}}">
              <button class="action-btn" >
                <ion-icon name="person-outline"></ion-icon>Login
              </button>
            </a>
            <a href="{{url('/register')}}">
              <button class="action-btn" >
                <ion-icon name="person-outline"></ion-icon>Register
              </button>
            </a>
            @endauth
          @endif
        </div>
      </div>
    </div>
    <nav class="navbar">
      <ul class="nav-links">
        <li class="dropdown">
          <a href="{{url('allproducts')}}">Bouquets</a>
        </li>
        <li class="dropdown">
          <a href="product.php">Occasions</a>
          <div class="dropdown-content" style="height: 480px; left: -650%;">
            <ul class="content-list">
              @foreach($categories as $category)
              <li style="font-weight: lighter;"><a href="{{url('bycategory', $category->category_name)}}" style="font-size: 15px;">{{$category->category_name}}</a></li>
              </li>
              @endforeach
              <li><a href="{{url('allproducts')}}" style="font-size: 15px;">View All: Occasions</a></li>
            </ul>
            <ul>
              <li style="margin-bottom: 1rem;"><a href="{{url('allproducts')}}">SHOP OUR BESTSELLERS</a></li>
              <li><img src="/products/1719516021.jpeg" alt="" width="170"
                    height="180" style="border-radius: 5px;">
                  <span style="font-weight: lighter; font-size: 14px; margin-top: 1rem;">Classic Love</span>
              </li>
            </ul>
            <ul style="margin-left: 1rem;">
              <li style="margin-bottom: 1rem; visibility: hidden;"><a href="#womens">SHOP OUR BESTSELLERS</a></li>
              <li><img src="/products/1719790601.jpeg" alt="" width="170"
              height="180" style="border-radius: 5px;">
                  <span style="font-weight: lighter; font-size: 14px; margin-top: 1rem;">Classic Love</span>
              </li>
            </ul>
            <ul style="margin-left: 1rem;">
              <li style="margin-bottom: 1rem;"><a href="{{url('allproducts')}}">SHOP OUR RECENT ADDITIONS</a></li>
              <li><img src="/products/1719526150.jpeg" alt="" width="170"
                    height="180" style="border-radius: 5px;">
                  <span style="font-weight: lighter; font-size: 14px; margin-top: 1rem;">Peaceful Caprice</span>
              </li>
            </ul>
            <ul style="transform: translateX(-15%);">
              <li style="margin-bottom: 1rem; visibility: hidden;"><a href="#womens">SHOP OUR BESTSELLERS</a></li>
              <li><img src="/products/1719790701.jpeg" alt="" width="170"
              height="180" style="border-radius: 5px;">
                  <span style="font-weight: lighter; font-size: 14px; margin-top: 1rem;">Peaceful Caprice</span>
              </li>
            </ul>
          </div>
        </li>
        <li class="dropdown">
          <a href="{{url('allaccessories')}}">Accessories</a>
        </li>
        <li class="dropdown">
          <a href="{{url('allgcards')}}">Greeting Cards</a>
        </li>
      </ul>
    </nav>
  </header>
  