<?php

namespace App\Http\Controllers;

use App\Models\Evidence\Department;
use App\Models\Evidence\Post;
use App\Models\Evidence\Staff;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    public function index()
    {
        $staffs = Staff::all();
        return view(
            'staff',
            [
                'staffs' => $staffs
            ]
        );
    }

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

    public function store(Request $request
    ): \Illuminate\Routing\Redirector|\Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse {
        $post = $request->get('post');;
        $post_find = Post::query()
            ->where('name', $post)
            ->first();
        if (!$post_find) {
            $post_find = Post::query()
                ->create(['name' => $post]);
        }

        $department = $request->get('department');
        $department_find = Department::query()
            ->where('name', $department)
            ->first();
        if (!$department_find) {
            $department_find = Department::query()
                ->create(['name' => $department]);
        }

        $staff = Staff::query()->create(
            [
                'fio' => $request->get('fio'),
                'post_id' => $post_find['id'],
                'department_id' => $department_find['id'],
                'phone' => $request->get('phone')
            ]
        );

        return redirect(route('staff'));
    }
}
