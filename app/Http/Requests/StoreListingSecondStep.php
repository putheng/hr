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
            'location' => 'required|exists:locations,id',
            'category' => 'required|exists:categories,id',
            'term' => 'required|exists:terms,id',
            'level' => 'required|exists:levels,id',
            'education' => 'required|exists:education,id',
            'salary' => 'required|exists:salaries,id',
        ];
    }
}
