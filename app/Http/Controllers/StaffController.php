<?php

namespace App\Http\Controllers;

use App\Models\Evidence\Department;
use App\Models\Evidence\Post;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    public function create(
    ): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $posts = Post::all();
        $post = $posts->first();
        $departments = Department::all();
        $department = $departments->first();
        //dd($posts, $post, $department, $departments);
        return view(
            'staff-form',
            [
                'posts' => $posts->toArray(),
                'post' => $post->toArray(),
                'departments' => $departments->toArray(),
                'department' => $department->toArray()
            ]
        );
    }
}
