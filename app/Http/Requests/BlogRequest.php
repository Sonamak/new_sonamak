<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogRequest extends FormRequest
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
            'thumbnail' => ['required_without:id','dimensions:max_width=500,max_height=500','image','max:800'],
            'background' => ['required_without:id','dimensions:max_width=1870,max_height=560','image','max:800'],
            'article_in_en' => ['required'],
            'article_in_fr' => ['required'],
            'title_en' => ['required'],
            'title_fr' => ['required'],
            'language' => ['required']
        ];
    }
}
