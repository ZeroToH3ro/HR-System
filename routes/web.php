<?php

use App\Http\Controllers\PositionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\JobsController;
use App\Http\Controllers\JobHistoryController;
use App\Http\Controllers\JobGradesController;
use App\Http\Controllers\RegionsController;
use App\Http\Controllers\CountriesController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\MyAccountController;
use App\Http\Controllers\PayrollController;
/*
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [AuthController::class, 'index']);
Route::get('forgot-password', [AuthController::class, 'forgot_password']);
Route::get('register', [AuthController::class, 'register']);
Route::post('register_post', [AuthController::class, 'register_post']);
Route::post('checkemail', [AuthController::class, 'CheckEmail']);
Route::post('login_post', [AuthController::class, 'login_post']);

Route::group(['middleware' => ['admin']], function () {
    Route::get('admin/dashboard', [DashboardController::class, 'dashboard']);
    //Employee Route
    Route::get('admin/employees', [EmployeesController::class, 'index']);
    Route::get('admin/employees/add', [EmployeesController::class, 'add']);
    Route::post('admin/employees/add', [EmployeesController::class, 'add_post']);
    Route::get('admin/employees/view/{id}', [EmployeesController::class, 'view']);
    Route::get('admin/employees/edit/{id}', [EmployeesController::class, 'edit']);
    Route::post('admin/employees/edit/{id}', [EmployeesController::class, 'edit_post']);
    Route::get('admin/employees/delete/{id}', [EmployeesController::class, 'delete']);
    //Job Route
    Route::get('admin/jobs', [JobsController::class, 'index']);
    Route::get('admin/jobs/add', [JobsController::class, 'add']);
    Route::post('admin/jobs/add', [JobsController::class, 'add_post']);
    Route::get('admin/jobs/view/{id}', [JobsController::class, 'view']);
    Route::get('admin/jobs/edit/{id}', [JobsController::class, 'edit']);
    Route::post('admin/jobs/edit/{id}', [JobsController::class, 'edit_post']);
    Route::get('admin/jobs/delete/{id}', [JobsController::class, 'delete']);
    Route::get('admin/jobs_export', [JobsController::class, 'jobs_export']);
    //Job History Route
    Route::get('admin/job_history', [JobHistoryController::class, 'index']);
    Route::get('admin/job_history/add', [JobHistoryController::class, 'add']);
    Route::post('admin/job_history/add', [JobHistoryController::class, 'add_post']);
    Route::get('admin/job_history/{id}', [JobHistoryController::class, 'view']);
    Route::get('admin/job_history/edit/{id}', [JobHistoryController::class, 'edit']);
    Route::post('admin/job_history/edit/{id}', [JobHistoryController::class, 'edit_post']);
    Route::get('admin/job_history/delete/{id}', [JobHistoryController::class, 'delete']);
    Route::get('admin/job_history_export', [JobHistoryController::class, 'job_history_export']);
    //Job Grades Route
    Route::get('admin/job_grades', [JobGradesController::class, 'index']);
    Route::get('admin/job_grades/add', [JobGradesController::class, 'add']);
    Route::post('admin/job_grades/add', [JobGradesController::class, 'add_post']);
    Route::get('admin/job_grades/edit/{id}', [JobGradesController::class, 'edit']);
    Route::post('admin/job_grades/edit/{id}', [JobGradesController::class, 'edit_post']);
    Route::get('admin/job_grades/{id}', [JobGradesController::class, 'view']);
    Route::get('admin/job_grades/delete/{id}', [JobGradesController::class, 'delete']);
    //Region
    Route::get('admin/regions', [RegionsController::class, 'index']);
    Route::get('admin/regions/add', [RegionsController::class, 'add']);
    Route::post('admin/regions/add', [RegionsController::class, 'add_post']);
    Route::get('admin/regions/edit/{id}', [RegionsController::class, 'edit']);
    Route::post('admin/regions/edit/{id}', [RegionsController::class, 'edit_post']);
    Route::get('admin/regions/{id}', [RegionsController::class, 'view']);
    Route::get('admin/regions/delete/{id}', [RegionsController::class, 'delete']);
    //Countries
    Route::get('admin/countries', [CountriesController::class, 'index']);
    Route::get('admin/countries/add', [CountriesController::class, 'add']);
    Route::post('admin/countries/add', [CountriesController::class, 'add_post']);
    Route::get('admin/countries/edit/{id}', [CountriesController::class, 'edit']);
    Route::post('admin/countries/edit/{id}', [CountriesController::class, 'edit_post']);
    Route::get('admin/countries/delete/{id}', [CountriesController::class, 'delete']);
    Route::get('admin/countries_export', [CountriesController::class, 'countries_export']);
    //Location
    Route::get('admin/locations', [LocationController::class, 'index']);
    Route::get('admin/locations/add', [LocationController::class, 'add']);
    Route::post('admin/locations/add', [LocationController::class, 'add_post']);
    Route::get('admin/locations/edit/{id}', [LocationController::class, 'edit']);
    Route::post('admin/locations/edit/{id}', [LocationController::class, 'edit_post']);
    Route::get('admin/locations_export', [LocationController::class, 'locations_export']);
    //Departments
    Route::get('admin/departments', [DepartmentController::class, 'index']);
    Route::get('admin/departments/add', [DepartmentController::class, 'add']);
    Route::post('admin/departments/add', [DepartmentController::class, 'add_post']);
    Route::get('admin/departments/edit/{id}', [DepartmentController::class, 'edit']);
    Route::post('admin/departments/edit/{id}', [DepartmentController::class, 'edit_post']);
    Route::get('admin/departments/delete/{id}', [DepartmentController::class, 'delete']);
    Route::get('admin/departments_export', [DepartmentController::class, 'departments_export']);
    //Manager
    Route::get('admin/manager', [ManagerController::class, 'index']);
    Route::get('admin/manager/add', [ManagerController::class, 'add']);
    Route::post('admin/manager/add', [ManagerController::class, 'add_post']);
    Route::get('admin/manager/edit/{id}', [ManagerController::class, 'edit']);
    Route::post('admin/manager/edit/{id}', [ManagerController::class, 'edit_post']);
    Route::get('admin/manager/delete/{id}', [ManagerController::class, 'delete']);
    Route::get('admin/manager_export', [ManagerController::class, 'manager_export']);
    //Account
    Route::get('admin/my_account', [MyAccountController::class, 'my_account']);
    Route::post('admin/my_account', [MyAccountController::class, 'update']);
    //Payroll
    Route::get('admin/payroll', [PayrollController::class, 'index']);
    Route::get('admin/payroll/add', [PayrollController::class, 'add']);
    Route::post('admin/payroll/add', [PayrollController::class, 'add_post']);
    Route::get('admin/payroll/{id}', [PayrollController::class, 'view']);
    Route::get('admin/payroll/edit/{id}', [PayrollController::class, 'edit']);
    Route::post('admin/payroll/edit/{id}', [PayrollController::class, 'edit_post']);
    Route::get('admin/payroll/delete/{id}', [PayrollController::class, 'delete']);
    Route::get('admin/payroll_export', [PayrollController::class, 'payroll_export']);
    //Position
    Route::get('admin/position', [PositionController::class, 'index']);
    Route::get('admin/position/add', [PositionController::class, 'add']);
    Route::post('admin/position/add', [PositionController::class, 'add_post']);
    Route::get('admin/position/edit/{id}', [PositionController::class, 'edit']);
    Route::post('admin/position/edit/{id}', [PositionController::class, 'edit_post']);
    Route::get('admin/position/delete/{id}', [PositionController::class, 'delete']);
    Route::get('admin/position_export', [PositionController::class, 'position_export']);
});


Route::group(['middleware' => 'employee'], function () {
    Route::get('employee/dashboard', [DashboardController::class, 'dashboard']);
    Route::get('employee/my_account', [MyAccountController::class, 'profile']);
    Route::post('employee/my_account', [MyAccountController::class, 'profile_update']);
});
Route::get('logout', [AuthController::class, 'logout']);
