<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CouponRequest extends FormRequest
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
                    'coupon_title' => ['required', 'string', 'max:255'],
                    'coupon_percentage' => ['required', 'numeric'],
                    'coupon_details' => ['required', 'string'],
                    'coupon_count' => ['required', 'numeric'],
                    'company_id' => ['required', 'numeric'],
                    'category_id' => ['nullable', 'numeric'],
                    'attachment' => ['nullable', 'mimes:jpeg,png,jpg', 'max:10000'],
                ];  
             }
            return [                
                'coupon_title' => ['required', 'string', 'max:255'],
                'coupon_percentage' => ['required', 'numeric'],
                'coupon_details' => ['required', 'string'],
                'coupon_count' => ['required', 'numeric'],
                'company_id' => ['required', 'numeric'],
                'category_id' => ['nullable', 'numeric'],
                'attachment' => ['required', 'mimes:jpeg,png,jpg', 'max:10000'],
            ];
    }
}
