<?php

namespace App\Http\Controllers\Admin;

use App\Model\Admin\Permission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PermissionController extends Controller
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
        $permissions = Permission::all();
        return view('admin.permission.show', compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.permission.create');
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
            'name' => 'required|string|max:50|min:5|unique:permissions',
            'for' => 'required'
        ]);


        $permission = new Permission;

        $permission->name = $request->name;
        $permission->for = $request->for;

        $permission->save();

        return redirect(route('permission.index'))->with('created', 'Permission Created Successfully');
;

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Admin\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Admin\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $permission = Permission::find($id);

        return view('admin.permission.edit', compact('permission'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Admin\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|min:5|max:50|string|unique:permissions',
            'for' => 'required'
        ]);


        $permission = Permission::find($id);

        $permission->name = $request->name;
          $permission->for = $request->for;

        $permission->save();

        return redirect(route('permission.index'))->with('updated', 'Permission Updated Successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Admin\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        //return $permission;
        Permission::where('id', $id)->delete();    
        return back()->with('deleted', 'Permission Deleted Successfully');
;

    }


}
