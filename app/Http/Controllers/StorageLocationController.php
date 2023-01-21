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
        return view(
            'storage-location-form',
            [
                'storageLocation' => StorageLocation::withCount('evidences')->get()
                //'divisions' => StorageLocation::with('division')->get(),
                //'storageLocationEvidencesCount' => StorageLocation::with('evidences')->get()->count()
            ]
        );
    }
}
