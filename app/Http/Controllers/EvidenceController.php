<?php

namespace App\Http\Controllers;

use App\Models\Evidence\Evidence;
use App\Models\Evidence\EvidenceType;
use App\Models\Evidence\ReferenceType;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class EvidenceController extends Controller
{

    public function store(Request $request)
    {
        $data = $request->all();
        $resource = null;
        // INSERT dump() dd()
        DB::transaction(
            function () use ($data, &$resource) {
                $typeName = Arr::pull($data, 'type_name');
                $resourceType = Arr::pull($data, 'resource_type');

                /** @var EvidenceType $evidenceType */
                $evidenceType = EvidenceType::find($resourceType);

                /** @var ReferenceType $referenceType */
                $referenceType = ReferenceType::query()
                    ->where('type_name', 'ilike', $typeName)
                    ->first();

                if (!$referenceType) {
                    $referenceType = ReferenceType::query()
                        ->create(['evidence_type_id' => $resourceType, 'type_name' => $typeName]);
                }

                $data = array_merge($data, ['type' => $referenceType->id]);
                $resourceClass = $evidenceType->model_namespace;
                $resource = new $resourceClass();
                $resource->fill($data);
                $resource->save();
                $resource->refresh();

                Evidence::query()->create(
                    ['resource_id' => $resource->id, 'resource_type' => $resourceType]
                );
            }
        );

        return $resource;
    }
}
