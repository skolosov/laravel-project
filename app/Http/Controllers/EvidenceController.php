<?php

namespace App\Http\Controllers;

use App\Http\Requests\Evidence\EvidenceIndexRequest;
use App\Http\Requests\Evidence\EvidenceShowRequest;
use App\Http\Requests\Evidence\EvidenceStoreRequest;
use App\Http\Requests\Evidence\EvidenceUpdateRequest;
use App\Models\Evidence\Resources\Alcohol;
use App\Models\Evidence\Resources\Drug;
use App\Models\Evidence\Resources\Evidence;
use App\Models\Evidence\Resources\Money;
use App\Models\Evidence\Resources\OtherEvidence;
use App\Models\Evidence\Resources\Transport;
use App\Models\Evidence\Resources\Weapon;
use App\Services\EvidenceService;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;


class EvidenceController extends Controller
{

    public function __construct(private EvidenceService $service)
    {
    }

    /**
     * @param EvidenceIndexRequest $request
     * @return Collection
     */
    public function index(EvidenceIndexRequest $request): Collection
    {
        return $this->service->index(Evidence::class, ['resource'], $request->get('filter'));
    }
    /**
     * @param EvidenceShowRequest $request
     * @param int $id
     * @return Evidence|null
     */
    public function show(EvidenceShowRequest $request, $id): ?Model
    {
        return $this->service->show(Evidence::class, $id, ['resource']);
    }
    /**
     * @param EvidenceStoreRequest $request
     * @return Evidence
     */
    public function store(EvidenceStoreRequest $request): Model
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

    /**
     * @param EvidenceUpdateRequest $request
     * @param int $id
     * @return Evidence
     */
    public function update(EvidenceUpdateRequest $request, int $id): Model
    {
        return $this->service->update(Evidence::class, $id, $request->all(), ['resource']);
    }

    /**
     * @param int $id
     */
    public function destroy(int $id)
    {
        $this->service->destroy(Evidence::class, $id);
    }


}
