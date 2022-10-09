@extends("layouts.master")
@section("title")
Favourite Dishes
@endsection
@section("content")
<h1 >Orders</h1>
<table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">Favourite Dish</th>
      
    </tr>
  </thead>
  @if(!empty($dishes->first()))
  <tbody>
  
    @foreach ($dishes as $dish)
      <tr>
        <td>{{$dish->name}}</td>
      </tr>
    @endforeach
  </tbody>
</table>
  @else
    <h5>You haven't added any favourites yet!</h5>
  @endif

@endsection