<?php
// app/Http/Requests/EmployeeRequest.php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:100',
            'position' => 'required|string|max:50',
            'salary' => 'required|numeric|min:0',
            'phone' => 'required|string|max:20',
            'hire_date' => 'required|date',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'حقل الاسم مطلوب',
            'position.required' => 'حقل الوظيفة مطلوب',
            'salary.required' => 'حقل الراتب مطلوب',
            'phone.required' => 'حقل الهاتف مطلوب',
            'hire_date.required' => 'حقل تاريخ التعيين مطلوب',
        ];
    }
}
