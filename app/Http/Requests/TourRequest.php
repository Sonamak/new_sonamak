<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use function PHPUnit\Framework\isEmpty;

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
        return [
            'title_en' => ['required'],
            'title_fr' => ['required'],
            'description_en' => ['required','min:2'],
            'description_fr' => ['required','min:2'],
            'itinerary' => [function($attribute,$value,$fail){
                foreach ( $value as $single_value ) {
                   foreach( $single_value as $key => $string ) {
                    if ( ! $string  && $key != 'id') {
                        return $fail('Please fill all input');
                    }
                   }
                }
            }],
            'thumbnail' => ['required_without:id','image','max:500'],
            'background' => ['required_without:id','image','max:500'],
            'location' => ['required_without:id','image','max:500'],
            'include' => [function($attribute,$value,$fail){
                foreach ( $value as $single_value ) {
                    foreach( $single_value as $key => $string ) {
                     if ( ! $string && $key != 'id' ) {
                         return $fail('Please fill all input');
                     }
                    }
                 }
            }] ,

            'gallary' => ['max:3'],

            'gallary.*' => ['image','max:500'],

            'exclude' => [function($attribute,$value,$fail){
                foreach ( $value as $single_value ) {
                    foreach( $single_value as $key => $string ) {
                     if ( ! $string && $key != 'id' ) {
                         return $fail('Please fill all input');
                     }
                    }
                }
            }] 
        ];
    }

    public function messages()
    {
        return [
            'gallary.max' => 'max allowed gallary per one request is 3 you can edit the tour to add more' ,
            '*.max' => 'This file is too big to handle it, please use image with size lower than 800',
        ];
    }
}
