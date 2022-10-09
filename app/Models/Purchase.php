<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'restaurant_id', 'dish_id', 'price', 'delivery_address'];


    function restaurant() {
        return $this->belongsTo('App\Models\Restaurant');
    }

    function dishes() {
        return $this->belongsToMany('App\Models\Dish', 'orders')->withPivot('quantity')->withTimestamps();
    }
    function user() {
        return $this->belongsTo('App\Models\User');
    }
}
