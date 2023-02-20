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
use App\Services\EvidenceService;
use App\Services\ReadInterface;
use App\Services\WriteInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;


class EvidenceController extends Controller
{
    public BaseService $service;

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

    public function __construct(EvidenceService $evidenceService)
    {
        $this->service = $evidenceService;
    }

    public function index(Request $request, int $storageLocationId)
    {
        return $this->service->index(Evidence::class, ['storage_location_id' => $storageLocationId], ['resource']);
    }

    public function show(Request $request, int $id)
    {
        return $this->service->show(Evidence::class, $id, ['resource']);
    }

    public function store(Request $request, int $storageLocationId)
    {
        $data = $request->all();
        $type = Arr::pull($data, 'resource_type');
        $model = $this->resourcesModels[$type ?? 1]['model_namespace'];
        $resource = $this->service->store($model, $data);
        return $this->service->store(
            Evidence::class,
            [
                'resource_id' => $resource,
                'resource_type' => $model,
                'storage_location_id' => $storageLocationId
            ]
        );
    }

    public function update(Request $request, int $id)
    {
        $data = $request->all();
        return $this->service->edit(Evidence::class, $id, $data);
    }

    public function destroy(int $id)
    {
        $storageLocationId = Evidence::find($id)->only('storage_location_id');
        $this->service->destroy(Evidence::class, $id);
        return redirect(
            route(
                'evidences',
                [
                    'storageLocation' => $storageLocationId['storage_location_id'],
                ]
            )
        );
    }


}
