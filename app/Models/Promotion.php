<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Dish;

class Promotion extends Model
{
    use HasFactory;

    protected $fillable = ['discount', 'dish_id'];

    function dish() {
        return $this->hasOne(Dish::class);
    }

}
