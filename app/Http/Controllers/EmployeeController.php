<?php

namespace App\Http\Controllers;

use App\Events\EmployeeUpdating;
use App\Events\ModelEventService;
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

  public function create()
  {
    $factories = Factory::query()->latest()->get();

    return view('Employees.create-employee', ['factories' => $factories]);
  }

  public function show(Request $request, $id)
  {
    $employee = Employee::find($id);
    $factories = Factory::query()->latest()->get();

    return view('Employees.edit-employee', ['data' => $employee, 'factories' => $factories]);
  }

  public function store(EmployeeFormRequest $request)
  {
    $payload = $request->validated();

    $employee = Employee::create([
      'firstname' => $payload['firstname'],
      'lastname' => $payload['lastname'],
      'factory_id' => $payload['factory'],
      'email' => $payload['email'],
      'phone' => $payload['phone'],
    ]);

    $new_values = $employee->getOriginal();

    event(new ModelEventService(Employee::class, $employee->id, ['create' => $new_values]));

    return redirect()->route('employees')->with('message', 'New employee created!');
  }

  public function update(EmployeeFormRequest $request, $id)
  {
    $employee = Employee::find($id);

    $original_values = $employee->getOriginal();

    $employee->firstname = $request->firstname;
    $employee->lastname = $request->lastname;
    $employee->factory_id = $request->factory;
    $employee->email = $request->email;
    $employee->phone = $request->phone;
    $employee->save();

    $updated_values = $employee->getOriginal();

    event(new ModelEventService(Employee::class, $employee->id, ['update' => ['old_data' => $original_values, 'updated_data' => $updated_values]]));

    return redirect()->route('employees')->with('message', 'Employee Updated!');
  }

  public function destroy($id)
  {
    $employee = Employee::find($id);

    $original_values = $employee->getOriginal();

    $employee->delete();

    event(new ModelEventService(Employee::class, $employee->id, ['deleted' => $original_values]));

    return redirect()->route('employees')->with('message', 'Employee Deleted!');
  }
}
