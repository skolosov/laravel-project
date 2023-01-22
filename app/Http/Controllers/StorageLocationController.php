<?php

namespace App\Http\Controllers;

use App\Models\Evidence\Resources\Evidence;
use App\Models\Evidence\StorageLocation;
use App\Models\Evidence\Division;
use Illuminate\Http\Request;

class StorageLocationController extends Controller
{
    public function index()
    {
        $storageLocation = StorageLocation::withCount('evidences')->get();
        //dd($storageLocation);
        return view('storage-location', compact('storageLocation'));
    }

    public function store()
    {
        return view ('storageLocation.store');
    }
}
