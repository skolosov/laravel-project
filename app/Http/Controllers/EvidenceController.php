<?php

namespace App\Http\Controllers;

use App\Models\Evidence\Alcohol;
use App\Models\Evidence\Evidence;
use App\Models\Evidence\EvidenceTraffic;
use App\Models\Evidence\EvidenceType;
use App\Models\Evidence\ReferenceType;
use App\Models\Evidence\Weapon;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class EvidenceController extends Controller
{
    public function create(Request $request)
    {
        $type = $request->get('type_evidence');
        return view(
            'evidence-form',
            ['types' => EvidenceType::all(), 'method' => 'post', 'type' => $type ?? 1]
        );
    }

    public $models = [
        'alcohol' => Alcohol::class,
        'weapon' => Weapon::class,
    ];

    public function index()
    {
        //$evidences = Evidence::all();
        $evidences = DB::table('evidences')
            ->leftJoin('evidence_types', 'evidences.resource_type', '=', 'evidence_types.id')
            ->get();
        dump($evidences);
        $evidences1 = Evidence::find(1)->alcohols;
        dump($evidences1);

        $evidence_traffics=Evidence::find(1)->evidence_traffics;
        dd($evidence_traffics);

//        return view('evidence',
//                    ['types' => Evidence::all(), 'method' => 'get']
//        );
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $resource = null;
        // INSERT dump() dd()
        //dump($data);
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

        return redirect(route('evidence-form'));
    }
}
