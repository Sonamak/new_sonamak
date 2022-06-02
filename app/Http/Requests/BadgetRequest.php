<?php

namespace App\Http\Requests;

use App\Models\Badget;
use Illuminate\Foundation\Http\FormRequest;

class BadgetRequest extends FormRequest
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
            'type' => ['required',function($attribute,$value,$fail){

                if ( $value == 'clush' ) {

                    $clush_is_not_unique = Badget::where('type','clush')->count();

                    if ( $clush_is_not_unique ) 
                        return $fail('Remove old clush first');
                }

            }],
            'thumbnail' => 'required'
        ];
    }
}
