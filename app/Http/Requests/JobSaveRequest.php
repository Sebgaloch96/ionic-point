<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JobSaveRequest extends FormRequest
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
            'title' => 'required|max:50',
            'description' => 'required',
            'start_date' => 'before:end_date',
            'end_date' => 'after:start_date',
            'address.address_line_1' => 'required',
            'address.country' => 'required',
            'address.county' => 'required',
            'address.city' => 'required',
            'address.postcode' => 'required',
            'address.lat' => 'required_without:address.postcode',
            'address.lng' => 'required_without:address.postcode'
        ];
    }
}
