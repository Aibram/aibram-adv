<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ForgetPasswordRequest extends FormRequest
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
            'mobile'        =>  'required|string|exists:users,mobile',
            'code'          =>  ['required', 'string', Rule::exists('activation_codes', 'code')->where('finished', 0)],
            'password'      =>  ['required', 'string', 'min:8']
        ];
    }

    public function messages()
    {
        return
            [
                'code.exists'    =>  __('validation.exists_cond.code')
            ];
    }
}
