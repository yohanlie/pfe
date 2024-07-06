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
                <li><a href="{{url('delivery/dashboard')}}"> <i class="icon-home"></i>Home </a></li>
                <li><a href="{{url('view_orders_delivery')}}"> <i class="icon-grid"></i>Orders </a></li>
        </ul>
      </nav>