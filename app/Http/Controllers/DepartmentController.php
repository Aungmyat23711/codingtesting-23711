<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Http\Requests\StoreDepartmentRequest;
use App\Http\Requests\UpdateDepartmentRequest;
use App\Interfaces\DepartmentInterface;
use Illuminate\Http\Request;




class DepartmentController extends Controller
{
    protected DepartmentInterface $departmentInterface;
    public function __construct(DepartmentInterface $departmentInterface)
    {
        $this->departmentInterface = $departmentInterface;
    }
    public function createDepartment(StoreDepartmentRequest $request)
    {
        return $this->departmentInterface->creatingDepartment($request);
    }
    public function getDepartments()
    {
        return $this->departmentInterface->gettingDepartments();
    }
}
