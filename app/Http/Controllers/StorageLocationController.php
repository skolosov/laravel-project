<?php

namespace App\Http\Controllers;

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
     * @param Request $request
     * @return Collection
     */
    public function index(Request $request): Collection
    {
        return $this->service->index(StorageLocation::class);
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
     * @param Request $request
     * @return StorageLocation
     */
    public function store(Request $request): Model
    {
        return $this->service->store(StorageLocation::class, $request->all());
    }

    /**
     * @param Request $request
     * @param int $id
     * @return StorageLocation
     */
    public function update(Request $request, int $id): Model
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
