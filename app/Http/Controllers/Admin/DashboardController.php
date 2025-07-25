<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Employ_tbl;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){

        $employees=Employ_tbl::orderBy('id', 'DESC')->get();
        return view('admin.employees',compact('employees'));
    }
    public function create(){

        return view('admin.employ_add');
    }
    public function store(Request $request)
    {

        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:employ_tbls,email',
            'department' => 'required',
            'salary' => 'required|numeric|min:0',
            'joining_date' => 'required|date',
            ],
            [
            'name.required' => 'This field is required',
            'email.required' => 'This field is required',
            'email.email' => 'Enter a valid email address',
            'email.unique' => 'This email is already taken',
            'department.required' => 'This field is required',
            'salary.required' => 'This field is required',
            'salary.numeric' => 'Salary must be a number',
            'salary.min' => 'Salary cannot be negative',
            'joining_date.required' => 'This field is required',
            'joining_date.date' => 'Enter a valid date',
            ]

        );

        $insert= new Employ_tbl;
        $insert->name=$request->input('name');
        $insert->email=$request->input('email');
        $insert->department=$request->input('department');
        $insert->salary=$request->input('salary');
        $insert->joining_date=$request->input('joining_date');

        $save= $insert->save();
        if($save)
        {
           return redirect(route('admin.employ_list'))->with('status','Details Saved Successfully !');
        }
       else
        {
        return redirect()->back()->with('Fail','Something Went Wrong');
         }
    }
}
