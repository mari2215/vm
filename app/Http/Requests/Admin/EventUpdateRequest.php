<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class EventUpdateRequest extends FormRequest
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
            'name' => 'required|string',
            'event_date' => 'nullable|date', // Validate as a required date
            'description' => 'required|string', // Validate as a required string
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validate as an optional image (you can adjust the allowed file types and size)
            'photo_description' => 'nullable|string', // Validate as an optional string
            'marker_id' => 'nullable|string', // Validate as a boolean (checkbox)
            'article_url'=> 'nullable|string', 
            'video_url'=> 'nullable|string',
            'figures' => 'nullable|array', // Перевірка, що figures є масивом
            'figures.*' => 'nullable|string' // Перевірка, що кожен елемент figures є рядком
        ];
    }

}
