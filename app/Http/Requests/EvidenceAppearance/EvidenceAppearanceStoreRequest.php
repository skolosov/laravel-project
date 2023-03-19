<?php

namespace App\Http\Requests\EvidenceAppearance;

use Illuminate\Foundation\Http\FormRequest;

class EvidenceAppearanceStoreRequest extends FormRequest
{
    public function validationData(): array
    {
        return $this->only(['evidences_id', 'appearance_id', 'condition']);
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
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
            'evidences_id' => ['required', 'int'],
            'appearance_id' => ['required', 'int'],
            'condition' => ['required', 'string']
        ];
    }
}
