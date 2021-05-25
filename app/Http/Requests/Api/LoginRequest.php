<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class LoginRequest extends FormRequest
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
            'ext'           =>  ['required', Rule::exists('countries', 'ext')->whereNull('deleted_at')],
            'mobile'        =>  ['required', 'string', Rule::exists('users', 'mobile')->where('ext', $this->get('ext'))],
            'password'      =>  ['required', 'string', 'min:8'],
        ];
    }

    public function messages()
    {
        return
            [
                'mobile.exists'  =>  __('validation.exists_cond.mobile')
            ];
    }
}
