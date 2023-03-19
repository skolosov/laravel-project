<?php

namespace App\Http\Requests\EvidenceAppearance;

use Illuminate\Foundation\Http\FormRequest;

class EvidenceAppearanceIndexRequest extends FormRequest
{
    public function validationData()
    {
        return $this->only(['filter']);
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
            'filter' => ['array:id,evidence_id'],
            'filter.id' => ['string'],
        ];
    }
}
