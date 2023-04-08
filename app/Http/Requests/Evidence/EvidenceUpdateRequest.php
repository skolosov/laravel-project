<?php

namespace App\Http\Requests\Evidence;

use Illuminate\Foundation\Http\FormRequest;

class EvidenceUpdateRequest extends FormRequest
{
    public function validationData()
    {
        return $this->only(['resource_id', 'resource_type', 'storage_location_id']);
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
            'resource_id' => [ 'int'],
            'resource_type' => [ 'int'],
            'storage_location_id' => [ 'int'],
        ];
    }
}
