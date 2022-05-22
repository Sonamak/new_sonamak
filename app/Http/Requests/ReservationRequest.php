<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReservationRequest extends FormRequest
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
            'dates' => ['required',function ($attribute,$value,$fail) {

                $dateArray =  explode('>',$value);
                

                if ( $dateArray[0] < $dateArray[1] ) {
                    return $fail('The return date must be eariler than department date');
                }

            }],

            'qtyInput' => ['required',function ($attribute,$value,$fail){
                if($value < 1) {
                    return $fail('Guests must be more than 0');
                }
            }],
            'email' => 'required',
            'nationality' => 'required',
            'name' => 'required',
            'telephone' => 'required',
            'tour_id' => 'required'
        ];
    }
}
