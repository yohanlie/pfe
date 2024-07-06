<!DOCTYPE html>
<html>
  <head> 
    @include('commercial.css')
    <style>
        .order-details {
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

h2 {
    margin-top: 0;
}

.order-status {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 20px;
}

.order-status select,
.download-invoice {
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
}

.download-invoice {
    background-color: #28a745;
    color: #fff;
    cursor: pointer;
    border: none;
}

.customer-info,
.gift-card-message,
.shipping-address,
.payment-details {
    margin-bottom: 20px;
}

.customer-info p,
.shipping-address p,
.payment-method p,
.logistic p {
    margin: 5px 0;
}

.gift-card-message textarea {
    width: 100%;
    height: 100px;
    border: 1px solid #ccc;
    border-radius: 4px;
    padding: 10px;
}

.order-summary {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 20px;
}

.order-summary th,
.order-summary td {
    border: 1px solid #ccc;
    padding: 10px;
    text-align: left;
}

.payment-details {
    display: flex;
    justify-content: space-between;
}

.payment-method,
.logistic,
.order-totals {
    width: 30%;
}

.order-totals p {
    margin: 5px 0;
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
          <div class="order-details">
        <h2>Order Details</h2>
        <div class="order-status">
            <p>Payment Status: {{$data->payment_status}}</p>
            <p>Package Status: {{$data->package_status}}</p>
        </div>
        <div class="customer-info">
            <h3>Sender Info</h3>
            <p>Name: {{$data->send_name}}</p>
            <p>Phone: {{$data->user->phone}}</p>
            <p>Email: {{$data->user->email}}</p>
        </div>
        <div class="customer-info">
            <h3>Receiver Info</h3>
            <p>Name: {{$data->rec_name}}</p>
            <p>Phone: {{$data->phone}}</p>
        </div>
        <div class="shipping-address">
            <h3>Shipping Address</h3>
            <p>{{$data->rec_address}}</p>
        </div>
        <table class="order-summary">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Bouquet</th>
                    <th>Price</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{$data->product_id}}</td>
                    <td>
                        <img src="/products/{{$data->product->image}}" width="30px" height="30px">
                        {{$data->product->title}}
                    </td>
                    <td>{{$data->product->price}}Dhs</td>
                </tr>
            </tbody>
        </table>
        <?php $value = $data->product->price ?>
        @if($data->accessory)
            <?php $value += $data->accessory->price ?>
            <table class="order-summary">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Accessory</th>
                        <th>Price</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{$data->accessory_id}}</td>
                        <td>
                            <img src="/products/{{$data->accessory->image}}" width="30px" height="30px">
                            {{$data->accessory->title}}
                        </td>
                        <td>{{$data->accessory->price}}Dhs</td>
                    </tr>
                </tbody>
            </table>
        @endif
        @if($data->gcard)
            <?php $value += $data->gcard->price ?>
            <table class="order-summary">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Greeting Card</th>
                        <th>Price</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{$data->gcard_id}}</td>
                        <td>
                            <img src="/products/{{$data->gcard->image}}" width="30px" height="30px">
                            {{$data->gcard->title}}
                        </td>
                        <td>{{$data->gcard->price}}Dhs</td>
                    </tr>
                </tbody>
            </table>
        @endif
        <div class="payment-details">
            <div class="payment-method">
                <h3>Payment Method</h3>
                <p>Stripe</p>
            </div>
            <div class="logistic">
                <h3>Logistic</h3>
                <p>DHL Morocco</p>
            </div>
            <div class="order-totals">
                <h3>Order Totals</h3>
                <p>Grand Total: {{$value}}Dhs</p>
            </div>
            </div>
        </div>
          </div>
      </div>
    </div>
    <!-- JavaScript files-->
    <script src="{{asset('admincss/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('admincss/vendor/popper.js/umd/popper.min.js')}}"> </script>
    <script src="{{asset('admincss/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('admincss/vendor/jquery.cookie/jquery.cookie.js')}}"> </script>
    <script src="{{asset('admincss/vendor/chart.js/Chart.min.js')}}"></script>
    <script src="{{asset('admincss/vendor/jquery-validation/jquery.validate.min.js')}}"></script>
    <script src="{{asset('admincss/js/charts-home.js')}}"></script>
    <script src="{{asset('admincss/js/front.js')}}"></script>
  </body>
</html>