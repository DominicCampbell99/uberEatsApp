@extends('layouts.master')
@section('title')
Dishes
@endsection
@section('content')
<h1 class="text-center">{{Auth::user()->profile()->first()->name}} Dishes </h1>
<div class="container">

    
</div><br>

<table class="table table-light border">
  <thead>
    <tr class="text-center">
      <th scope="col">Dish Name</th>
      <th scope="col">Price</th>
      <th scope="col">Current Promotion</th>
      <th scope="col">Adjusted Price</th>
    </tr>
  </thead>
  <tbody>

@foreach ($dishes as $dish)
    <tr class="text-center">
      <td ><a href="{{route("restaurant.show", $dish->id)}}">{{$dish->name}}</a></td>
      <td>${{$dish->price}}</td>
      @if($dish->promotion)
        <td>{{$dish->promotion->discount}} %</td>
        <td>${{$dish->adjustedPrice()}}</td>
      @else
        <td>No Promotion</td>
        <td>${{$dish->price}}</td>
      @endif
      <td><a class="btn btn-primary" href="{{route("restaurant.edit", $dish->id)}}">Edit</a></td>
      <td>
        <form  method="POST" action= '{{route("restaurant.destroy", $dish->id)}}'>
            {{csrf_field()}}
            {{ method_field('DELETE') }}
            <input class="btn btn-primary" type="submit" value="Delete">
        </form>
      </td>
      <td>
      <td><a class="btn btn-primary" href="{{url("promotion/$dish->id")}}">Add Promotion</a></td>
      </td>
      <td><a href="{{url("createPhoto/$dish->id")}}" class="btn btn-secondary">Upload Image</a></td>
    </tr>
@endforeach
<tbody>  
</table>


@endsection