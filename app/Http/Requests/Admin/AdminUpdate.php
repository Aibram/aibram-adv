<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AdminUpdate extends FormRequest
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
            'email' => [
                'required',
                'email',
                Rule::unique('admins')->ignore($this->route()->parameter('admin'))
            ],
            'username' => [
                'required',
                Rule::unique('admins')->ignore($this->route()->parameter('admin'))
            ],
            'first_name' => 'required',
            'last_name' => 'required',
            'password'      => 'nullable|min:8',
        ];
    }
}
