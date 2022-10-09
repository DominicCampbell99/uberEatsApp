@extends("layouts.master")
@section("title")
Create Restaruant
@endsection

@section('content')
    <div class='container'>
    <form method="POST" action="{{url("purchase/$dish->id")}}">
        {{csrf_field()}}
        <ul style="list-style-type: none;">
            <li>Dish: {{$dish->name}}</li>
            <li>Price: {{$dish->price}}</li>
            <li>Description: {{$dish->description}}</li>
        </ul>
        
        <div>
            <label for="address">Price</label>
            <input type="text" name="address" value="{{Auth::user()->address}}">
        </div>
        <input type="submit" value="Purchase"> </form>
    </form>
    </div>
    
@endsection