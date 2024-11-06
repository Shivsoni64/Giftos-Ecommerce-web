<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')

<style>
  h1{
    color:white;
    text-align:center;
  }

  table{
    border:2px solid skyblue;
    text-align:center;
  }
  th{
    background-color: skyblue;
    padding:10px;
    font-size:18px;
    font-weight:bold;
    text-align:center;
    color:white;
  }
  td{
    color:white;
    padding:10px;
    border:1px solid skyblue;
  }
  .div_deg{
    display:flex;
    justify-content:center;
    align-items:center;
  }
</style>
  </head>
  <body>
   <!-- Header   -->
    @include('admin.header')
   
    <!-- Sidebar Navigation-->
     @include('admin/sidebar')
     
      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">
         
          <div class="div_deg">

          <table>
            <tr>
                <th>Customer Name</th>
                <th>Address</th>
                <th>Phone</th>
                <th>Product Title</th>
                <th>Price</th>
                <th>Image</th>
                <th>Status</th>
                <th>Change Status</th>
                <th>Print PDF</th>

            </tr>
            @foreach($data as $data)
            <tr>
                <td>{{$data->name}}</td>
                <td>{{$data->address}}</td>
                <td>{{$data->phone}}</td>
                <td>{{$data->product->title}}</td>
                <td>{{$data->product->price}}</td>
                <td>
                    <img width="150" src="products/{{$data->product->image}}" alt="">
                </td>
                <td>
                  @if($data->status == 'in progress')
                    <span style="color:red;" >{{$data->status}}</span>

                  @elseif($data->status == 'On the way')
                    <span style="color:skyblue;" >{{$data->status}}</span>
                    
                  @else
                    <span >{{$data->status}}</span>
                  @endif

                </td>
                <td>
                  <a class="btn btn-primary" href="{{url('on_the_way',$data->id)}}">On the way</a>
                  <a class="btn btn-success" href="{{url('delivered',$data->id)}}">Delivered</a>

                </td>

                <td>
                  <a class="btn btn-secondary" href="{{url('print_pdf',$data->id)}}">Print PDF</a>
                </td>
            </tr>
            @endforeach
          </table>
            
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