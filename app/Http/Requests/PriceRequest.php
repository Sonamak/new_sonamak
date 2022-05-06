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
            'package' => ['required'],
            'tour_id' => ['required','exists:tours,id'],
            'package.*' => [function($attribute,$value,$fail){
                
                if ( ! $value['usd_price'] || ! $value['cad_price'] || ! $value['eur_price'] || ! $value['season'])  {

                    return $fail("fill all the inputs");

                }

            }]
        ];
    }
}
