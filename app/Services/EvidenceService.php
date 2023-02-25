<?php


namespace App\Services;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class EvidenceService extends BaseService
{
    public function index(
        string $model,
        ?array $relations = null,
        ?array $extends = null
    ): Collection {
        [$storageLocationId] = $extends;
        /** @var Model $model */
        $builder = $model::query();
        !is_null($relations) && $builder->with($relations);
        $builder->where('storage_location_id', $storageLocationId);
        return $builder->get();
    }

    public function show(
        string $model,
        int $id,
        ?array $relations = null,
        ?array $extends = null
    ): ?Model {
        [$storageLocationId] = $extends;
        /** @var Model $model */
        $builder = $model::query();
        !is_null($relations) && $builder->with($relations);
        $builder->where('storage_location_id', $storageLocationId);
        return $builder->find($id);
    }
}
