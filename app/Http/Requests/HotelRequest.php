<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Symfony\Contracts\Service\Attribute\Required;

class HotelRequest extends FormRequest
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
            'thumbnail' => ['required_without:id','image','max:800'],
            'description_en' => 'required',
            'description_fr' => 'required',
            'title_en' => 'required',
            'title_fr' => 'required',
            'price_id' => 'required'
        ];
    }

    public function messages()
    {
        return [
            '*.max' => 'This file is too big to handle it, please use image with size lower than 800'
        ];
    }
}
