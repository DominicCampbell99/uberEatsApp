@extends("layouts.master")
@section("title")
Home Page
@endsection
@section("content")

    <div>
        <a class="nav-item nav-link active" href="{{url("restaurant")}}">Your Dishes<span class="sr-only">(current)</span></a>
        <a class="nav-item nav-link active" href="{{url("orders")}}">Your Orders<span class="sr-only">(current)</span></a>
    </div>

@endsection