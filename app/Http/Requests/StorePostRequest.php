<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; // Allow the request
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048', 
            'user_id' => 'required|exists:users,id', 
        ];
    }
    /**
     * Get custom messages for validation errors.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'title.required' => 'The title field is mandatory.',
            'title.max' => 'The title may not exceed 255 characters.',
            'content.required' => 'The content field is mandatory.',
            'content.min' => 'The content must be at least 10 characters long.',
            'image.image' => 'The file must be an image.',
            'image.mimes' => 'The image must be a file of type: jpg, jpeg, png, gif.',
            'image.max' => 'The image may not be greater than 2MB.',
            'user_id.required' => 'The user ID field is mandatory.',
            'user_id.exists' => 'The selected user ID is invalid.',
            'user_id.integer' => 'The user ID must be an integer.',
            'user_id.min' => 'The user ID must be at least 1.',
            'user_id.max' => 'The user ID may not exceed 11 digits.',
            'user_id.regex' => 'The user ID must be a valid integer.',
            'user_id.unique' => 'The user ID has already been taken.',
            'user_id.not_in' => 'The user ID must be a valid integer.',
        ];
    }
}
