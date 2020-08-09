<?php

namespace App\Http\Requests\Recipe;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', 'max:255'],
            'category_id' => ['required', 'exists:categories,id'],
            'description' => ['required', 'max:5000'],
            'ingredients' => ['array'],
            'ingredients.*.name' => ['required', 'string'],
            'ingredients.*.count' => ['required', 'integer'],
            'ingredients.*.unit_id' => ['required', 'exists:units,id'],
        ];
    }
}
