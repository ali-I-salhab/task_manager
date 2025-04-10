<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProfileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [

            "phone"=>"nullable|string",
            "adress"=> "nullable|sometimes",
            "date_of_birth"=> "nullable|date",
            "bio"=>"string|nullable",
            "image"=>"required|image|mimes:png,jpg,jpeg,gif|max:2048"
        ];
    }
}
