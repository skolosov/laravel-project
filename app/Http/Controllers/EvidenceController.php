<?php

namespace App\Http\Controllers;

use App\Http\Requests\Evidence\EvidenceIndexRequest;
use App\Http\Requests\Evidence\EvidenceShowRequest;
use App\Http\Requests\Evidence\EvidenceStoreRequest;
use App\Http\Requests\Evidence\EvidenceUpdateRequest;
use App\Http\Resources\EvidenceResponse;
use App\Models\Evidence\Resources\Alcohol;
use App\Models\Evidence\Resources\Drug;
use App\Models\Evidence\Resources\Evidence;
use App\Models\Evidence\Resources\Money;
use App\Models\Evidence\Resources\OtherEvidence;
use App\Models\Evidence\Resources\Transport;
use App\Models\Evidence\Resources\Weapon;
use App\Services\EvidenceService;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Js;


class EvidenceController extends Controller
{

    public function __construct(private EvidenceService $service)
    {
    }

    public function types(): AnonymousResourceCollection
    {
        return JsonResource::collection($this->service->getTypes());
//        return new JsonResource($this->service->getTypes());
    }

    /**
     * @param EvidenceIndexRequest $request
     * @return AnonymousResourceCollection
     */
    public function index(EvidenceIndexRequest $request): AnonymousResourceCollection
    {
        return EvidenceResponse::collection(
            $this->service->index(Evidence::class, ['resource'], $request->get('filter'))
        );
    }

    /**
     * @param EvidenceShowRequest $request
     * @param int $id
     * @return \Illuminate\Http\Resources\Json\JsonResource
     */
    public function show(EvidenceShowRequest $request, int $id): JsonResource
    {
        return new EvidenceResponse($this->service->show(Evidence::class, $id, ['resource']));
    }

    /**
     * @param EvidenceStoreRequest $request
     * @return \Illuminate\Http\Resources\Json\JsonResource
     */
    public function store(EvidenceStoreRequest $request): JsonResource
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
        return new EvidenceResponse($evidence);
    }

    /**
     * @param EvidenceUpdateRequest $request
     * @param int $id
     * @return \Illuminate\Http\Resources\Json\JsonResource
     */
    public function update(EvidenceUpdateRequest $request, int $id): JsonResource
    {
        return new EvidenceResponse($this->service->update(Evidence::class, $id, $request->all(), ['resource']));
    }

    /**
     * @param int $id
     */
    public function destroy(int $id)
    {
        $this->service->destroy(Evidence::class, $id);
    }


}
