<?php

namespace App\Http\Controllers\Admin;

use App\Model\admin\admin;
use App\Model\admin\role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class UserController extends Controller
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

         $users = admin::all();
         return view('admin.user.show', compact('users'));    
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    $roles = role::all();
    return view('admin.user.create', compact('roles'));   
    
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
            
            'name' =>  'required|min:3|max:255|string',
            'email' => 'required|string|email|max:255|unique:admins',
            'password' => 'required|min:6|max:20|confirmed',
            'phone' => 'required|min:10|max:200|unique:admins',
        
        ]);

        /*
        $admin = new admin;
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->password = $request->password;
        $admin->phone = $request->phone;
        $admin->status = $request->status;
        $admin->save();
        */

        $user = admin::create($request->all());
        $user->roles()->sync($request->role);
        return redirect(route('user.index'))->with('created','New Admin Created Successfully');
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

        $roles = role::all();
        $user = admin::find($id);
        return view('admin.user.edit', compact('user','roles'));
    
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
            $this->validate($request, [
            
            'name' =>  'required|min:3|max:255|string',
            'email' => 'required|string|email|max:255',
            'password' => 'required|min:6|max:20|confirmed',
            'phone' => 'required|min:10|max:200',
        
        ]);

        
        $admin = admin::find($id);
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->password = $request->password;
        $admin->phone = $request->phone;
        $admin->status = $request->status;

        $admin->status ? : $admin->status = 0;

        $admin->save();

        #admin::where('id',$id)->update($request->except('_token','_method','password_confirmation'));
        admin::find($id)->roles()->sync($request->role);
        return redirect(route('user.index'))->with('updated','Admin Updated Successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        admin::where('id', $id)->delete();
        return back()->with('deleted','Admin Deleted Successfully'); 
    }
}
