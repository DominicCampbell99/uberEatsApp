<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Dish;
use App\Models\Purchase;
use App\Models\Photo;
class Restaurant extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'user_id'];

    function dishes() {
        return $this->hasMany(Dish::class);
    }
    
    function user() {
        return $this->hasOne(User::class);
    }

    function orders() {
        return $this->hasMany(Purchase::class);
    }

}
