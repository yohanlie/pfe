<!DOCTYPE html>
<html>
  <head> 
    @include('commercial.css')
    <style>
        .div_deg{
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 60px;
        }
        .table_deg{
            border: 2px solid ;
        }
        th{
            background-color: skyblue;
            color: white;
            font-size: 19px;
            font-weight: bold;
            padding: 15px;
        }
        td{
            font-size: 14px;
            border: 1px solid skyblue;
            text-align: center;
            color: white;
        }
        input[type='search']{
          width: 500px;
          height: 40px;
          margin-left: 50px;
        }
    </style>
  </head>
  <body>
    @include('commercial.header')
    <div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation-->
      @include('commercial.sidebar')
      <!-- Sidebar Navigation end-->
      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">
            <div class="div_deg">
                <table class="table_deg">
                    <tr>
                        <th>ID</th>
                        <th>Pay_Status</th>
                        <th>Placed On</th>
                        <th>Pack_Status</th>
                        <th>Change Status</th>
                        <th>Order Details</th>
                        <th>Available D_Men</th>
                    </tr>
                    @foreach($data as $data)
                    <tr>
                        <td>{{$data->id}}</td>
                        <td>{{$data->payment_status}}</td>
                        <td>{{$data->created_at}}</td>
                        <td>{{$data->package_status}}</td>
                        <td>
                            <a href="{{url('on_delivery_commercial',$data->id)}}" class="btn btn-primary" style="font-size: 14px;">On Delivery</a>
                        </td>
                        <td>
                            <a href="{{url('order_details_commercial',$data->id)}}" class="btn btn-secondary">View Details</a>
                        </td>
                        <td>
                            <form action="{{url('add_delivery', $data->id)}}" method="post">
                                @csrf
                                <select name="delivery" id="" style="margin-top: 10px; margin-bottom: 10px;">
                                    @foreach($delivery as $deliverys)
                                    <option value="{{$deliverys->id}}">{{$deliverys->name}}</option>
                                    @endforeach
                                </select> <br>
                                <input type="submit" value="assign" style="margin-bottom: 10px;">
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
            <div class="div_deg"></div>
          </div>
      </div>
    </div>
    <!-- JavaScript files-->
    <script type="text/javascript">
        function confirmation(ev)
        {
            ev.preventDefault();

            var urlToRedirect = ev.currentTarget.getAttribute('href');

            console.log(urlToRedirect);

            swal({
                title:"Are You Sure You Want To Delete This!",
                text:"This delete will be permanent",
                icon:"warning",
                buttons:true,
                dangerMode:true,
            })

            .then((willCancel)=>{
                if(willCancel)
                {
                    window.location.href = urlToRedirect;
                }
            })
        }
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{asset('admincss/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('admincss/vendor/popper.js/umd/popper.min.js')}}"> </script>
    <script src="{{asset('admincss/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('admincss/vendor/jquery.cookie/jquery.cookie.js')}}"> </script>
    <script src="{{asset('admincss/vendor/chart.js/Chart.min.js')}}"></script>
    <script src="{{asset('admincss/vendor/jquery-validation/jquery.validate.min.js')}}"></script>
    <script src="{{asset('admincss/js/charts-home.js')}}"></script>
    <script src="{{asset('admincss/js/front.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  </body>
</html>