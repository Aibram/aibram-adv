<?php

namespace App\Http\Requests\Website;

use App\Models\ProhibitedWords;
use App\Rules\CheckProhibitedWords;
use Illuminate\Foundation\Http\FormRequest;

class AdvertisementCreate extends FormRequest
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
            'category_id'  =>  'required|exists:categories,id',
            // 'subCategory_id'  =>  'required|exists:categories,id',
            'city_id'  =>  'required|exists:cities,id',
            // 'address'  =>  'required',
            'title'  =>  'required',
            'desc'  =>  ['required', 'string', new CheckProhibitedWords(ProhibitedWords::get()->toArray())],
            // 'photos' => 'required',
            'photos.*' => 'image',
            'photo'  =>  'required|image',
            'properties'  =>  'required|array',
            'properties.*.property' => 'required',
        ];
    }
}
