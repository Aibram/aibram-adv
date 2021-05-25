<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ResendCodeRequest extends FormRequest
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
            'mobile'  =>  ['required', 'string', Rule::exists('users', 'mobile')],
        ];
    }

    // public function messages()
    // {
    //     return
    //         [
    //             'mobile.exists'  =>  __('validation.exists_cond.mobile')
    //         ];
    // }
}
