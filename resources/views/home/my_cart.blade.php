<!DOCTYPE html>
<html>

<head>
    <title>Bread Box | My Cart</title>
    @include('home.css')
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        .div_deg{
            display: flex;
            justify-content: center;
            align-content: center;
            margin: 60px;
        }
        
        table{
            border: 2px solid black;
            text-align: center;
            width: 800px;
        }

        th{
            border: 2px solid black;
            text-align: center;
            color: white;
            font: 20px;
            font-weight: bold;
            background-color: black; 
        }

        td{
            border: 1px solid skyblue;
            padding: 
        }

        .cart_value{
            text-align: center;
            margin-bottom: 70px;
            padding: 18px;
        }

        .order_deg{
            padding-right: 100px;
            margin-top: -50px;
        }

        label{
            display: inline-block;
            width: 150px;
        }

        .div_gap{
            padding: 20px;
        }
    </style>
</head>

<body>
    <div class="hero_area">
        <!-- header section strats -->
        @include('home.header')
        <!-- end header section -->

    </div>


    <div class="div_deg">
        
        <table>
            <tr>
                <th>Product Title</th>
                <th>Price</th>
                <th>Image</th>
                <th>Remove</th>
            </tr>

            <?php
            $value = 0;
            ?>

            @foreach ($carts as $cart)
                
            <tr>
                <td>{{$cart->product->title}}</td>
                <td>{{$cart->product->price}} EGP</td>
                <td><img width="150" height="150" src="/products/{{$cart->product->image}}"></td>
                <td><a class="btn btn-danger" href="{{url('delete_cart', $cart->id)}}">Remove</a></td>
            </tr>
            <?php
            $value = $value + $cart->product->price
            ?>
            @endforeach

        </table>

    </div>

    <div class="cart_value">
        <h3>Total Value of Cart is: {{$value}} EGP</h3>
    </div>
    <div class="order_deg" style="display: flex; justify-content: center; align-items: center;">
        <form action="{{url('confirm_order')}}" method="POST">
            @csrf
            <div class="div_gap">
                <label for="name">Receiver Name</label>
                <input type="text" name="name" value="{{Auth::user()->name}}">
            </div>
            <div class="div_gap">
                <label for="address">Receiver Address</label>
                <textarea name="address" >{{Auth::user()->address}}</textarea>
            </div>
            <div class="div_gap">
                <label for="phone">Receiver Phone</label>
                <input type="text" name="phone" value="{{Auth::user()->phone}}">
            </div>
            <div class="div_gap">
                <input class="btn btn-primary" type="submit" value="Cash on Delivery">
                
                <a class="btn btn-success" href="{{url('stripe', $value)}}">Pay Using Card</a>
            </div>
        </form>
    </div>

    <!-- info section -->

    @include('home.footer')

    <!-- end info section -->




</body>

</html>
