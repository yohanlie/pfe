<!DOCTYPE html>
<html>

<head>
    @include('home.css')
    <style>
        .ccontainer {
            transform: translateY(-5%);
            width: 80%;
            margin: 20px auto;
            background-color: hsl(353, 100%, 78%);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .profile-section {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .profile-picture {
            width: 80px;
            height: 80px;
            background-color: hsl(0, 0%, 33%);
            border-radius: 50%;
            margin-right: 20px;
        }

        .profile-info h2 {
            margin: 0;
            font-size: 24px;
        }

        .profile-info p {
            margin: 5px 0;
        }

        .status-section {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .status-card {
            display: flex;
            align-items: center;
            background-color: hsl(0, 0%, 33%);
            padding: 10px 20px;
            border-radius: 10px;
            width: 23%;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        }

        .status-icon {
            width: 40px;
            height: 40px;
            margin-right: 10px;
        }

        .delivered {
            background-color: #e0ffe0;
        }

        .shipped {
            background-color: #e0e0ff;
        }

        .processing {
            background-color: #fff0e0;
        }

        .new-orders {
            background-color: #ffe0e0;
        }

        .status-info p {
            margin: 0;
            font-size: 14px;
        }

        .status-info h3 {
            margin: 0;
            font-size: 22px;
        }

        .orders-section h2 {
            margin-bottom: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid hsl(0, 0%, 33%);
        }

        th {
            background-color: hsl(0, 0%, 33%);
        }

        .status-placed {
            color: #fff;
            background-color: hsl(0, 0%, 33%);
            padding: 5px 10px;
            border-radius: 5px;
        }

        .view-icon {
            width: 20px;
            height: 20px;
            background-color: #ccc;
            border-radius: 50%;
            display: inline-block;
        }
    </style>
</head>

<body>
    <div class="hero_area">
        <!-- header section strats -->
        @include('home.header')
        <!-- end header section -->
    </div>
    <!-- end hero area -->

    <div class="ccontainer">
        <div class="profile-section">
            <div class="profile-picture"></div>
            <div class="profile-info">
                <h2>{{$user->name}}</h2>
                <p>Email: <a href="mailto:client@gmail.com">{{$user->email}}</a></p>
                <p>{{$user->phone}}</p>
            </div>
        </div>
        <div class="status-section">
            <div class="status-card">
                <div class="status-icon delivered"></div>
                <div class="status-info">
                    <p>Total Delivered</p>
                    <h3>0</h3>
                </div>
            </div>
            <div class="status-card">
                <div class="status-icon shipped"></div>
                <div class="status-info">
                    <p>Total Shipped</p>
                    <h3>0</h3>
                </div>
            </div>
            <div class="status-card">
                <div class="status-icon processing"></div>
                <div class="status-info">
                    <p>Order Processing</p>
                    <h3>0</h3>
                </div>
            </div>
            <div class="status-card">
                <div class="status-icon new-orders"></div>
                <div class="status-info">
                    <p>New Orders</p>
                    <h3>{{$order_count}}</h3>
                </div>
            </div>
        </div>
        <div class="orders-section">
            <h2>Recent Orders</h2>
            <table>
                <thead>
                    <tr>
                        <th>Placed On</th>
                        <th>Total</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($order as $order)
                    <?php $value = $order->product->price ?>
                    @if($order->accessory)
                    <?php $value += $order->accessory->price ?>
                    @endif
                    @if($order->gcard)
                    <?php $value += $order->gcard->price ?>
                    @endif
                    <tr>
                        <td>{{$order->created_at}}</td>
                        <td>{{$value}}Dhs</td>
                        <td><span class="status-placed">{{$order->package_status}}</span></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!-- info section -->

    @include('home.footer')

</body>

</html>