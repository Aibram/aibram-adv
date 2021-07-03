<?php

namespace App\Http\Requests\Website;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProfile extends FormRequest
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
            'mobile'        =>  ['required', 'string', Rule::unique('users', 'mobile')->where('ext', $this->get('ext'))->ignore(auth()->guard('user')->user()->id, 'id')],
            'city_id'       => 'required|exists:cities,id',
            'name'          => 'required',
            'photo'         => 'nullable|image|max:2048',
        ];
    }
}
