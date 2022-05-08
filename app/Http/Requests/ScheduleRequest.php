<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ScheduleRequest extends FormRequest
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
            'schedule.*' => [
                function ( $attribute,$value,$fail ) {

                    if ( ! isset($value['holiday']) ) {

                        if ( empty($value['from']) || empty($value['to']) ) {
                            return $fail('Fill all inputs');
                        }

                    }

                    if ( $value['from'] > $value['to'] ) {
                        return $fail('the from time must be before the end time');
                    }


                }
            ]
        ];
    }
}
