<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PriceRequest extends FormRequest
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
            'name_en' => ['required'],
            'name_fr' => ['required'],
            'description_lower_season_en' => ['required'],
            'description_lower_season_fr' => ['required'],
            'description_peak_season_en' => ['required'],
            'description_peak_season_fr' => ['required'],
            'package' => ['required'],
            'tour_id' => ['required','exists:tours,id'],
            'package' => [function($attribute,$value,$fail){
                
                foreach ( $value as $single_value ) {
                    foreach( $single_value as $key => $string ) {
                     if ( ! $string  && $key != 'id') {
                         return $fail('Please fill all input');
                     }
                    }
                 }

            }]
        ];
    }
}
