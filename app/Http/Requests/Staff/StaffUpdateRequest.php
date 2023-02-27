<?php

namespace App\Http\Requests\Staff;

use Illuminate\Foundation\Http\FormRequest;

class StaffUpdateRequest extends FormRequest
{
    public function validationData()
    {
        return $this->only(['fio', 'post_id', 'department_id', 'phone']);
    }

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
            'fio' => [ 'string'],
            'post_id' => [ 'int'],
            'department_id' => [ 'int'],
            'phone' => [ 'min:11', 'numeric']
        ];
    }
}
