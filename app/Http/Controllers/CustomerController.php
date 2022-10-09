<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Dish;
use App\Models\Purchase;
use App\Models\Photo;
use App\Models\Customer;
class CustomerController extends Controller
{
    
    ///Link to the page to add a photo to a dish
    public function createPhoto($dish){
        return view('photo.upload')->with('dish', $dish);
    }

    ///function stores the photo as a Photo
    public function storePhoto(Request $request, $id){
        $image_store = request()->file('image')->store('dish_photos', 'public');
        $photo = Photo::create([
            'image' => $image_store,
            'dish_id' => $id,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('restaurants.show', [$id]);
    }

    ///returns a view of the cart with an initiated total of $0
    public function cart()
    {
        $total = 0;
        return view('cart')->with('total', $total);
    }

    ///adds an item to the cart checks if first there is a cart if there is already an item will adjust the number of items in the cart

    public function addToCart($id, $restaurant){
        
        $dish = Dish::find($id);

        $cart = session()->get('cart');
        $current_restaurant = session()->get('restaurant');

        if(!$current_restaurant){
            session()->put('restaurant', $restaurant);
        }
        
        if(!$cart) {
            $cart = [
                    $id => [
                        "name" => $dish->name,
                        "quantity" => 1,
                        "price" => $dish->adjustedPrice(),
                    ]
            ];
            session()->put('cart', $cart);

            return redirect()->back()->with('success', 'Product added to cart successfully!');
        }

        if(isset($cart[$id])){
            $cart[$id]['quantity']++;
            session()->put('cart', $cart);

            return redirect()->back()->with('success', 'Product added to cart successfully!');
        }

        $cart[$id] = [
            "name" => $dish->name,
            "quantity" => 1,
            "price" => $dish->adjustedPrice(),
            
        ];

        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    ///removes an item completely from the cart
    public function remove($id){
        if($id) {
            $cart = session()->get('cart');
            if(isset($cart[$id])) {
                unset($cart[$id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product removed successfully');
        }
        return redirect()->back();
    }

    ///finalises a part and saves the order as a purchase to be shared with the restaurant
    public function order(){
        
        $cart = session()->get('cart');
        $restaurant = session()->get('restaurant');
        $total = 0;
        $dishes = [];
        foreach($cart as $id => $dish){
            $cost = $dish['price'] * $dish['quantity'];
            $total += $cost; 
            
        }
        
        $purchase = Purchase::create([
            'restaurant_id' => $restaurant,
            'price' => $total,
            'delivery_address' => Auth::user()->address,
            'user_id' => Auth::id(),
        ]);

        foreach($cart as $id => $dish){
            $purchase->dishes()->attach($id, array('quantity' => $dish['quantity']));
        }
        return redirect('restaurants');
    }

    ///adds a favourite dish 
    public function addFav($id){
        $user_id = Auth::id();
        $customer = Customer::where('user_id', $user_id)->first();
        $dish = Dish::find($id);
        if(!$customer->favourites->contains($id)){
            $customer->favourites()->attach($dish);
        }else{
            return redirect()->back()->with('success', 'Product was already favourited!');
        }
        
        
        return redirect()->back()->with('success', 'Favourite Added Succesfully!');

    }
    ///shows that favourite dish to the customer
    public function showFav(){
        $user_id = Auth::id();
        $customer = Customer::where('user_id', $user_id)->with('favourites')->first();
        $dishes = $customer->favourites;
        
        return view('showFavs')->with('dishes', $dishes);
        
    }

}
