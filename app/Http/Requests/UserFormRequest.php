<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserFormRequest extends FormRequest
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
        $rules = [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:user'],
            'phone' => ['required', 'string'],
            'dob' => ['required', 'date_format:Y-m-d H:i:s', "before:now"],
            'gender' => ['required', 'string'],
            'address' => ['required', 'string', 'max:255'],
            'password' => "min:8,required_with:confirm_password|same:confirm_password",
            "confirm_password" => "required|min:8",
            "role" => "required"
        ];

        if (in_array($this->method(), ['PUT', 'PATCH'])) {
            $user = $this->route()->parameter('user');


            $rules = [
                'first_name' => ['required', 'string', 'max:255'],
                'last_name' => ['required', 'string', 'max:255'],
                'phone' => ['required', 'string'],
                'dob' => ['required', 'date'],
                'gender' => ['required', 'string'],
                'address' => ['required', 'string', 'max:255'],
                "role" => "required",
                "email" => "required|unique:user,email, " . $user,
            ];

        }
        return $rules;
    }
}
