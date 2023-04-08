<?php

namespace App\Http\Requests\EvidenceTraffic;

use Illuminate\Foundation\Http\FormRequest;

class EvidenceTrafficShowRequest extends FormRequest
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
            'filter' => ['array:id,from_storage_location_id,to_storage_location_id,evidence_id,employee_id'],
            'filter.id' => ['string'],
            'filter.evidence_id' => ['string'],
            'filter.from_storage_location_id' => ['string'],
            'filter.to_storage_location_id' => ['string'],
            'filter.employee_id' => ['string']
        ];
    }
}
