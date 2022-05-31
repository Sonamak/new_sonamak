<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProjectRequest extends FormRequest
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
            'title' => ['required'],
            'article' => ['required'],
            'tecnology' => ['required'],
            'coders' => ['required','exists:coders,id'],
            'thumbnail' => Rule::requiredIf( ! $this->id ),
            'banner' => Rule::requiredIf( ! $this->id ),
            'background' => ['required'],
            'service_id' => ['required'],
            'gallary.*' => ['image'],
            'country' => ['required']
        ];
    }
}
