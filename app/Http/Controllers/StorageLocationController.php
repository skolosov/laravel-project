<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorageLocation\StorageLocationIndexRequest;
use App\Http\Requests\StorageLocation\StorageLocationStoreRequest;
use App\Http\Requests\StorageLocation\StorageLocationUpdateRequest;
use App\Http\Resources\StorageLocationResponse;
use App\Models\Evidence\StorageLocation;
use App\Services\StorageLocationService;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;

class StorageLocationController extends Controller
{
    public function __construct(private StorageLocationService $service)
    {
    }

    /**
     * @param StorageLocationIndexRequest $request
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index(StorageLocationIndexRequest $request): AnonymousResourceCollection
    {
        return StorageLocationResponse::collection(
            $this->service->index(StorageLocation::class, null, $request->get('filter'))
        );
    }

    /**
     * @param Request $request
     * @param int $id
     * @return \App\Http\Resources\StorageLocationResponse
     */
    public function show(Request $request, int $id): StorageLocationResponse
    {
        return new StorageLocationResponse($this->service->show(StorageLocation::class, $id));
    }

    /**
     * @param StorageLocationStoreRequest $request
     * @return \App\Http\Resources\StorageLocationResponse
     */
    public function store(StorageLocationStoreRequest $request): StorageLocationResponse
    {
        return new StorageLocationResponse($this->service->store(StorageLocation::class, $request->all()));
    }

    /**
     * @param StorageLocationUpdateRequest $request
     * @param int $id
     * @return \App\Http\Resources\StorageLocationResponse
     */
    public function update(StorageLocationUpdateRequest $request, int $id): StorageLocationResponse
    {
        return new StorageLocationResponse($this->service->update(StorageLocation::class, $id, $request->all()));
    }

    /**
     * @param int $id
     */
    public function destroy(int $id): void
    {
        $this->service->destroy(StorageLocation::class, $id);
    }


}
