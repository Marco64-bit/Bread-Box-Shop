<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html;" charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="css/pdf.css">
</head>

<body>
    <table class="w-full">
        <tr>
            <td class="w-half">


                    <img src="images/bread-box.png" alt="bread box" width="45" />
                    <span style="font-size: 35px;">Bread Box</span>


            </td>
            <td class="w-half">
                <h2>Order ID: {{ $data->id }}</h2>
            </td>
        </tr>
    </table>

    <div class="margin-top">
        <table class="w-full">
            <tr>
                <td>
                    <div>
                        <h4>Customer name:</h4>
                    </div>
                    <div>{{ $data->name }}</div>
                    <div>
                        <h4>Customer address:</h4>
                    </div>
                    <div>{{ $data->rec_address }}</div>
                    <div>
                        <h4>Phone:</h4>
                    </div>
                    <div>{{ $data->phone }}</< /div>
                </td>
            </tr>
        </table>
    </div>

    <div class="margin-top">
        <table class="products">
            <tr>
                <th>Product title:</th>
                <th>Image</th>
                <th>Price</th>
            </tr>
            <tr class="items">

                <td>
                    {{ $data->product->title }}
                </td>
                <td>
                    <img height="250" width="300" src="products/{{ $data->product->image }}">
                </td>
                <td>
                    {{ $data->product->price }} EGP
                </td>

            </tr>
        </table>
    </div>

    <div class="footer margin-top">
        <div>Thank you</div>
        <div>&copy; Bread Box</div>
    </div>

</body>

</html>
