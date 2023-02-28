<?php


namespace App\Services;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class BaseService
{
    public function index(
        string $model,
        ?array $relations = null,
        ?array $filter = null
    ): Collection {
        /** @var Model $model */
        $builder = $model::query();
        !is_null($relations) && $builder->with($relations);
        if (is_array($filter) && count($filter)) {
            foreach ($filter as $key => $filterValue) {
                $filterData = explode(',', $filterValue);
                $builder->whereIn($key, $filterData);
            }
        }
        return $builder->orderBy('id')->get();
    }

    public function show(
        string $model,
        int $id,
        ?array $relations = null,
    ): ?Model {
        /** @var Model $model */
        $builder = $model::query();
        !is_null($relations) && $builder->with($relations);
        return $builder->find($id);
    }

    public function store(
        string $model,
        array $data,
        ?array $relations = null,
    ): Model {
        /** @var Model $resource */
        $resource = new $model();
        $resource->fill($data);
        $resource->save();
        !is_null($relations) && $resource->load($relations);
        return $resource->refresh();
    }

    public function update(
        string $model,
        int $id,
        array $data,
        ?array $relations = null,
    ): Model {
        /** @var Model $model */
        $resource = $model::query()->findOrFail($id);
        $resource?->fill($data);
        $resource->save();
        !is_null($relations) && $resource->load($relations);
        return $resource->refresh();
    }

    public function destroy(
        string $model,
        int $id,
    ): void {
        /** @var Model $model */
        $model::destroy($id);
    }

}
