<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class ContactRequest
 * @package App\Http\Requests
 */
class ContactRequest extends FormRequest
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
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'job_title' => 'required',
            'profile_image' => 'required|image',
            'gender' => 'required',
        ];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'Name is required!',
            'phone.required' => 'Phone number is required!',
            'email.required' => 'Email is required!',
            'job_title.required' => 'Job title number is required!',
            'profile_image.required' => 'Profile image is required! ',
            'gender.required' => 'Gender is required! '
        ];
    }
}
