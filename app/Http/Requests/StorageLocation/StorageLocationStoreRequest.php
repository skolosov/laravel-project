<?php

namespace App\Http\Requests\StorageLocation;

use Illuminate\Foundation\Http\FormRequest;

class StorageLocationStoreRequest extends FormRequest
{
    public function validationData()
    {
        return $this->only(['division_id', 'name']);
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
            'division_id' => ['required', 'int'],
            'name' => ['required', 'string']
        ];
    }
}
