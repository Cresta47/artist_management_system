<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MusicFileValidation extends FormRequest
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
            "file" => ["required", "max:5120", "mimetypes:text/csv,text/plain,
                application/csv,text/comma-separated-values,text/anytext,application/octet-stream,application/txt"],
        ];
    }
}
