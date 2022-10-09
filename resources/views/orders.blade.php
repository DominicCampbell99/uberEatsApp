@extends("layouts.master")
@section("title")
Home Page
@endsection
@section("content")
<h1>Orders</h1>
<table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">Date</th>
      <th scope="col">Dish Name</th>
      <th scope="col">Ordered By</th>
      <th scope="col">Address</th>
      <th scope="col">Price</th>
    </tr>
  </thead>
  <tbody>
  @foreach ($orders as $order)
    <tr>
      <td>{{$order->created_at}}</td>
      <td>
      @foreach($order->dishes as $dish)
          <li>{{$dish->name}} x {{$dish->pivot->quantity}}</li>
          
      @endforeach
      </td>
      <td>{{$order->user->name}}</td>
      <td>{{$order->user->address}}</td>
      <td>{{$order->price}}</td>
    </tr>
  
  @endforeach
    
 
</table>


    
@endsection