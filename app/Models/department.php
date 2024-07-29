<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class department extends Model
{
    use HasFactory;

    public function employees(){
        return $this->hasMany(employee::class,'departments_id','id');
    }
    public function countEmployeesByDepartment(){
        $departments = Department::withCount('employees')->get();
        return view('departments.index2', compact('departments'));
    }
}
