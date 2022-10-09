<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\RestaurantController;
use App\Models\Restaurant;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    ///redirects a logged in user to the appropriate page
    public function index()
    {
        $user = Auth::user();
        if($user->role == 'restaurant') {
            return redirect('restaurantHome');
        } elseif($user->role == 'customer') {
            return redirect('restaurants');
        } 
    }

}
