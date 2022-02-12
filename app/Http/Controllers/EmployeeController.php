<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;

class EmployeeController extends Controller
{
    /* function to show employee list view */
    public function index()
    {
        $employees = Employee::latest()->paginate(5);
        return view('employee.index',compact('employees'));
    }

    /* function load create employee view */
    public function create()
    {
        return view('employee.create');
    }

    /* function to create new employee */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => ['required', 'regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,8}$/ix'],
            'phone'=> 'required',
            'current_route' => 'required',
            'joined_date' => 'required',
            'comments' => 'required'
        ]);

        Employee::create($request->all());
        return redirect()->route('employee.index')->with('success','Employee created successfully.');
    }

    /* function to get update employee view*/
    public function edit(Employee $employee)
    {
        return view('employee.edit',compact('employee'));
    }

    /* function to update single employee */
    public function update(Request $request, Employee $employee)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone'=> 'required',
            'current_route' => 'required',
            'joined_date' => 'required',
            'comments' => 'required'
        ]);

        $employee->update($request->all());
        return redirect()->route('employee.index')->with('success','Employee updated successfully');
    }

    /* function to delete  employee */
    public function destroy(Employee $employee)
    {
        $employee->delete();
        return redirect()->route('employee.index')->with('success','Employee deleted successfully');
    }

}
