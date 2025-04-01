<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTaskRequest extends FormRequest
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
            "tit" =>"sometimes|string|min:5|max:10",
            "des" => "nullable|string",
            "prio" => "sometimes|integer|min:1|max:5"
        ];
    }
    public function messages(): array
    {
        return [
          "tit.string"=> "يجب ان يكون نص ",
          "tit.max"=>" يجب ان يكون اصغر من 10 محارف  "
            ];





        }

}
