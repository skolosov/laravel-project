<?php

namespace App\Http\Controllers;

use App\Models\Evidence\EvidenceType;
use App\Models\Evidence\ReferenceType;
use App\Models\Evidence\Resources\Alcohol;
use App\Models\Evidence\Resources\Drug;
use App\Models\Evidence\Resources\Evidence;
use App\Models\Evidence\Resources\Money;
use App\Models\Evidence\Resources\OtherEvidence;
use App\Models\Evidence\Resources\Transport;
use App\Models\Evidence\Resources\Weapon;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class EvidenceController extends Controller
{
    public array $resourcesModels = [
        1 => Alcohol::class,
        2 => Drug::class,
        3 => Money::class,
        4 => Transport::class,
        5 => Weapon::class,
        6 => OtherEvidence::class,
    ];

    public function create(Request $request)
    {
        $type = $request->get('type_evidence');
        return view(
            'evidence-form',
            ['types' => EvidenceType::all(), 'method' => 'post', 'type' => $type ?? 1]
        );
    }

    public function index()
    {
        return Evidence::with('resource')->get();
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $type = Arr::pull($data, 'resource_type');
        $model = $this->resourcesModels[$type];
        DB::transaction(function () use ($model, $data){
            $resource = new $model();
            $resource->fill($data);
            $resource->save();
            $resource->refresh();
            Evidence::query()->create(['resource_id' => $resource->id, 'resource_type' => $model]);
        });
//        $resource = null;
        // INSERT dump() dd()
        //dump($data);
//        DB::transaction(
//            function () use ($data, &$resource) {
//                $typeName = Arr::pull($data, 'type_name');
//                $resourceType = Arr::pull($data, 'resource_type');
//                /** @var EvidenceType $evidenceType */
//                $evidenceType = EvidenceType::find($resourceType);
//
//                /** @var ReferenceType $referenceType */
//                $referenceType = ReferenceType::query()
//                    ->where('type_name', 'ilike', $typeName)
//                    ->first();
//
//                if (!$referenceType) {
//                    $referenceType = ReferenceType::query()
//                        ->create(['evidence_type_id' => $resourceType, 'type_name' => $typeName]);
//                }
//
//                $data = array_merge($data, ['type' => $referenceType->id]);
//                $resourceClass = $evidenceType->model_namespace;
//                $resource = new $resourceClass();
//                $resource->fill($data);
//                $resource->save();
//                $resource->refresh();
//
//                Evidence::query()->create(
//                    ['resource_id' => $resource->id, 'resource_type' => $resourceType]
//                );
//            }
//        );


        return redirect(route('evidences.create', ['']));
    }
}
