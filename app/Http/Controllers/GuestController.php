<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Restaurant;
use App\Models\Purchase;
use App\Models\Dish;
use Carbon\Carbon;

use Illuminate\Support\Facades\DB;

class GuestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    ///starts a cart and forgets the restaurant in session then displays the restaurants
    public function index()
    {
        session()->forget('cart');
        session()->forget('restaurant');
        $restaurants = Restaurant::paginate(2);
        return view('restaurants.index')->with('restaurants', $restaurants);
    }

    ///shows a shows the dishes in a restaurant 
    public function show($id)
    {
        
        $restaurant = Restaurant::find($id);
        $dishes = Dish::where('restaurant_id', $id)->with('photos')->paginate(2);
        return view('restaurants.show')->with('dishes', $dishes)->with('restaurant', $restaurant);
    } 

    ///get the top 5 dishes
    public function top5(){
        $top5 = Dish::withCount('purchases')->with('purchases')
                ->where('purchases_created_at', '>', now()->subDays(30)->endOfDay())
                ->orderByDesc('purchases_count')
                ->take(5)
                ->get();
        
        return view('top5')->with('top5', $top5);
    }
}
