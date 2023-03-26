<?php

namespace App\Http\Requests\EvidenceAppearance;

use Illuminate\Foundation\Http\FormRequest;

class EvidenceAppearanceStoreRequest extends FormRequest
{
    public function validationData(): array
    {
        return $this->only(['evidence_id', 'appearance_id', 'condition']);
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
        //dd($this);
        return [
            'evidence_id' => ['required|string'],
            'appearance_id' => ['required|string'],
            'condition' => ['required|string']
        ];
    }
}
