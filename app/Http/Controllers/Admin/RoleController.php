<?php

namespace App\Http\Controllers\Admin;

use App\Model\Admin\Permission;
use App\Model\admin\role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class RoleController extends Controller
{




    public function __construct()
    {

        $this->middleware('can:admins.super');

    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    
        $roles = role::all();
        return view('admin.role.show', compact('roles'));
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
   
        $permissions = Permission::all();
        return view('admin.role.create', compact('permissions'));
   
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $this->validate($request, [

            'name' => 'required|min:5|max:20|unique:roles'
        ]);

        $role = new role;

        $role->name = $request->name;

        $role->save();

        $role->permissions()->sync($request->permission);

        return redirect(route('role.index'));


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
   

        $permissions = Permission::all();

        $role = role::find($id);

       // return $role->permissions;
        #$role = role::where('id', $id)->first();
        //$role = role::where('id', $id)->get();
        return view('admin.role.edit', compact('role','permissions'));

   
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        //return $request->all();

        $this->validate($request, [

            'name' => 'required|min:5|max:20'
        ]);

        $role = role::find($id);

        $role->name = $request->name;

        $role->save();

        $role->permissions()->sync($request->permission);

        return redirect(route('role.index'));



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        role::where('id', $id)->delete();
        return back();    
    }


}
