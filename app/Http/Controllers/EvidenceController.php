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

    public function __construct(private EvidenceService $service)
    {
    }

    public function index(Request $request): Collection
    {
        return $this->service->index(Evidence::class, ['resource'], $request->get('filter'));
    }

    public function show(Request $request, $id): ?Model
    {
        return $this->service->show(Evidence::class, $id, ['resource']);
    }

    public function store(Request $request): Model
    {
        $data = $request->all();
        $type = Arr::pull($data, 'resource_type');
        $model = $this->service->getType($type);
        DB::beginTransaction();
        /** @var Alcohol|Drug|Money|Transport|Weapon|OtherEvidence $resource */
        $resource = $this->service->store($model, $data);
        $evidence = $this->service->store(
            Evidence::class,
            [
                'resource_id' => $resource->id,
                'resource_type' => $model,
                'storage_location_id' => $data['storage_location_id'],
            ],
            ['resource'],
        );
        DB::commit();
        return $evidence;
    }

    public function update(Request $request, int $id): Model
    {
        return $this->service->update(Evidence::class, $id, $request->all(), ['resource']);
    }

    public function destroy(int $id)
    {
        $this->service->destroy(Evidence::class, $id);
    }


}
