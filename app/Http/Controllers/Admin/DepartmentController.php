<?php

namespace App\Http\Controllers\Admin;

use App\Department;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use DB;
use Illuminate\Support\Facades\Auth;

class DepartmentController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departments = Department::all();
        return view('admin.department.index')->with('departments', $departments);
   
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.department.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {     
       # $attribute = request()->validate(['dname'=>'required']);
       # Department::create(
        #    ['user_id' => auth()->id(),
       #      'dname' => $attribute['dname']
       #     ]
      #  );
      $this->validate($request, [
          'dname' => 'required',    
      ]);
      $department = new Department;
      $department->dname = $request->input('dname');
      $department->user_id = auth()->user()->id;
      $department->save();
      
      return redirect('admin/department')->with('department', $department);
               
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function show(Department $department)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function edit(Department $department)
    {
        #$user = User::all();
        
        return view('admin.department.edit', compact('department'));

        //return view('admin.department.edit')->with([
            #'user' => $user,
           // 'department'=> $department
        //]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Department $department)
    {
       $department->dname = $request->dname;
    
        
        $department->save();

        return redirect()->route('admin.department.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function destroy(Department $department)
    {
        $department->delete();
        return redirect()->route('admin.department.index');
    }
}