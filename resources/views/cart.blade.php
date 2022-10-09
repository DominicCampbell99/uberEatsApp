@extends("layouts.master")
@section("title")
Home Page
@endsection
@section("content")

@if (Session::Has('success'))
    <div class="alert alert-success">
        <ul>
            <li>{!! Session::Get('success') !!}</li>
        </ul>
    </div>
@endif

<h1 class="text-center">Cart</h1>
@if(session("cart"))
<table class="table table-light border">
  <thead>
    <tr>
      <th scope="col">Dish Name</th>
      <th scope="col">Quantity</th>
      <th scope="col">Price</th>
    </tr>
  </thead>
  <tbody>
    
    @foreach(session('cart') as $id => $dish)
      @php
        $total += $dish['price'] * $dish['quantity'];
      @endphp
    <tr>
      <td>{{$dish['name']}}</td>
      <td>{{$dish['quantity']}}</td>
      <td>{{$dish['price']}}</td>
      <td><a class="btn btn-primary" href="{{url("remove/$id")}}">Remove</a></td>
    </tr>
    
    @endforeach
    <tr>
      <td></td>
      <td class="font-weight-bold">Total:</td>
      <td > ${{$total}}</td>
      <td></td>
    </tr>
  <tbody>  
  


</table>
<a class="btn btn-primary" href="{{url('order')}}">Finish Order</a>
@else
<div class="text-center">
  No Items In Cart!
</div>

@endif

<a style="float: right;" class="btn btn-primary" href="{{ url()->previous() }}">Back To Menu</a>

@endsection

