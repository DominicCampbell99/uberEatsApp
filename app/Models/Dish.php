<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Restaurant;
use App\Models\Purchase;
use App\Models\Photo;

class Dish extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'price', 'description', 'restaurant_id',];

    function restaurant() {
        return $this->belongsTo(Restaurant::class);
    }

    function purchases(){
        return $this->belongsToMany(Purchase::class, 'orders')->withPivot('quantity')->withTimestamps();
    }

    function photos(){
        return $this->hasMany(Photo::class);
    }

    function favourites(){
        return $this->belongsToMany(Customer::class, 'favourites');
    }

    function promotion() {
        return $this->hasOne(Promotion::class);
    }

    function adjustedPrice() {
        if($this->promotion){
            return round($this->price - ($this->price * ($this->promotion->discount/100)), 2);
        }
        else {
            return $this->price;
        }
            
    }
}
