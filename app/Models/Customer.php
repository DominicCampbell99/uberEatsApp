<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'user_id'];

    function user() {
        return $this->hasOne(User::class);
    }
    function favourites(){
        return $this->belongsToMany(Dish::class, 'favourites', 'customer_id', 'dish_id');
    }
}
