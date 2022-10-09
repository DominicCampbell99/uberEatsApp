@extends('layouts.master')
@section('title')
Products
@endsection
@section('content')
<h1 class="text-center">Restaurants</h1>

@foreach ($restaurants as $restaurant)
<ul style="list-style: none;">
<div class="card" style="width: 18rem;">
  <img class="card-img-top" src="" alt="">
  <div class="card-body">
    <h5 class="card-title">{{$restaurant->name}}</h5>
    <a href="restaurants/{{$restaurant->id}}" class="btn btn-primary">Visit</a>
  </div>
</div>
</ul>
@endforeach

{{ $restaurants->links()}}
@endsection