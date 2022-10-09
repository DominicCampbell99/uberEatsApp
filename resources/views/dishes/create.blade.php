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
    <form method="POST" action='{{url('restaurant')}}'>
        {{csrf_field()}}
        <div>
            <label for="name">Dish Name</label>
            <input type="text" name="name" placeholder="">
        </div>
        <div>
            <label for="price">Price</label>
            <input type="text" name="price" placeholder="$">
        </div>
        <div>
            <label for="description">Description</label>
            <textarea type="text" name="description" placeholder=""></textarea
        </div>
        <div>
            <input type="submit" value="Create"> 
        </div>
        
    </form>
@endsection