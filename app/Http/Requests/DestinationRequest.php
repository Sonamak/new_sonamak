<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DestinationRequest extends FormRequest
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
            'thumbnail' => ['required_without:id','dimensions:max_width=1870,max_height=560','image','max:800'],
            'country_name_fr' => 'required',
            'country_name_en' => 'required',
            'caption_in_en' => 'required',
            'caption_in_fr' => 'required'
        ];
    }
}
