<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\EmployeeFormRequest;
use App\Models\Employee;
use App\Models\Factory;

class EmployeeController extends Controller
{
  public function index()
  {
    $employees = Employee::query()->with('factory:id,factory_name')->latest()->paginate(10);

    $factories = Factory::query()->latest()->get();

    return view('Employees.employees', ['data' => $employees, 'factories' => $factories]);
  }

  public function store(EmployeeFormRequest $request)
  {
    $payload = $request->validated();

    Employee::create([
      'firstname' => $payload['firstname'],
      'lastname' => $payload['lastname'],
      'factory_id' => $payload['factory'],
      'email' => $payload['email'],
      'phone' => $payload['phone'],
    ]);

    return redirect()->route('employees')->with('message', 'New employee created!');
  }

  public function update(EmployeeFormRequest $request, $id)
  {
    $employee = Employee::find($id);

    $employee->firstname = $request->firstname;
    $employee->lastname = $request->lastname;
    $employee->factory_id = $request->factory;
    $employee->email = $request->email;
    $employee->phone = $request->phone;
    $employee->save();

    return redirect()->route('employees')->with('message', 'Employee Updated!');
  }

  public function destroy($id)
  {
    $employee = Employee::find($id);
    $employee->delete();

    return redirect()->route('employees')->with('message', 'Employee Deleted!');
  }
}
