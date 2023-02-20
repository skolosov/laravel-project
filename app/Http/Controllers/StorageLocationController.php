<?php

namespace App\Http\Controllers;

use App\Models\Evidence\StorageLocation;
use App\Models\Evidence\Division;
use App\Services\ReadInterface;
use App\Services\StorageLocationService;
use Illuminate\Http\Request;

class StorageLocationController extends Controller
{
    public BaseService $service;

    public function __construct(StorageLocationService $storageLocationService)
    {
        $this->service = $storageLocationService;
    }

    public function index(Request $request)
    {
        return $this->service->index(StorageLocation::class);
    }

    public function show(Request $request, int $id)
    {
        return $this->service->show(StorageLocation::class, $id);
    }

    public function store(Request $request)
    {
        return $this->service->store(StorageLocation::class, $request->all());
    }

    public function update(Request $request, int $id)
    {
        $data = [
            'name' => $request->input('name'),
            'division_id' => $request->input('division_id')
        ];
        return $this->service->update(StorageLocation::class, $id, $data);
    }

    public function destroy(int $id)
    {
        $this->service->destroy(StorageLocation::class, $id);
        return redirect(route('storageLocation.index'));
    }


}
