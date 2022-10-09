<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Dish;
use App\Models\User;

class Photo extends Model
{
    use HasFactory;

    protected $fillable = ['image', 'size', 'dish_id', 'user_id'];

    function dish(){
        return $this->hasOne(Dish::class);
    }
    function user(){
        return $this->belongsTo(User::class);
    }
}
