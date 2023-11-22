<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class FigureFormRequest extends FormRequest
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
            'name' => 'required|string', // Validate as a required date
            'description' => 'nullable|string', // Validate as a required string
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', 
            'article_url'=> 'nullable|string', 
        ];
    }

}
