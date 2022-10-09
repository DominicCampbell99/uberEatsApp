<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Restaurant;
use App\Models\Dish;
use App\Models\Purchase;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CreateDishRequest;
use App\Rules\DishName;
use App\Models\Promotion;

class RestaurantController extends Controller
{
    
/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $restaurant = Auth::user()->profile()->first();
        $dishes = Restaurant::find($restaurant->id)->dishes;
        return view('dishes.index')->with('dishes', $dishes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dishes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateDishRequest $request)
    {
        $restaurant = Auth::user()->profile()->first();

        $dish = Dish::create([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'restaurant_id' => $restaurant->id,
        ]);

        return redirect('restaurant');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dish = Dish::find($id);
        return view('dishes.show')->with('dish', $dish);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dish = Dish::find($id);
        return view('dishes.edit')->with('dish', $dish);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'price' => ['required', 'numeric', 'gt:0'],
            
        ]);
 
        $dish = Dish::find($id);
        $dish->name = $request->name;
        $dish->price = $request->price;
        $dish->description = $request->description;
        $dish->update();

        return redirect('restaurant');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Dish::destroy($id);
        return redirect('restaurant');
    }

    ///shows all the orders for the users restaurant
    public function showOrders()
    {    
        $user = Auth::user()->profile()->first()->id;
        $orders = Purchase::Where('restaurant_id', $user)
                    ->with('dishes')
                    ->get();
        return view('orders')->with('orders', $orders);
    }

    ///display the promotion form for a dish 
    public function promotion($dish)
    {   
        return view('promotion')->with('dish', $dish);
       
    }

    ///add the Promotion to dish
    public function addPromotion(Request $request, $dish)
    {   
        $request->validate([
            'discount' => ['nullable', 'numeric', 'between:0,100'], 
        ],
        [
            'discount.between' => 'number needs to be between 0 and 100!',
            'discount.numeric' => 'The input needs to be a number!'
        ]);
        Promotion::where('dish_id',$dish)->delete();
        if($request->discount != 0){
            $promotion = Promotion::create([
                'discount' => $request->discount,
                'dish_id' => $dish
            ]); 
        }
                
        return redirect('restaurant');
       
    }
}
