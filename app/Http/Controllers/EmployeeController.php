<?php

namespace App\Http\Controllers;

use App\Http\Requests\Employee\EmployeeIndexRequest;
use App\Http\Requests\Employee\EmployeeStoreRequest;
use App\Http\Requests\Employee\EmployeeUpdateRequest;
use App\Models\Evidence\Employee;
use App\Services\EmployeeService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{
    public function __construct(private EmployeeService $services)
    {
    }

    public function index(EmployeeIndexRequest $request)
    {
        return $this->services->index(Employee::class, ['post', 'department'], $request->get('filter'));
    }

    public function show(Request $request, int $id)
    {
        return $this->services->show(Employee::class, $id, ['post', 'department']);
    }


    public function store(EmployeeStoreRequest $request)
    {
        $data = $request->all();
        DB::beginTransaction();
        $post = $this->services->hasPost($data['post']);
        $department = $this->services->hasDepartment($data['department']);
        $employee = $this->services->store(
            Employee::class,
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
        return $employee;
    }

    public function update(EmployeeUpdateRequest $request, int $id)
    {
        return $this->services->update(Employee::class, $id, $request->all(), ['post', 'department']);
    }

    public function destroy(int $id)
    {
        $this->services->destroy(Employee::class, $id);
    }


}
