<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
            'thumbnail' => 'required',
            'description_en' => 'required',
            'description_fr' => 'required',
            'title_en' => 'required',
            'title_fr' => 'required',
            'price_id' => 'required'
        ];
    }
}
