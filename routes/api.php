<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\PositionController;

use App\Models\Employee;
use App\Models\Department;

use Illuminate\Support\Facades\DB;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/department', [DepartmentController::class, 'createDepartment']);
Route::post('/position', [PositionController::class, 'createPosition']);
Route::post('/employee', [EmployeeController::class, 'createEmployee']);
Route::get('/getEmployees', [EmployeeController::class, 'getEmployee']);
Route::get('/getDepartments', [DepartmentController::class, 'getDepartments']);
