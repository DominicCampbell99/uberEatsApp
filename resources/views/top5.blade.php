@extends("layouts.master")
@section("title")
Home Page
@endsection
@section("content")
<h1>Top 5 Dishes</h1>
<table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">Dish Name</th>
      <th scope="col">Restaurant</th>
      <th scope="col">Times Ordered</th>
    </tr>
  </thead>
  <tbody>
  @foreach ($top5 as $top)
    <tr>
      <td>{{$top->name}}</td>
      <td>{{$top->restaurant->name}}</td>
      <td>{{$top->purchases_count}}</td>
      

    </tr>
  
  @endforeach
  <tbody>  
 
</table>


    
@endsection