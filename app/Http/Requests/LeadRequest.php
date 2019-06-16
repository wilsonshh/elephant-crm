<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class ProjectRequest
 * @package App\Http\Requests
 */
class LeadRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'value' => ['required', 'integer'],
            'contact_id' => ['required', 'integer'],
            'project_id' => ['required', 'integer'],
        ];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'Name is required!',
            'value.required' => 'Please enter a valid value.',
            'contact_id.required' => 'Please select a contact.',
            'project_id.required' => 'Please select a project. '
        ];
    }
}
