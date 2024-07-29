<?php

namespace App\Http\Controllers;

use App\Models\department;
use App\Models\employee;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $departments = department::withCount('employees')->get();
        return view('departments.index',compact('departments'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function create()
    {
        $departments = department::all();

        return view('departments.create', [
            'departments'=>$departments
        ]);
    }
    public function store(Request $request)
    {
        $rules=[
            'name'=> 'required|string|min:4',
        ];
        $validatedData = $request->validate($rules);
        $department = new Department;
        $department ->nom = $request->input('name');
        $department ->save();
        return redirect() -> route('departments.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }
    public function edit(string $id)
    {
        $department = Department::find($id);
        if (!$department) {
            return redirect()->route('departments.index')->withErrors('Le département n\'a pas été trouvé.');
        }
    
        return view('departments.edit', compact('department'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $department = department::findOrFail($id);
        $department ->nom = $request->input('name');
        $department ->update();
        return redirect() -> route('departments.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destruction(string $id)
    {
        $department= department::findOrFail($id);
        $department->delete();
        return redirect()->route("departments.index")->with('success', 'Département supprimé avec succès');
    }
}
