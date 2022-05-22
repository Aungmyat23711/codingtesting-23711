<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use Illuminate\Http\Request;
use App\Interfaces\EmployeeInterface;

class EmployeeController extends Controller
{
    protected EmployeeInterface $employeeInterface;
    public function __construct(EmployeeInterface $employeeInterface)
    {
        $this->employeeInterface = $employeeInterface;
    }
    public function createEmployee(StoreEmployeeRequest $request)
    {
        return $this->employeeInterface->creatingEmployee($request);
    }
    public function getEmployee()
    {
        return $this->employeeInterface->gettingEmployee();
    }
}
