<?php

namespace App\Http\Controllers;

use App\Models\Evidence\Resources\Alcohol;
use App\Models\Evidence\Resources\Drug;
use App\Models\Evidence\Resources\Evidence;
use App\Models\Evidence\Resources\Money;
use App\Models\Evidence\Resources\OtherEvidence;
use App\Models\Evidence\Resources\Transport;
use App\Models\Evidence\Resources\Weapon;
use App\Services\EvidenceService;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
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

    public function __construct(private EvidenceService $service)
    {
    }

    public function index(Request $request, int $storageLocationId): Collection
    {
        return $this->service->index(Evidence::class, ['resource'], [$storageLocationId]);
    }

    public function show(Request $request, int $storageLocationId, $id): ?Model
    {
        return $this->service->show(Evidence::class, $id, ['resource'], [$storageLocationId]);
    }

    public function store(Request $request, int $storageLocationId): Model
    {
        $data = $request->all();
        $type = Arr::pull($data, 'resource_type');
        $model = $this->resourcesModels[$type ?? 1]['model_namespace'];
        DB::beginTransaction();
        $resource = $this->service->store($model, $data);
        $evidence = $this->service->store(
            Evidence::class,
            [
                'resource_id' => $resource->id,
                'resource_type' => $model,
                'storage_location_id' => $storageLocationId
            ],
            ['resource'],
        );
        DB::commit();
        return $evidence;
    }

    public function update(Request $request, int $storageLocationId, int $id): Model
    {
        return $this->service->update(Evidence::class, $id, $request->all(), ['resource']);
    }

    public function destroy(int $storageLocationId, int $id)
    {
        $this->service->destroy(Evidence::class, $id);
    }


}
