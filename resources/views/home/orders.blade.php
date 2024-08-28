<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bread Box | My Orders</title>

    @include('home.css')
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        .div_center {
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 60px;
        }

        table {
            border: 2px solid black;
            text-align: center;
            width: 800px;
        }

        th {
            border: 2px solid skyblue;
            background-color: black;
            color: white;
            font-size: 19px;
            font-weight: bold;
            text-align: center;
        }

        td {
            border: 1px solid skyblue;
            padding: 10px;
        }
    </style>

</head>

<body>
    <div class="hero_area">
        <!-- header section strats -->
        @include('home.header')

        <div class="div_center">
            <table>
                <tr>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Delivery Status</th>
                    <th>Image</th>
                </tr>

                @foreach ($orders as $order)
                    <tr>
                        <td>{{$order->product->title}}</td>
                        <td>{{$order->product->price}} EGP</td>
                        <td>{{$order->status}}</td>
                        <td>
                            <img style="width: 300px; height: 250px;" src="products/{{$order->product->image}}">
                        </td>
                    </tr>
                @endforeach

            </table>
        </div>
        <div class="div_deg">
            {{ $orders->onEachSide(1)->links() }}
        </div>
    </div>
    @include('home.footer')
</body>

</html>