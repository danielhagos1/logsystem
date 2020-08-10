<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use App\Role;
use Gate;
use App\Department;
use App\Company;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function _construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $users = User::all();
      return view('admin.users.index')->with('users', $users);
    }


   

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user, Department $department, Company $company)
    {
        if(Gate::denies('edit-users')){
            
            return redirect(route('admin.users.index'));
        }
       
        $roles = Role::all();
        $department = Department::all();
        $company = Company::all();
        
        return view('admin.users.edit')->with([
            'user' => $user,
            'roles'=> $roles,
            'dname'=> $department,
            'cname' => $company, 
        
            
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {

      $user->roles()->sync($request->roles);
      $user->company()->cname = $request->cname;
      $user->department()->dname = $request->dname;
      
       #$departments = new Department();
       #$user->department()->dname = $request->dname;
       #$company = new Company();
       #$user->company()->cname = $request->cname;
     
      $user->name = $request->name;
      $user->email = $request->email;
    
     

      $user->save();

      #$user->department()->save($departments);

      #$user->company()->save($company);
      
   
     
      #$user->company->cname = $request->cname;
      #$user->department->dname = $request->dname;
  
      #if($user->save()){
      ##    $request->session()->flash('success', $user->name .' '. 'has been upated');
          
      #}else{
        #  $request->session()->flash('error', 'There was an error on updating');
    #  }
      
      return redirect()->route('admin.users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if(Gate::denies('delete-users')){
            return redirect(route('admin.users.index'));
        }
        $user->roles()->detach();
        $user->delete();
        
        return redirect()->route('admin.users.index');
    }
}