<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @include('home.css')

    <style>
        .div_deg{
            display:flex;
            justify-content:center;
            align-items:center;
            margin: 60px;
        }
        table{
            border:2px solid black;
            text-align:center;
            width:800px;
        }
        th{
            background-color: black;
            color:white;
            font-size: 19px;
            font-weight:bold;
            text-align:center;
        }
        td{
            border:2px solid black;
            padding:10px;
        }
    </style>
</head>
<body>
    @include('home.header')

    
    <div class="div_deg">
        <table>
            <tr>
                <th>Product Name</th>
                <th>Price</th>
                <th>Delivery Status</th>
                <th>Image</th>
            </tr>
            @foreach($order as $order)
            <tr>
                <td>{{$order-> product->title}}</td>
                <td>{{$order-> product->price}}</td>
                <td>{{$order-> status}}</td>
                <td>
                    <img wigth="150" src="products/{{$order->product->image}}" alt="">
                </td>

            </tr>

            @endforeach
        </table>
    </div>

    @include('home.footer')

</body>
</html>