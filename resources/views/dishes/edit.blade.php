@extends("layouts.master")
@section("title")
Create Dish
@endsection

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="POST" action='{{url("restaurant/$dish->id")}}'>
        {{csrf_field()}}
        {{ method_field('PUT') }}
        <div>
            <label for="name">Dish Name</label>
            <input type="text" name="name" value="{{$dish->name}}">
        </div>
        <div>
            <label for="price">Price</label>
            <input type="text" name="price" value="{{$dish->price}}">
        </div>
        <div>
            <label for="description">Description</label>
            <textarea type="text" name="description" value="{{$dish->description}}"></textarea>
        </div>
        
        <input type="submit" value="Update"> 
    </form>
@endsection