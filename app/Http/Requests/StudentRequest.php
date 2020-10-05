<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest
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
            'std_name' => 'required',
            'std_father_name' => 'required',
            'std_mother_name' => 'required',
            'dept_name' => 'required',
            'blood_group' => 'required',
            'std_birth_date' => 'required',
        ];
    }

    public function message()
    {
        return [
            'std_name.required' => 'Student Name Required',
            'std_father_name.required' => 'Student Father Required',
            'std_mother_name.required' => 'Student Mother Required',
            'dept_name.required' => 'Department Name Required',
            'blood_group.required' => 'Blood Group Required',
            'std_birth_date.required' => 'Birth Date Required',

        ];
    }
}
