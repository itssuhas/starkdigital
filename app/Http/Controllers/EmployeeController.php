<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use App\Employee;
use App\Department;
use DB;
class EmployeeController extends Controller
{

     // start show Employee Part

    public function index()
    {
			$blogs =DB::table('employees')
                ->join('departments', 'employees.dept', '=', 'departments.id')
                ->select('departments.*','employees.*')
                ->get();
            $average = DB::table('employees')
                    ->join('departments', 'employees.dept', '=', 'departments.id')
                     ->select(DB::raw('AVG(employees.salary) as average,departments.dept_name'))
                     ->groupBy('employees.dept')
                     ->groupBy('departments.dept_name')
                     ->get();
            $minsalary = DB::table('employees')
                        ->join('departments', 'employees.dept', '=', 'departments.id')
                        ->select(DB::raw('MIN(employees.salary) as min,departments.dept_name'))
                        ->groupBy('employees.dept')
                        ->groupBy('departments.dept_name')
                        ->get();
            $maxsalary = DB::table('employees')
                        ->join('departments', 'employees.dept', '=', 'departments.id')
                        ->select(DB::raw('MAX(employees.salary) as max,departments.dept_name'))
                        ->groupBy('employees.dept')
                        ->groupBy('departments.dept_name')
                        ->get();

         return view('employee.index',compact('blogs','average','minsalary','maxsalary'))->with('i',(request()->input('page',1)-1)*5);
    }

     // end show Employee Part

     // start show Employee form

    public function create()
    {

        $departments = Department::all();
        return view('employee.create',compact('departments'));
    }

     // end show Employee form

     // start add  Employee Part

    public function store(Request $request)
    {
        $request->validate([

            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'salary' => 'required',
            'dept' => 'required',

        ]);
  
$employees = new Employee;  
$employees->name=$request->name;
$employees->email=$request->email;
$employees->phone=$request->phone;
$employees->salary=$request->salary;
$employees->dept=$request->dept;
$employees->save();  
 

        return redirect()->route('employee.index')
                        ->with('success','Employee created successfully.');
    }
     // end add  Employee Part

     // start destroy Employee Part

    public function destroy(Employee $employee)
    {
        $employee->delete();
  
        return redirect()->route('employee.index')
                        ->with('success','Employee deleted successfully');
    }
     // end destroy Employee Part



    // start show Employee edit form

    public function edit(Employee $employee)
    {
    	$departments = Department::all();
        return view('employee.edit',compact('departments','employee'));
    }


     // end show Employee edit form


    // start update Employee edit data

    public function update(Request $request, Employee $employee)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone'=>'required',
            'salary'=>'required',
            'dept'=>'required',

        ]);
  

        $user=$employee->update($request->all());
  

        return redirect()->route('employee.index')
                        ->with('success','Employee updated successfully');
    }

    // end update Employee edit data
}
