@extends("layouts.master")
@section("title")
Home Page
@endsection
@section("content")
<h1 class="text-center">Upload a Photo</h1>
<br><div class="container">
    <form method="POST" action="{{url("storePhoto/$dish")}}" enctype="multipart/form-data">
    {{csrf_field()}} 

        <p><input type="file" name="image"></p>   
        <input type="submit" value="Create">  
    </form>
</div>

@endsection