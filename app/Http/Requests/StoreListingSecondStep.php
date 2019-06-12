<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreListingSecondStep extends FormRequest
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
            'location' => 'required|exists:locations,name',
            'category' => 'required|exists:categories,name',
            'term' => 'required|exists:terms,name',
            'level' => 'required|exists:levels,name',
            'education' => 'required|exists:education,name',
            'salary' => 'required|exists:salaries,name',
        ];
    }
}
