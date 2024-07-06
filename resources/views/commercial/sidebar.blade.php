<nav id="sidebar">
        <!-- Sidebar Header-->
        <div class="sidebar-header d-flex align-items-center">
          <div class="avatar"><img src="" class="img-fluid rounded-circle"></div>
          <div class="title">
            <h1 class="h5">{{$current_user->name}}</h1>
            <p>{{$current_user->usertype}}</p>
          </div>
        </div>
        <!-- Sidebar Navidation Menus--><span class="heading">Main</span>
        <ul class="list-unstyled">
                <li><a href="{{url('commercial/dashboard')}}"> <i class="icon-home"></i>Home </a></li>
                <li><a href="{{url('view_orders_commercial')}}"> <i class="icon-grid"></i>Orders </a></li>
                <li><a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="icon-windows"></i>Products </a>
                  <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
                    <li><a href="{{url('add_product_commercial')}}">Add Product</a></li>
                    <li><a href="{{url('view_product_commercial')}}">View Product</a></li>
                  </ul>
                </li>
                <li><a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="icon-windows"></i>Accessories </a>
                  <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
                    <li><a href="{{url('add_accessory')}}">Add Accessory</a></li>
                    <li><a href="{{url('view_accessory')}}">View Accessory</a></li>
                  </ul>
                </li>
                <li><a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="icon-windows"></i>Greeting Cards </a>
                  <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
                    <li><a href="{{url('add_gcard')}}">Add Greeting Card</a></li>
                    <li><a href="{{url('view_gcard')}}">View Greeting Card</a></li>
                  </ul>
                </li>
        </ul>
      </nav>