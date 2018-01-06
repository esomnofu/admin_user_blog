<?php

namespace App\Http\Controllers\Admin;

use App\Model\user\tag;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class TagController extends Controller
{

    /*
    MR OFU
    MR OFU
    MR OFU
    To Restrict Access --- we can create the Middleware in the Construct Function
    which which signal an Unauthorized signal ... i.e 403
    and we serve a 403 Page on the view as done on Permission, Role and User Controllers
    public function __construct()
    {

        $this->middleware('can:posts.tag');

    }
    */

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function index()
    { 
        if (Auth::user()->can('posts.tag')) {
        $tags = tag::all();
       return view('admin.tag.show', compact('tags'));  
        }
        
        return back();  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
      return view('admin.tag.create'); 
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

            'name' => 'required',
            'slug' => 'required'
        ]);


        $tag = new tag;

        $tag->name = $request->name;
        $tag->slug = $request->slug;

        $tag->save();

        return redirect()->route('tag.index');



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

        if (Auth::user()->can('posts.tag')) {
             $tag = tag::where('id', $id)->first();
            return view('admin.tag.edit', compact('tag'));
        }

        return back();
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

            'name' => 'required',
            'slug' => 'required'
        ]);


        $tag = tag::find($id);

        $tag->name = $request->name;
        $tag->slug = $request->slug;

        $tag->save();

        return redirect()->route('tag.index');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       tag::where('id' , $id)->delete();
        return back();
    }
}
