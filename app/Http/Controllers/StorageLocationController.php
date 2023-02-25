<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorageLocation\StorageLocationIndexRequest;
use App\Http\Requests\StorageLocation\StorageLocationStoreRequest;
use App\Http\Requests\StorageLocation\StorageLocationUpdateRequest;
use App\Models\Evidence\StorageLocation;
use App\Services\StorageLocationService;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class StorageLocationController extends Controller
{
    public function __construct(private StorageLocationService $service)
    {
    }

    /**
     * @param StorageLocationIndexRequest $request
     * @return Collection
     */
    public function index(StorageLocationIndexRequest $request): Collection
    {
        return $this->service->index(StorageLocation::class, null, $request->get('filter'));
    }

    /**
     * @param Request $request
     * @param int $id
     * @return StorageLocation|null
     */
    public function show(Request $request, int $id): ?Model
    {
        return $this->service->show(StorageLocation::class, $id);
    }

    /**
     * @param StorageLocationStoreRequest $request
     * @return StorageLocation
     */
    public function store(StorageLocationStoreRequest $request): Model
    {
        //dd($request->all());
        return $this->service->store(StorageLocation::class, $request->all());
    }

    /**
     * @param StorageLocationUpdateRequest $request
     * @param int $id
     * @return StorageLocation
     */
    public function update(StorageLocationUpdateRequest $request, int $id): Model
    {
        return $this->service->update(StorageLocation::class, $id, $request->all());
    }

    /**
     * @param int $id
     */
    public function destroy(int $id): void
    {
        $this->service->destroy(StorageLocation::class, $id);
    }


}
