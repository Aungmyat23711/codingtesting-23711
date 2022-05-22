<?php

namespace App\Repositories;

use App\Interfaces\EmployeeInterface;
use App\Models\Employee;
use App\Models\Education;
use App\Models\WorkHistory;

class EmployeesRepository implements EmployeeInterface
{
    public function creatingEmployee($employee)
    {
        $employee->headers->set('Content-Type', 'application/json');
        try {
            $data = new Employee;
            $data->name = $employee->name;
            $data->email = $employee->email;
            $data->phone = $employee->phone;
            $data->address = $employee->address;
            $data->dob = $employee->dob;
            $data->position_id = $employee->position_id;
            $data->photo = $employee->photo;
            $data->save();

            foreach ($employee->educations as $edu) {
                $education = new Education();
                $education->degree = $edu['degree'];
                $education->school = $edu['school'];
                $education->employee_id = $data->id;
                $education->save();
            }
            foreach ($employee->work_histories as $wh) {
                $work = new WorkHistory();
                $work->position = $wh['position'];
                $work->company = $wh['company'];
                $work->start_date = $wh['start_date'];
                $work->end_date = $wh['end_date'];
                $work->employee_id = $data->id;
                $work->save();
            }
            return response()->json([
                "data" => $employee->all(),
                "status" => "success",
                "message" => "Employee Created Successfully",
                "status_code" => 200
            ], 200);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json([
                "status" => "error",
                "message" => "Something went wrong",
                "status_code" => 500
            ], 500);
        }
    }

    public function gettingEmployee()
    {
        try {
            $data = Employee::when(request('emp_id'), function ($query) {
                $query->where('id', request('emp_id'));
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
            })->with('position', 'educations', 'workHistories')->paginate(request('paginate'));
            return $data;
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 'error',
                'message' => 'Something went wrong',
                'status_code' => 500
            ], 500);
        }
    }
}
