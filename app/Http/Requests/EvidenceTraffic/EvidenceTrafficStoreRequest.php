<?php

namespace App\Http\Requests\EvidenceTraffic;

use Illuminate\Foundation\Http\FormRequest;

class EvidenceTrafficStoreRequest extends FormRequest
{
    public function validationData()
    {
        return $this->only(
            [
                'evidence_id',
                'decision_id',
                'decision_date',
                'from_storage_id',
                'to_storage_id',
                'delivered',
                'employee_id',
                'doc_number',
                'doc_date'
            ]
        );
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
        //dd($this->request);
        return [
            'evidence_id' => ['required', 'int'],
            'decision_id' => ['required', 'int'],
            'decision_date' => ['required', 'date'],
            'from_storage_id' => ['int'],
            'to_storage_id' => ['int'],
            'delivered' => ['required', 'bool'],
            'employee_id' => ['required', 'int'],
            'doc_number' => ['int'],
            'doc_date' => ['date']
        ];
    }
}
