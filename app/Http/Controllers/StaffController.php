<?php

namespace App\Http\Controllers;

use App\Http\Requests\Staff\StaffIndexRequest;
use App\Http\Requests\Staff\StaffStoreRequest;
use App\Http\Requests\Staff\StaffUpdateRequest;
use App\Models\Evidence\Staff;
use App\Services\StaffService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StaffController extends Controller
{
    public function __construct(private StaffService $services)
    {
    }

    public function index(StaffIndexRequest $request)
    {
        return $this->services->index(Staff::class, ['post', 'department'], $request->get('filter'));
    }

    public function show(Request $request, int $id)
    {
        return $this->services->show(Staff::class, $id, ['post', 'department']);
    }


    public function store(StaffStoreRequest $request)
    {
        $data = $request->all();
        DB::beginTransaction();
        $post = $this->services->hasPost($data['post']);
        $department = $this->services->hasDepartment($data['department']);
        $staff = $this->services->store(
            Staff::class,
            array_merge(
                $data,
                [
                    'post_id' => $post->id,
                    'department_id' => $department->id,
                ]
            ),
            ['post', 'department']
        );
        DB::commit();
        return $staff;
    }

    public function update(StaffUpdateRequest $request, int $id)
    {
        return $this->services->update(Staff::class, $id, $request->all(), ['post', 'department']);
    }

    public function destroy(int $id)
    {
        $this->services->destroy(Staff::class,$id);
    }


}
