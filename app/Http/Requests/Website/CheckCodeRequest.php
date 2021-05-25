<?php

namespace App\Http\Requests\Website;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CheckCodeRequest extends FormRequest
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
        return
            [
                'code'  =>  ['required', 'string', Rule::exists('activation_codes', 'code')->where('finished', 0)]
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
