<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductStoreRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name'=>'required|string',
            'cate_id'=>'required|string',
            'brand_id'=>'required|string',
            's_disc'=>'required|string',
            'disc'=>'required|string',
            'o_price'=>'required|string',
            's_price'=>'required|string',
            'image'=>'required',
            'qty'=>'required|string',
            'tax'=>'required|string',
            'meta_title'=>'required|string',
            'meta_disc'=>'required|string',
            'meta_keywords'=>'required|string',
        ];
    }

    public function messages()
    {
        return [
            'name.required'=>'name is required',
            'cate_id.required'=>'category is required',
            's_disc.required'=>'small description is required',
            'disc.required'=>'description is required',
            'o_price.required'=>'orginal price is required',
            's_price.required'=>'sales price is required',
            'image.required'=>'images is required',
            'qty.required'=>'quantaty is required',
            'tax.required'=>'tax is required',
            'meta_title.required'=>'meta title is required',
            'meta_disc.required'=>'meta discription is required',
            'meta_keywords.required'=>'meta keywords is required',
            'name.string'=>'name is string',
            'cate_id.string'=>'category is string',
            's_disc.string'=>'small description is string',
            'disc.string'=>'description is string',
            'o_price.string'=>'orginal price is string',
            's_price.string'=>'sales price is string',
            'qty.string'=>'quantaty is string',
            'tax.string'=>'tax is string',
            'meta_title.string'=>'meta title is string',
            'meta_disc.string'=>'meta discription is string',
            'meta_keywords.string'=>'meta keywords is string',
        ];
    }
}
