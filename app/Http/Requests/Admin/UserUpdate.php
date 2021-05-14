<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserUpdate extends FormRequest
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
            'mobile' => [
                'required',
                Rule::unique('users')->ignore($this->route()->parameter('user'))
            ],
            'username' => [
                'required',
                Rule::unique('users')->ignore($this->route()->parameter('user'))
            ],
            'city_id' => 'required|exists:cities,id',
            'age' => 'required',
            'gender' => 'required',
            'photo' => 'image|max:2048',
            'password'      => 'nullable|min:8',
        ];
    }
}
