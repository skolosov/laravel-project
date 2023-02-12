<?php

namespace App\Http\Controllers;

use App\Models\Evidence\Resources\Alcohol;
use App\Models\Evidence\Resources\Drug;
use App\Models\Evidence\Resources\Evidence;
use App\Models\Evidence\Resources\Money;
use App\Models\Evidence\Resources\OtherEvidence;
use App\Models\Evidence\Resources\Transport;
use App\Models\Evidence\Resources\Weapon;
use App\Models\Evidence\StorageLocation;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class EvidenceController extends Controller
{
    public array $resourcesModels = [
        1 => ['id' => 1, 'name' => 'Алкоголь', 'table_name' => 'alcohols', 'model_namespace' => Alcohol::class],
        2 => ['id' => 2, 'name' => 'Наркотики', 'table_name' => 'drugs', 'model_namespace' => Drug::class],
        3 => ['id' => 3, 'name' => 'Деньги', 'table_name' => 'moneys', 'model_namespace' => Money::class],
        4 => ['id' => 4, 'name' => 'Транспорт', 'table_name' => 'transports', 'model_namespace' => Transport::class],
        5 => ['id' => 5, 'name' => 'Оружие', 'table_name' => 'weapons', 'model_namespace' => Weapon::class],
        6 => [
            'id' => 6,
            'name' => 'Иные вещдоки',
            'table_name' => 'other_evidences',
            'model_namespace' => OtherEvidence::class
        ],
    ];

    public function create(Request $request, int $storageLocationId)
    {
        $evidencesBuilder = Evidence::with('resource');
        $storageLocationId && $evidencesBuilder->where('storage_location_id', $storageLocationId);
        $evidencesArray = $evidencesBuilder->get();
        $type = $request->get('type_evidence');
        return view(
            'evidence',
            [
                'types' => $this->resourcesModels,
                'method' => 'post',
                'type' => $type ?? 1,
                'storageLocations' => StorageLocation::all(),
                'storageLocation' => $storageLocationId,
                'evidencesArray' => $evidencesArray,
            ]
        );
    }

    public function index(Request $request, int $storageLocationId)
    {
        $evidencesBuilder = Evidence::with('resource');
        $storageLocationId && $evidencesBuilder->where('storage_location_id', $storageLocationId);
        $evidencesArray = $evidencesBuilder->get();
        $type = $request->get('type_evidence');

        //$data = $request->all();
        //$type = Arr::pull($data, 'resource_type');
        //$model = $this->resourcesModels[$type]['model_namespace'];
        //$resource = new $model();
        return view(
            'evidence',
            [
                'evidencesArray' => $evidencesArray,
                'storageLocation' => $storageLocationId,
                'types' => $this->resourcesModels,
                'type' => $type ?? 1,
                //'method' => 'post',
                // 'resource_id' => $resource->id,
                //'resource_type' => $model,
            ]
        );
    }

    public function edit(int $storageLocationId, int $id)
    {
        $item = Evidence::query()->with('resource')->find($id);
        $type = Arr::first(
            $this->resourcesModels,
            fn($typeRow) => $typeRow['model_namespace'] === $item->resource_type
        )['id'];
        return view(
            'evidence-edit',
            [
                'method' => 'post',
                'type' => $type ?? 1,
                'evidence' => $item,
                'storageLocation' => $storageLocationId,
            ]
        );
    }

    public function update(Request $request, int $storageLocationId, int $id)
    {
        $data = $request->all();
        $resource = Evidence::query()->find($id)->resource;
        DB::transaction(
            function () use ($resource, $data) {
                $resource->update($data);
                $resource->refresh();
            }
        );


        return redirect(
            route(
                'evidences',
                [
                    'storageLocation' => $storageLocationId,
                ]
            )
        );
    }

    public function destroy(int $storageLocationId, int $id)
    {
        DB::transaction(
            function () use ($id) {
                $item = Evidence::query()->find($id);
                $item->resource()->delete();
                $item->delete();
            }
        );
        return redirect(
            route(
                'evidences',
                [
                    'storageLocation' => $storageLocationId,
                ]
            )
        );
    }

    public function store(Request $request, int $storageLocationId)
    {
        $data = $request->all();
        $type = Arr::pull($data, 'resource_type');
        $model = $this->resourcesModels[$type]['model_namespace'];
        DB::transaction(
            function () use ($model, $data, $storageLocationId) {
                $resource = new $model();
                $resource->fill($data);
                $resource->save();
                $resource->refresh();
                Evidence::query()->create(
                    [
                        'resource_id' => $resource->id,
                        'resource_type' => $model,
                        'storage_location_id' => $storageLocationId
                    ]
                );
            }
        );

        return redirect(
            route(
                'evidences',
                [
                    'storageLocation' => $storageLocationId,
                ]
            )
        );
    }
}
