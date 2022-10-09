@extends("layouts.master")
@section("title")
Create Promotion
@endsection
@section('content')
<h1>Add a Discount</h1>
<br>
<p>If you want to remove a discount submit the discount as 0</p>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
   
<form method="POST" action='{{url("addPromotion/$dish")}}'>
        {{csrf_field()}}
        <div>
            <label for="discount">Discount Percentage</label>
            <input type="text" name="discount"> %</input>
            
        </div>
        
        <input class="btn btn-primary" type="submit" value="Submit"> 
    </form>
@endsection