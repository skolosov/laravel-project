<?php


namespace App\Services;


use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class BaseService implements ReadInterface, WriteInterface
{
    public function index(string $model, ?array $parameters = null, ?array $relations = null): Collection
    {
        /** @var Builder $builder */
        $builder = $model::query();
        !is_null($parameters) && $builder->where($parameters);
        //dd($builder);
        !is_null($relations) && $builder->with($relations);
        return $builder->get();
    }

    public function show(string $model, int $id, ?array $relations = null): ?Model
    {
        /** @var Builder $builder */
        $builder = $model::query();
        !is_null($relations) && $builder->with($relations);
        return $builder->find($id);
    }

    public function create(string $model, ?array $parameters = null, ?array $relations = null): Model
    {
        /** @var Builder $builder */
        $builder = $model::query();
        !is_null($parameters) && $builder->where($parameters);
        !is_null($relations) && $builder->with($relations);
        return $builder->get();
    }

    public function store(string $model, ?array $data = null): Model
    {
        /** @var Builder $builder */
        $builder = new $model();
        $builder->fill($data);
        return $builder->save()->refresh();
    }

    public function edit(string $model, int $id, ?array $relations = null): ?Model
    {
        /** @var Builder $builder */
        $builder = $model::query();
        !is_null($relations) && $builder->with($relations);
        return $builder->find($id);
    }

    public function update(string $model, int $id, ?array $data = null): ?Model
    {
        /** @var Builder $builder */
        return $model::query()->where('id', $id)->update($data);
    }

    public function destroy(string $model, int $id): int
    {
        /** @var Builder $builder */
        $builder = $model::query()->find($id);
        if ($builder) {
            $model::destroy($id);
            return 1;
        }
        else return 0;
    }

}
