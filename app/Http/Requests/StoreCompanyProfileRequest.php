<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCompanyProfileRequest extends FormRequest
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
            'name' => 'required|max:255',
            'phone' => 'required|max:255',
            'email' => 'required|email|max:255',
            'website' => 'required|max:255',
            'address' => 'required|max:500',
            'about' => 'required|max:2000',
            'term' => 'accepted',
        ];
    }

    public function messages()
    {
        return [
            'term.required' => 'You must agree to the terms of service'
        ];
    }
}
