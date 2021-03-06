<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SetupRequest extends FormRequest
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
            'website_title' => ['required'],
            'website_description' => ['required'],
            'footer_logo' => ['mimes:jpg,png,wepb,svg','image'],
            'header_logo' => ['mimes:jpg,png,wepb,svg','image'],
            'short_logo' => ['mimes:jpg,png,wepb,svg','image'],
        ];
    }
}
