<?php

namespace App\Http\Controllers;

use App\Models\Evidence\StorageLocation;
use App\Models\Evidence\Division;
use Illuminate\Http\Request;

class StorageLocationController extends Controller
{
    public function index()
    {
        $storageLocation = StorageLocation::withCount('evidences')->orderBy('id')->get();
        $divisions = Division::all();
        return view(
            'storage-location',
            [
                'storageLocation' => $storageLocation,
                'divisions' => $divisions,
            ]
        );
    }

    public function create()
    {
        $divisions = Division::all();
        $division = $divisions->first();

        return view(
            'storage-location-form',
            ['divisions' => $divisions->toArray(), 'division' => $division->toArray()]
        );
    }

    public function store(Request $request)
    {
        //dd($request);
        $storageLocation = new StorageLocation();
        $storageLocation->fill($request->all());
        $storageLocation->save();
        return redirect(route('storageLocation.index'));
    }

    public function edit($id)
    {
        $storageLocation = StorageLocation::query()->find($id);
        return view(
            'storage-location-edit',
            [
                'storageLocation' => $storageLocation,
                'divisions' => Division::all()
            ]
        );
    }

    public function update(Request $request, $id)
    {
        $data = [
            'name' => $request->input('name'),
            'division_id' => $request->input('division_id')
        ];
        StorageLocation::query()->where('id', $id)->update($data);
        return redirect(route('storageLocation.index'));
    }

    public function destroy($id)
    {
        StorageLocation::destroy($id);
        return redirect(route('storageLocation.index'));
    }
}
