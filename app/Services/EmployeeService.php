<?php


namespace App\Services;


use App\Models\Evidence\Department;
use App\Models\Evidence\Post;

class EmployeeService extends BaseService
{
    public function hasPost(string $post): Post
    {
        return Post::firstOrCreate(
            [
                'name' => $post
            ]
        );
    }

    public function hasDepartment(string $department): Department
    {
        return Department::firstOrCreate(
            [
                'name' => $department
            ]
        );
    }
}
