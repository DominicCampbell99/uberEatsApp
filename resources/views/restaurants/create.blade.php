@extends("layouts.master")
@section("title")
Create Restaruant
@endsection

@section('content')
    
    <form method="POST" action='{{url("restaurants")}}'>
        {{csrf_field()}}
        
        <label for="name">Restaurant Name</label>
        <p></p><input type="text" name="name" placeholder="Enter Name"></p>
        <input type="submit" value="Create"> </form>
    </form>
@endsection