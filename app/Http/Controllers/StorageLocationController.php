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
//        $posts = App\Post::withCount('comments')->get(); foreach ($posts as $post) { echo $post->comments_count; }
//        $count=StorageLocation::all();
        //dd($count->evidences);
//        $users = User::withCount(['posts', 'comments'])->get();
//        return view('users', compact('users'));
        $storageLocation = StorageLocation::withCount('evidences')->get();
        //dd($storageLocation);
        return view('storage-location', compact('storageLocation'));
//        return view(
//            'storage-location',
//            [
//                'storageLocation' => StorageLocation::with('evidences')->get()
//                //'divisions' => StorageLocation::with('division')->get(),
//                //'storageLocationEvidencesCount' => StorageLocation::with('evidences')->get()->count()
//            ]
//        );
    }
}
