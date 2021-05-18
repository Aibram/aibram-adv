<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UserCreate extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'mobile' => 'required|unique:users',
            'name' => 'required',
            'city_id' => 'required|exists:cities,id',
            'age' => 'required',
            'gender' => 'required',
            'photo' => 'required|image|max:2048',
            'password'      => 'required|min:8',
        ];
    }
}
