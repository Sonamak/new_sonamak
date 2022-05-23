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
            'itinerarires' => ['nullable'],
            'thumbnail' => ['required_without:id','dimensions:max_width=500,max_height=500','image','max:800'],
            'background' => ['required_without:id','dimensions:max_width=1870,max_height=560','image','max:800'],
            'location' => ['required_without:id',':max_width=500,max_height=500','image','max:800'],
            'include.*' => [function($attribute,$value,$fail){
                if ( empty($value['value_en']) || empty($value['value_fr']) )  {
                    return $fail('Fill all inputs');
                }
            }] ,

            'gallary' => ['max:3'],

            'gallary.*' => ['image','max:800','dimensions:max_width=500,max_height=500'],

            'exclude.*' => [function($attribute,$value,$fail){
                if ( empty($value['value_en']) || empty($value['value_fr']) )  {
                    return $fail('Fill all inputs');
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
