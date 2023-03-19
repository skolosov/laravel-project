<?php

namespace App\Http\Requests\EvidenceAppearance;

use Illuminate\Foundation\Http\FormRequest;

class EvidenceAppearanceStoreRequest extends FormRequest
{
    public function validationData()
    {
        return $this->only(['evidences_id', 'appearance_id', 'condition']);
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
            'evidences_id' => ['required', 'string'],
            'appearance_id' => ['required', 'string'],
            'condition' => ['required', 'string']
        ];
    }
}
