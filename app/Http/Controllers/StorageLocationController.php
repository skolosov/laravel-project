<?php

namespace App\Http\Controllers;

use App\Models\Evidence\StorageLocation;
use App\Models\Evidence\Division;
use App\Services\ReadInterface;
use App\Services\StorageLocationService;
use Illuminate\Http\Request;

class StorageLocationController extends Controller
{
    public ReadInterface $service;

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

    public function create(Request $request)
    {
        return $this->service->create(
            StorageLocation::class
//            [
//                'divisions' => Division::all()->toArray(),
//                'division' => Division::all()->first()->toArray()
//            ]
        );
    }

    public function store(Request $request)
    {
        return $this->service->store(StorageLocation::class, $request->all());
    }

    public function edit(Request $request, int $id)
    {
        return $this->service->edit(StorageLocation::class, $id);
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

//    public function index()
//    {
//        $storageLocation = StorageLocation::withCount('evidences')->orderBy('id')->get();
//        $divisions = Division::all();
//        $division = $divisions->first();
//        return view(
//            'storage-location',
//            [
//                'storageLocation' => $storageLocation,
//                'divisions' => $divisions,
//                'division' => $division->toArray()
//            ]
//        );
//    }
//
//    public function create()
//    {
//        $divisions = Division::all();
//        $division = $divisions->first();
//
//        return view(
//            'storage-location-form',
//            ['divisions' => $divisions->toArray(), 'division' => $division->toArray()]
//        );
//    }
//
//    public function store(Request $request)
//    {
//        //dd($request);
//        $storageLocation = new StorageLocation();
//        $storageLocation->fill($request->all());
//        $storageLocation->save();
//        return redirect(route('storageLocation.index'));
//    }
//
//    public function edit($id)
//    {
//        $storageLocation = StorageLocation::query()->find($id);
//        return view(
//            'storage-location-edit',
//            [
//                'storageLocation' => $storageLocation,
//                'divisions' => Division::all()
//            ]
//        );
//    }
//
//    public function update(Request $request, $id)
//    {
//        $data = [
//            'name' => $request->input('name'),
//            'division_id' => $request->input('division_id')
//        ];
//        StorageLocation::query()->where('id', $id)->update($data);
//        return redirect(route('storageLocation.index'));
//    }
//
//    public function destroy($id)
//    {
//        StorageLocation::destroy($id);
//        return redirect(route('storageLocation.index'));
//    }
}
