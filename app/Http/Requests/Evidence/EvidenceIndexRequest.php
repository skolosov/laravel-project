<?php

namespace App\Http\Requests\Evidence;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EvidenceIndexRequest extends FormRequest
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
            'filter' => ['array:id,storage_location_id,evidence_id'],
            'filter.id' => ['string'],
            'filter.evidence_id' => ['string'],
            'filter.storage_location_id' => ['string'],
        ];
    }
}
