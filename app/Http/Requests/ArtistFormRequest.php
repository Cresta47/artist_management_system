<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArtistFormRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'dob' => ['required', 'date_format:Y-m-d H:i:s', "before:now" ],
            'gender' => ['required', 'string'],
            'address' => ['required', 'string', 'max:255'],
            'first_release_year' => ['required', "digits:4", "date_format:Y", "before_or_equal:" . date("Y")],
            'no_of_albums_released' => ['required', 'string', 'max:255'],
        ];

        return $rules;
    }
}
