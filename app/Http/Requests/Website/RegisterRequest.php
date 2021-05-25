<?php

namespace App\Http\Requests\Website;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RegisterRequest extends FormRequest
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
            'mobile'        =>  ['required', 'string', Rule::unique('users', 'mobile')->where('ext', $this->get('ext'))],
            'name'          => 'required',
            'agree'          => 'required',
            'city_id'       => 'required|exists:cities,id',
            'age'           => 'required',
            'gender'        => 'required',
            'password'      => 'required|min:8|confirmed',
            // 'photo' => 'required|image|max:2048',
        ];
    }

    public function messages()
    {
        return
            [
                'mobile.unique'  =>  __('validation.exists_cond.mobile')
            ];
    }
}
