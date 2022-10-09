@extends('layouts.master')
@section('title')
Restaruants
@endsection
@section('content')
@auth
@if(Auth::user()->role == 'customer')
  <h1 class="float-right"><a class="nav-item nav-link active " href="{{url("cart")}}"> Cart
    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
    <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
    </svg>
    <span class="sr-only">(current)</span></a></h1>                       
@endif
@endauth
<br><h1 style="text-align:center">{{$restaurant->name}}</h1><br>
@if (Session::Has('success'))
    <div class="alert alert-success">
        <ul>
            <li>{!! Session::Get('success') !!}</li>
        </ul>
    </div>
@endif

<ul>
@foreach ($dishes as $dish)

<ul style="list-style: none;">
<div class="card">
  <div class="card-body">
    <div class="row">
        <div class="col">
          <h3 class="card-title">{{$dish->name}}</h3>
          <p class="card-text">{{$dish->description}}</p>

          @if($dish->promotion)
            <p><del>${{$dish->price}}</del> Discount: {{$dish->promotion->discount}}%</p>
            <p>${{$dish->adjustedPrice()}}</p>
          @else
            
            <p>${{$dish->price}}</p>
          @endif
        </div>
        <div class="col">
        <h4>Photos</h4>
        @foreach($dish->photos as $photos)
          <img src="{{url($photos->image)}}" alt="" style="width:150px;height:150px;">
          <p>Photo By: {{$photos->user->name}}</p>
        @endforeach
        
        </div>
        <div class="col">
          <ul style="list-style: none;">
          <li><a href="{{url("addToCart/$dish->id/$restaurant->id")}}" class="btn btn-secondary">Add to Cart</a></li><br>
          <li><a href="{{url("createPhoto/$dish->id")}}" class="btn btn-secondary">Upload Image</a></li><br>
          <li><a href="{{url("addFav/$dish->id")}}" class="btn btn-secondary">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star" viewBox="0 0 16 16">
            <path d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z"/>
          </svg>
          </a></li><br>
          </ul>
        </div>
    </div>
   
  </div>
    
</div>
</ul><br>
@endforeach



{{ $dishes->links()}}
@endsection