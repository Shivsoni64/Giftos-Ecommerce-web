<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
  <center>
        <h3>Customer Name: {{$data ->name}}</h3>
        <h3>Customer Address: {{$data ->address}}</h3>
        <h3>Phone: {{$data ->phone}}</h3>
        <h2>Product Title: {{$data-> Product->title}}</h2>
        <h2>Price: {{$data-> Product->price}}</h2>
        <img src="products/{{$data->product->image}}" alt="" width="150">

  </center>

</body>
</html>