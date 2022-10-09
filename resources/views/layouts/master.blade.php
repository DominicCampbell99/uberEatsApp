<!DOCTYPE html>
<html>
<head>
    <title>@yield('title')</title>
    <meta charset="utf-8">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light border">
    <a class="navbar-brand">Oober Eats</a>
    <a class="nav-item nav-link active" href="{{url("restaurants")}}">Restaurants<span class="sr-only">(current)</span></a>
    <a class="nav-item nav-link active" href="{{url("top5")}}">See The Top 5<span class="sr-only">(current)</span></a>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
        <div class="navbar-nav msl-auto">
        
        @auth     <!--- user is logged in --->
            <form class="nav-item nav-link active" method="POST" action= "{{url('/logout')}}">
                {{csrf_field()}}
                <input type="submit" value="Logout">
            </form>
            
        @else <!--- user is not logged in --->
            <a class="nav-item nav-link active" href="{{ route('login') }}">Login<span class="sr-only">(current)</span></a>
            <a class="nav-item nav-link active" href="{{ route('register') }}">Register<span class="sr-only">(current)</span></a>
            
        @endauth
        
        
        </div>
    </div>
    </nav>
    
   
    <div class="container-fluid">
        <div class='row border' style="height: 100vh;">
    @auth
            <div class='col-1.5 bg-light'>
                <nav class="nav flex-column ">
                    <p style="text-align:center" class="nav-item nav-link active">Username: {{Auth::user()->name}} </p>
                    <p style="text-align:center" class="nav-item nav-link active">Role: {{Auth::user()->role}} </p>
                    @if(Auth::user()->role == 'restaurant')
                        <p><a style="text-align:center" class="nav-item nav-link active " href="{{ route('restaurantHome') }}">Home<span class="sr-only">(current)</span></a></p>
                        <p><a style="text-align:center" class="nav-item nav-link active" href="{{url("restaurant")}}">Your Dishes<span class="sr-only">(current)</span></a></p>
                        <p><a style="text-align:center" class="nav-item nav-link active" href="{{route("restaurant.create")}}">Create New Dish</a></p>
                        <p><a style="text-align:center" class="nav-item nav-link active" href="{{url("orders")}}">Your Orders<span class="sr-only">(current)</span></a></p>
                        
                    @endif
                    @if(Auth::user()->role == 'customer')
                        <p><a class="nav-item nav-link active" href="{{url("showFav")}}">Show Favourites<span class="sr-only">(current)</span></a></p>
                    @endif
                </nav>
            </div>
    @endauth    
            <div class="col-10">
                <div class="container">
                    @yield('content')
                </div>  
            </div>
        </div>
    </div>   
   
 
</body>

</html>