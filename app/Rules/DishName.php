<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Models\Restaurant;
use Illuminate\Support\Facades\Auth;
class DishName implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {

        $res = true;
        $restaurant = Auth::user()->profile()->first()->id;
        $current_dishes = Restaurant::find($restaurant)->dishes;
        
        foreach($current_dishes as $dish){
            if($dish->name == $value){
                $res = false;
            }
        }
        return $res;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'That Dish Name already exists!';
    }
}
