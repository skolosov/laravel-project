<?php

namespace App\Http\Requests\Evidence;

use Illuminate\Foundation\Http\FormRequest;

class EvidenceStoreRequest extends FormRequest
{
    public function validationData()
    {
        return $this->only(['resource_type', 'storage_location_id']);
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
            'resource_type' => ['required', 'int'],
            'storage_location_id' => ['required', 'int'],
        ];
    }
}
