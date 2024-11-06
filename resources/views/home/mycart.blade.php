<!DOCTYPE html>
<html>
<head>   
    @include('home.css')

    <style>
        .dev_deg{
            display:flex;
            justify-content:center;
            align-items:center;
            margin:60px;
        }
        table{
            border:2px solid black;
            text-align:center;
            width:800px;
        }
        th{
            border:2px solid black;
            text-align:center;
            color:white;
            font:20px;
            font-weight:bold;
            background-color:black;
        }
        td{
            border:1px solid skyblue;
        }
        .cart_value{
            text-align:center;
            margin-bottom:70px;
            padding:18px;
        }
        .order_deg{
            padding-right:100px;
            margin-top:-30px;
        }
        label{
            display:inline-block;
            width:150px;
        }
        .div_gap{
            padding:20px;

        }

    </style>
</head>

<body>
  <div class="hero_area">

   @include('home.header')

   <div class="dev_deg">

   <div class="order_deg">
    <form action="{{url('confirm_order')}}" method="post">
        @csrf
        <div class="div_gap">
            <label for="">Receiver Name</label>
            <input type="text" name= "name" value="{{Auth::user()->name}}">
        </div>
        <div class="div_gap">
            <label for="">Receiver Address</label>
            <textarea name="address">{{Auth::user()->address}}</textarea>
        </div>
        <div class="div_gap">
            <label for="">Receiver Phone</label>
            <input type="text" name= "phone" value="{{Auth::user()->phone}}">
        </div>
        <div class="div_gap">
            <input class="btn btn-primary" type="submit" value="Place Order">
        </div>
    </form>
   </div>
    <table>
        <tr>
            <th>Product Title</th>
            <th>Price</th>
            <th>Image</th>
            <th>Remove</th>
            
        </tr>

        <?php

        $value= 0;
        ?>
        @foreach($cart as $cart)
        <tr>
            <td>{{$cart->product->title}}</td>
            <td>{{$cart->product->price}}</td>
            <td>
                <img width="150" src="/products/{{$cart->product->image}}" alt="">
            </td>
            <td>
                <a class="btn btn-danger" href="{{url('delete_cart',$cart->id)}}">Remove</a>
            </td>

        </tr>

        <?php
            $value = $value+ $cart->product->price;
        ?>
        @endforeach
    </table>
</div>

<div class="cart_value">
    <h3>Total Value of cart is :{{$value}}</h3>
</div>
 @include('home.footer')
</body>

</html>