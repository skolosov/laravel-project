<?php


namespace App\Services;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

interface ReadInterface
{
    public function index(string $model, ?array $parameters = null,?array $relations = null): Collection;

    public function show(string $model, int $id, ?array $relations = null): ?Model;

    public function store(string $model, ?array $data = null): Model;

    public function update(string $model, int $id, ?array $data = null): ?Model;

    public function destroy(string $model, int $id);

}
