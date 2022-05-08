<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TourRequest extends FormRequest
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
        // dd($this->all());
        return [
            'title_en' => ['required'],
            'title_fr' => ['required'],
            'description_en' => ['required','min:2'],
            'description_fr' => ['required','min:2'],
            'itinerarires' => ['nullable'],
            'thumbnail' => ['required_without:id']
        ];
    }
}