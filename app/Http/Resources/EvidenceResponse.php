<?php

namespace App\Http\Resources;

use App\Services\EvidenceService;
use Illuminate\Http\Resources\Json\JsonResource;

class EvidenceResponse extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $data = parent::toArray($request);
        $data['resource_type'] = (new EvidenceService)->getTypeID($data['resource_type']);
        return $data;
    }
}
