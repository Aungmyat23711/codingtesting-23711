<?php

namespace App\Repositories;

use App\Models\Department;
use App\Interfaces\DepartmentInterface;

class DepartmentsRepository implements DepartmentInterface
{
    public function creatingDepartment($department)
    {
        $department->headers->set('Content-Type', 'application/json');
        try {
            $data = new Department();
            $data->name = $department->name;
            $data->save();
            return response()->json([
                "data" => $department->all(),
                "status" => "success",
                "message" => "Department Created Successfully",
                "status_code" => 200
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                "status" => "error",
                "message" => "Something went wrong",
                "status_code" => 500
            ], 500);
        }
    }

    public function gettingDepartments()
    {
        try {
            $data = Department::when(request('department_id'), function ($query) {
                $query->where('id', request('department_id'));
            })->when(array(request('sortColumn'), request('sortDirection')), function ($query) {
                if (request('sortColumn')) {
                    //if request('sortColumn') is not null
                    $sortColumn = request('sortColumn');
                } else {
                    //else set default value
                    $sortColumn = "id";
                }
                if (request('sortDirection')) {
                    //if request('sortDirection') is not null
                    $sortDirection = request('sortDirection');
                } else {
                    //else set default value
                    $sortDirection = "asc";
                }
                $query->orderBy($sortColumn, $sortDirection);
            })->when(request('limit'), function ($query) {
                $query->limit(request('limit'));
            })->with('positions', 'positions.employees')->paginate(request('paginate'));
            return $data;
        } catch (\Throwable $th) {
            return response()->json([
                "status" => "error",
                "message" => "Something went wrong",
                "status_code" => 500
            ], 500);
        }
    }
}
