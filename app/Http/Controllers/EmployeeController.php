<?php

namespace App\Http\Controllers;

use App\Models\department;
use App\Models\employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = Employee::with('department')->paginate(10);
        return view('employees.index',compact('employees'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function create()
    {
        $departments = department::all();

        return view('employees.create', [
            'departments'=>$departments
        ]);
    }
    public function store(Request $request)
    {
        $rules=[
            'name'=> 'required|string|min:4',
            'email' => 'required|string|min:5',
            'position' => 'required|string|min:5'
        ];
        $validatedData = $request->validate($rules);
        $employee = new Employee;
        $employee ->departments_id = $request->input('department');
        $employee ->nom = $request->input('name');
        $employee ->email = $request->input('email');
        $employee ->position = $request->input('position');
        $employee ->save();
        return redirect() -> route('employees.index');
    }

    /**
     * Display the specified resource.
     */
    public function edit(string $id)
    {
        $employee = Employee::findOrFail($id);
        $departments = department::all();
        return view('employees.edit', compact('employee','departments'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $employee =Employee::findOrFail($id);
        $employee ->departments_id = $request->input('department');
        $employee ->nom = $request->input('name');
        $employee ->email = $request->input('email');
        $employee ->position = $request->input('position');
        $employee ->update();
        return redirect() -> route('employees.index');
    }
    public function search(Request $request)
    {
        $search = $request->input('search');
        $employees = Employee::query()
            ->where('nom', 'LIKE', "%{$search}%")
            ->orWhere('email', 'LIKE', "%{$search}%")
            ->orWhere('position', 'LIKE', "%{$search}%")
            ->paginate(10);
    
        return view('employees.index', compact('employees'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $employee = Employee::findOrFail($id);
        $employee->delete();
        return redirect()->route("employees.index");
    }
}
