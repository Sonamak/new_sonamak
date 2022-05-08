<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\RequiredIf;

class BannerRequest extends FormRequest
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
            'header_text_in_english' => ['required'],
            'header_text_in_french' => ['required'],
            'upper_text_in_english' => Rule::requiredIf(  isset($this->feature_input) ),
            'upper_text_in_french' => Rule::requiredIf(  isset($this->feature_input) ),
            'button_text_in_english' => Rule::requiredIf(  isset($this->feature_input) ),
            'button_text_in_french' => Rule::requiredIf(  isset($this->feature_input) ),
            'redirect' => Rule::requiredIf(  isset($this->feature_input) ),
        ];
    }
}
