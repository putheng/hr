<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreListingFromRequest extends FormRequest
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
            'title' => 'required|max:255',
            'description' => 'required|max:1000',
            'requirements' => 'required|max:1000',
            'start_date' => 'required',
            'closing_date' => 'required',
            'location' => 'required|exists:locations,name',
            'category' => 'required|exists:categories,name',
            'term' => 'required|exists:terms,name',
            'level' => 'required|exists:levels,name',
            'education' => 'required|exists:education,name',
            'salary' => 'required|exists:salaries,name',
            'terms_conditions' => 'accepted'
        ];
    }
}
