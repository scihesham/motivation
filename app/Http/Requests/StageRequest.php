<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StageRequest extends FormRequest
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
         if($this->method()=="PATCH"){
            return [
                'title' => ['required', 'string', 'max:255'],
                'starts' => ['required', 'string'],
                'ordering' => ['required', 'integer'],
            ];  
         }
        return [
                'title' => ['required', 'string', 'max:255'],
                'starts' => ['required', 'string'],
        ];
    }
}
