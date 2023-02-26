<?php

namespace App\Http\Requests\Staff;

use Illuminate\Foundation\Http\FormRequest;

class StaffStoreRequest extends FormRequest
{
    public function validationData()
    {
        return $this->only(['fio', 'post', 'department', 'phone']);
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
            'fio' => ['required', 'string'],
            'post' => ['required', 'string'],
            'department' => ['required', 'string'],
            'phone' => ['required', 'min:11', 'numeric']
        ];
    }
}
