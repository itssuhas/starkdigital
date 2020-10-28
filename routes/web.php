<?php
use App\Department;
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

Route::get('/', function () {

	$departments = Department::all();
        return view('employee.create',compact('departments'));
});
Auth::routes();
Route::resource('/employee','EmployeeController');

