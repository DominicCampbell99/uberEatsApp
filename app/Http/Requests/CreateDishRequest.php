<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\DishName;
use Illuminate\Support\Facades\Auth;
class CreateDishRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255', new DishName()],
            'price' => ['required', 'numeric', 'gt:0'],
            
        ];
    }
    public function messages(){
        return ['price.gt:0' => 'price must be more than 0'];
    }
}
